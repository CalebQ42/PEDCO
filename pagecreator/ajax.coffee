sendData = ->
  id = document.getElementById('id').value
  title = document.getElementById('title').value
  html = document.getElementById('html').value
  xhttp = new XMLHttpRequest

  xhttp.onreadystatechange = ->
    if xhttp.readyState == 4 and xhttp.status == 200
      document.getElementById('statusP').innerHTML = xhttp.responseText
    return

  xhttp.open 'POST', 'submit.php', true
  xhttp.setRequestHeader 'Content-type', 'application/x-www-form-urlencoded'
  xhttp.send 'id=' + id + '&title=' + date + '&html=' + html
  return