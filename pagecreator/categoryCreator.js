var sendData;

sendData = function() {
  var OK, READY, html, id, title, xhttp;
  READY = 4;
  OK = 200;
  name = document.getElementById('categoryName').value;
  description = document.getElementById('descript').value;
  id = document.getElementById('id').value;

  xhttp = new XMLHttpRequest;
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState === READY && xhttp.status === OK) {
      document.getElementById('responseDiv').innerHTML = xhttp.responseText;
    }
  };
  xhttp.open('POST', 'catSubmit.php', true);
  xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhttp.send('name=' + name + '&description=' + description + '&id=' + id);
};

// ---
// generated by coffee-script 1.9.2