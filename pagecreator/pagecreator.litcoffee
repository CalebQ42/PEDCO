# Compile to JavaScript before uploading to server.

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
    document.getElementById('html').value = document.getElementById('html').value + str
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
    document.getElementById('html').value = document.getElementById('html').value + str
  return

youtube = ->
  url = prompt('Video URL / Video ID')
  if url != '' and url != null
    str = '[youtube]' + url + '[/youtube]'
    document.getElementById('html').value = document.getElementById('html').value + str
  return

colorText = ->
    color = prompt('Hexadecimal or predefined color')
    if color != '' and url != null
        str = '[color=' + color + ']Text[/color]'
    return

bold = ->
  document.getElementById('html').value = document.getElementById('html').value + "[b][/b]"
  return

underline = ->
  document.getElementById('html').value = document.getElementById('html').value + "[u][/u]"
  return

italics = ->
    document.getElementById('html').value = document.getElementById('html').value + "[i][/i]"
    return

strikethrough = ->
    document.getElementById('html').value = document.getElementById('html').value + "[s][/s]"
    return