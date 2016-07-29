:: Usage - challenge_setup <newboxname.box> <pc username>
@echo off

if "%2"=="" (
	echo "Usage: challenge_setup <newboxname.box> <pc username>"
	echo "i.e. C:\vm_setup>challenge_setup challenges.box rob.denman"
	exit /b
)
if not "%3"=="" (
	echo "Usage: challenge_setup <newboxname.box> <pc username>"
	echo "i.e. C:\vm_setup>challenge_setup challenges.box rob.denman"
	exit /b
)

:: set pc username (usr), path to vagrant box directory (vagrant_path), path to current 
:: directory (p), name of output box (box)
set usr=%2
set vagrant_path="C:\Users\%usr%\.vagrant.d\boxes"
set p=%CD%
set box=%1%

if exist %p%\.vagrant (
	echo "[-] Deleting old VM files..."
	vagrant destroy -f
	rd /s /q "%p%\.vagrant"
)

:: delete old boxes so we don't run into naming/saving issues through vagrant
if exist %vagrant_path%\%box% (
	echo "[-] Removing old %box% files..."
	rd /s /q "%vagrant_path%\%box%"
)

:: move files and make copy of VM
echo "[+] Creating Vagrant VM. This may take a few minutes..."
vagrant up
echo "[.] Moving files to appropriate directories..."
vagrant ssh -c /vagrant/vm_setup/prod/move_files.sh
:: set up permissions / security measures
echo "[.] Setting security measures on VM..."
vagrant ssh -c /vagrant/vm_setup/prod/change_permissions.sh
echo "[+] Packaging box..."
vagrant package --output %box%

:: create challenges directory and copy necessary files over
echo "[+] Creating directory 'challenge_vm' and copying files..."
cd \
if exist C:\challenge_vm (
	echo "[-] Removing previous challenge_vm directory..."
	rd /s /q "C:\challenge_vm"
)
mkdir challenge_vm
cd challenge_vm
move %p%\%box% C:\challenge_vm
copy %p%\Vagrantfile C:\challenge_vm

:: edit Vagrantfile
echo "[.] Editing Vagrantfile..."
call :FindReplace "ubuntu/trusty64" "%box%" C:\challenge_vm\Vagrantfile
call :FindReplace "provision 'shell', path: 'bootstrap.sh'" "boot_timeout = 15" C:\challenge_vm\Vagrantfile

:: remove synced folders
echo "[-] Removing synced folders..."
call :FindReplace "provider 'virtualbox' do |v|" "synced_folder '.', '/vagrant', disabled: true" C:\challenge_vm\Vagrantfile
call :FindReplace "v.memory = 4096 #MB" "" C:\challenge_vm\Vagrantfile
call :FindReplace "  end" "" C:\challenge_vm\Vagrantfile
call :FindReplace "config.vm.synced_folder '../..', '/vagrant'" "" C:\challenge_vm\Vagrantfile

echo "[!] Done! Run vagrant up in C:/challenge_vm"

exit /b

:FindReplace <findstr> <replstr> <file>
set tmp="%temp%\tmp.txt"
If not exist %temp%\_.vbs call :MakeReplace
for /f "tokens=*" %%a in ('dir "%3" /s /b /a-d /on') do (
  for /f "usebackq" %%b in (`Findstr /mic:"%~1" "%%a"`) do (
    echo(&Echo Replacing "%~1" with "%~2" in file %%~nxa
    <%%a cscript //nologo %temp%\_.vbs "%~1" "%~2">%tmp%
    if exist %tmp% move /Y %tmp% "%%~dpnxa">nul
  )
)
del %temp%\_.vbs
exit /b

:MakeReplace
>%temp%\_.vbs echo with Wscript
>>%temp%\_.vbs echo set args=.arguments
>>%temp%\_.vbs echo .StdOut.Write _
>>%temp%\_.vbs echo Replace(.StdIn.ReadAll,args(0),args(1),1,-1,1)
>>%temp%\_.vbs echo end with