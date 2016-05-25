# Compile to JavaScript before uploading to server.
insertAtCursor = (myField, begin, end) ->
  start = myField.selectionStart
  finish = myField.selectionEnd
  sltd = myField.value.substring(start, finish)
  txt = ''
  if end == ''
    txt = myField.value.substring(0, finish)
    txt += begin
    txt += myField.value.substring(finish, myField.value.length)
  else
    txt = myField.value.substring(0, start)
    txt += begin
    txt += myField.value.substring(start, finish)
    txt += end
    txt += myField.value.substring(finish, myField.value.length)
  myField.value = txt
  return

blackClick = ->
  document.getElementById('input').innerHTML = ''
  document.getElementById('input').style.display = 'none'
  document.getElementById('blackout').style.display = 'none'
  return

imgIn = ->
  if document.getElementById('pic').value != null && document.getElementById('pic').value != ""
    pic = document.getElementById("pic").value
    type = document.getElementById("iminty").value
    ht = document.getElementById("ht").value
    wt = document.getElementById("wt").value
    alt = document.getElementById("alt").value
    title = document.getElementById("ttl").value
    flt = document.getElementById("fl").value
    str = "[img"
    if ht != ""
      str += ' height=' + ht
    if wt != ""
      str += ' width=' + wt
    if alt != ""
      str += ' alt="' + alt + '"'
    if title != ""
      str += ' title="' + title + '"'
    if fl == "lf"
      str += " left"
    else if fl == "rt"
      str += " right"
    if type == "up"
      file = document.getElementById('pic').files[0]
      formData = new FormData
      formData.append 'picUp', file, file.name
      xhr = new XMLHttpRequest
      xhr.open 'POST', 'upload.php', true

      xhr.onload = ->
        if !xhr.status == 200
          alert 'An error occurred!'
        return

      xhr.send formData
      str += ']../Pictures/' + file.name + '[/img]' //change directory as necessary
    else
      str += "]" + pic + "[/img]"
    blackClick()
    insertAtCursor(document.getElementById("html"),str,"")
  else
    blackClick()
  return

link = ->
  internal = '<table><tr><td>URL:</td><td><input type="text" id="url"></input></td></tr><tr><td>Link Text:</td><td><input type="text" id="txt"></input></td></tr></table><button onclick="lkIn()">Add</button><button onclick="blackClick()">Cancel</button>'
  elem = document.getElementById('input')
  elem.innerHTML = internal
  document.getElementById('blackout').style.display = 'block'
  elem.style.display = 'block'
  return

lkIn = ->
  str = '[url'
  url = document.getElementById('url').value
  txt = document.getElementById('txt').value
  if url == ''
    blackClick()
  else
    if txt != ''
      str += '=' + url + ']' + txt + '[/url]'
    else
      str += ']' + url + '[/url]'
    blackClick()
    insertAtCursor(document.getElementById("html"), str,"")
  return

youtube = ->
  internal = '<table><tr><td>Youtube URL or ID:</td><td><input type="text" id="ytid"></input></td></tr><tr><td>Height:</td><td><input type="text" id="ht"></input></td></tr><tr><td>Width:</td><td><input type="text" id="wt"></input></td></tr><tr><td>Location:</td><td><select id="fl"><option value="il">Inline</option><option value="lf">Left</option><option value="rt">Right</option></select></td></tr></table><button onclick="youtube()">Add</button><button onclick="blackClick()">Cancel</button>'
  elem = document.getElementById('input')
  elem.innerHTML = internal
  document.getElementById('blackout').style.display = 'block'
  elem.style.display = 'block'
  return

ytIn = ->
  str = '[youtube'
  id = document.getElementById('ytid').value
  w = document.getElementById('wt').value
  h = document.getElementById('ht').value
  fl = document.getElementById('fl').value
  if id == ''
    document.getElementById('input').innerHTML = ''
    document.getElementById('blackout').style.display = 'none'
    document.getElementById('input').style.display = 'none'
  else
    if w != ''
      str += ' width=' + w
    if h != ''
      str += ' height=' + h
    if fl != 'il'
      if fl == 'lf'
        str += ' left'
      else if fl == 'rt'
        str += ' right'
    str += ']' + id + '[/youtube]'
    blackClick()
    insertAtCursor(document.getElementById("html"),str,"")
  return

colorText = ->
  color = prompt('Hexadecimal or predefined color')
  if color != '' and color != null
    str = '[color=' + color + ']Text'
    insertAtCursor(document.getElementById("html"), str,"[/color]")
  return

customFont = ->
  font = prompt('Enter font family name (must be web friendly)')
  if font != '' and font != null
    str = '[font=' + font + ']Text'
    insertAtCursor(document.getElementById("html"), str,"[/font]")
  return

bold = ->
  insertAtCursor(document.getElementById("html"), '[b]',"[/b]")
  return

underline = ->
  insertAtCursor(document.getElementById("html"), '[u]',"[/u]")
  return

italics = ->
  insertAtCursor(document.getElementById("html"), '[i]',"[/i]")
  return

strikethrough = ->
  insertAtCursor(document.getElementById("html"), '[s]',"[/s]")
  return

unorderedList = ->
  insertAtCursor(document.getElementById("html"), '[ul]','[/ul]')
  return

orderedList = ->
  insertAtCursor(document.getElementById("html"), '[ol]','[/ol]')
  return

 heading1 = ->
   insertAtCursor(document.getElementById("html"), '[t1]','[/t1]')
   return

 heading2 = ->
   insertAtCursor(document.getElementById("html"), '[t2]','[/t2]')
   return

 heading3 = ->
   insertAtCursor(document.getElementById("html"), '[t3]','[/t3]')
   return

 heading4 = ->
   insertAtCursor(document.getElementById("html"), '[t4]','[/t4]')
   return

 heading5 = ->
   insertAtCursor(document.getElementById("html"), '[t5]','[/t5]')
   return

heading6 = ->
  insertAtCursor(document.getElementById("html"), '[t6]','[/t6]')
  return

 disableCat = ->
   document.getElementById('category').selectedIndex = "0"
   document.getElementById('category').disabled = true
   document.getElementById('onmenu').onclick = enableCat
   return

enableCat = ->
  document.getElementById('category').disabled = false
  document.getElementById('onmenu').onclick = disableCat
  return
