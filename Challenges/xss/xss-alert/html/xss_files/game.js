var userOpenedAlert = false;

function setInnerText(element, value) {
  if (element.innerText) {
    element.innerText = value;
  } else {
    element.textContent = value;
  }
}

 function levelSolved() {
  if (!userOpenedAlert) {
    return;
  }
  else { 
    document.getElementById('next-controls').style.display = "block";
  };
}

window.addEventListener("message", function(event) {

  if (!window.location.origin) {
    window.location.origin = window.location.protocol + "//" 
        + window.location.hostname 
        + (window.location.port ? ':' + window.location.port: '');
  }
  if (event.origin == window.location.origin && event.data == "success") {
    userOpenedAlert = true;
    levelSolved();
    return;
  }
}, false);


function updateFrame(frameNum, url) {
  if (!url) {
    var urlbar = document.getElementById('input' + frameNum); 
    url = urlbar.value;
  };

  // Make sure that the URL points to the frame of the current level
  var frameLink = document.createElement('a');
  frameLink.href = url;

  if (!url.match(/^https?:/) ||
      frameLink.protocol != location.protocol ||
      frameLink.hostname != location.hostname ||
      frameLink.pathname.replace(/^\//, '').search(location.pathname.replace(/^\//, '')) != 0 ||
      frameLink.pathname.search('(\\.|%2[eE])(\\.|%2[eE])') >= 0) {
        alert("Sorry, I can't navigate the frame to that URL.");
    return;
  } else {
    var frame = document.querySelector('iframe');
    frame.src = url; 
    frame.contentWindow.postMessage(url, "*");
  }
};

function ShowNext() {
	window.location.reload();
      $.ajax({
           type: "POST",
           url: './php/load.php',
           data:{action:'call_this'},
           success:function(html) {
            load(load.php);
			 return true;
           }
      });
 }
 

function selectFile(el, file_name) {
  var selector_container = el.parentNode;
  for (var i = 0; i < selector_container.children.length; i++) {
    var child = selector_container.children[i];
    if (child == el) {
      child.className = child.className + " selected";
    } else {
      child.className = child.className.replace(/ selected/g, "");
    }
  }

  var container = document.getElementById('multi-examples');
  for (var i = 0; i < container.children.length; i++) {
    var child = container.children[i];
    if (child.id == file_name) {
      child.className = "selected";
    } else {
      child.className = "";
    }
  }

  document.getElementById(file_name).className = "selected";
  logXHR("/file/" + file_name);
}

function setInputFieldReturnHandler() {
  var inputField = document.getElementById('input1');
  if (!inputField) {
    return;
  }
  inputField.value = document.querySelector('iframe').src;
  inputField.onkeyup = function (e) {
    if (e.keyCode == 13) {
      updateFrame(1);
      return false;
    }
  }
}
