sendData = ->
  READY = 4
  OK = 200

  id = document.getElementById('id').value
  title = document.getElementById('title').value
  html = document.getElementById('html').value
  xhttp = new XMLHttpRequest

  xhttp.onreadystatechange = ->
    if xhttp.readyState == READY and xhttp.status == OK
      document.writeln(xhttp.responseText)
    return

  xhttp.open 'POST', 'submit.php', true
  xhttp.setRequestHeader 'Content-type', 'application/x-www-form-urlencoded'
  xhttp.send 'id=' + id + '&title=' + title + '&html=' + html
  return