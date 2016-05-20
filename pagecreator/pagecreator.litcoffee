# Compile to JavaScript before uploading to server.
blackClick = ->
  document.getElementById('input').innerHTML = ''
  document.getElementById('input').style.display = 'none'
  document.getElementById('blackout').style.display = 'none'
  return

image = ->
  internal = '<table><tr><td>Image Input Type:</td><td><select id="iminty" onchange="imgUpChange();showPic();"><option value="url">URL</option><option value="prev">Previously Uploaded Image</option><option value="up">Upload Image</option></select></td></tr><tr id="picType"></tr><tr><td>Height:</td><td><input type="text" id="ht" style="width:100%;"></input></td></tr><tr><td>Width:</td><td><input type="text" id="wt" style="width:100%;"></input></td></tr><tr><td>Title:</td><td><input type="text" id="title" style="width:100%;"></input></td></tr><tr><td>Alternate Text:</td><td><input type="text" id="alt" style="width:100%;"></input></td></tr><tr><td>Location:</td><td><select id="fl"><option value="il">Inline</option><option value="lf">Left</option><option value="rt">Right</option></select></td></tr><tr><td colspan="2"><img id="previmg" height="100"/></td></tr></table><button onclick="imgIn()">Add</button><button onclick="blackClick()">Cancel</button>'
  elem = document.getElementById('input')
  elem.innerHTML = internal
  document.getElementById('blackout').style.display = 'block'
  elem.style.display = 'block'
  imageUpChange()
  showPic()
  return

imgIn = ->
  if document.getElementById('pic').value != null && document.getElementById('pic').value != ""{
    pic = document.getElementById("pic").value
    type = document.getElementById("iminty").value
    ht = document.getElementById("ht").value
    wt = document.getElementById("wt").value
    alt = document.getElementById("alt").value
    title = document.getElementById("title").value
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
    insertAtCursor(html,str)
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
    if txt == ''
      str += '=' + url + ']' + txt + '[/url]'
    else
      str += ']' + url + '[/url]'
    blackClick()
    insertAtCursor(html, str)
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
    insertAtCursor(html,str)
  return

colorText = ->
  color = prompt('Hexadecimal or predefined color')
  if color != '' and color != null
    str = '[color=' + color + ']Text[/color]'
    insertAtCursor(html, str)
  return

customFont = ->
  font = prompt('Enter font family name (must be web friendly)')
  if font != '' and font != null
    str = '[font=' + font + ']Text[/color]'
    insertAtCursor(html, str)
  return

bold = ->
  insertAtCursor(html, '[b][/b]')
  return

underline = ->
  insertAtCursor(html, '[u][/u]')
  return

italics = ->
  insertAtCursor(html, '[i][/i]')
  return

strikethrough = ->
  insertAtCursor(html, '[s][/s]')
  return

unorderedList = ->
  insertAtCursor(html, '[ul]\n* Item 1\n[/ul]')
  return

orderedList = ->
  insertAtCursor(html, '[ol]\n* Item 1\n[/ol]')
  return

 heading1 = ->
   insertAtCursor(html, '[t1][/t1]')
   return

 heading2 = ->
   insertAtCursor(html, '[t2][/t2]')
   return

 heading3 = ->
   insertAtCursor(html, '[t3][/t3]')
   return

 heading4 = ->
   insertAtCursor(html, '[t4][/t4]')
   return

 heading5 = ->
   insertAtCursor(html, '[t5][/t5]')
   return

heading6 = ->
  insertAtCursor(html, '[t6][/t6]')
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
