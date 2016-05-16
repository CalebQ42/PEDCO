sendData = ->
  READY = 4
  OK = 200

  id = document.getElementById('id').value
  title = document.getElementById('title').value
  html = document.getElementById('html').value
  category = document.getElementById('category').value
  onmenu = document.getElementById('onmenu').value
  xhttp = new XMLHttpRequest

  xhttp.onreadystatechange = ->
    if xhttp.readyState == READY and xhttp.status == OK
      document.getElementById('responseDiv').innerHTML = xhttp.responseText
    return

  xhttp.open 'POST', 'submit.php', true
  xhttp.setRequestHeader 'Content-type', 'application/x-www-form-urlencoded'
  xhttp.send 'id=' + id + '&title=' + title + '&html=' + html + '&category=' + category + '&onmenu=' + onmenu
  return