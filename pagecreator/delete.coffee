READY = 4
OK = 200

deletePage = (id) ->
	xhttp = new XMLHttpRequest
	xhttp.onreadystatechange = ->
		if xhttp.readyState == READY and xhttp.status == OK
			alert "Page deleted"
			document.getElementById('pageList').innerHTML = xhttp.responseText
			return
	xhttp.open "POST", "delete.php", true
	xhttp.setRequestHeader 'Content-type', 'application/x-www-form-urlencoded'
	xhttp.send "id=" + id
	return