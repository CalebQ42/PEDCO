# Compile to JavaScript before uploading to server.
blackClick = ->
  document.getElementById('input').innerHTML = ''
  document.getElementById('input').style.display = 'none'
  document.getElementById('blackout').style.display = 'none'

image = ->
  url = prompt('What is the image\'s URL? (necessary)')
  if url != '' and url != null
    width = prompt('What do you want the image\'s width to be? (not necessary)', '')
    height = prompt('What do you want the image\'s height to be? (not necessary)', '')
    alt = prompt('What do you want the alternate text to be? (shows when the picture isn\'t loaded) (not necessary)', '')
    title = prompt('What do you want the title to be? (Shows up when the cursor is hovering over the picture) (not necessary)', '')
    str = '[img'
    if width != '' and width != null
      str += ' width=' + width
    if height != '' and height != null
      str += ' height=' + height
    if alt != '' and alt != null
      str += ' alt=\'' + alt + '\''
    if title != '' and title != null
      str += ' title=\'' + title + '\''
    str += ']' + url + '[/img]'
    insertAtString(html, str)
  return

link = ->
  url = prompt('Where do you want it to link to?')
  if url != '' and url != null
    txt = prompt('What do you want the link to say? (leave blank so it uses the url as the link text)')
    str = '[url'
    if txt != ''
      str += '=' + url + ']' + txt + '[/url]'
    else
      str += ']' + url + '[/url]'
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
    document.getElementById('input').innerHTML = ''
    document.getElementById('input').style.display = 'none'
    document.getElementById('blackout').style.display = 'none'
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
