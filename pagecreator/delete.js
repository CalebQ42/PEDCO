var OK, READY, deletePage;

READY = 4;

OK = 200;

deletePage = function(id) {
  var xhttp;
  xhttp = new XMLHttpRequest;
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState === READY && xhttp.status === OK) {
      alert("Page deleted");
      document.getElementById('pageList').innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("POST", "delete.php", true);
  xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhttp.send("id=" + id);
};

// ---
// generated by coffee-script 1.9.2