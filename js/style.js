function addLink() { var body_element = document.getElementsByTagName('body')[0]; var selection;
    selection = window.getSelection(); var pagelink = "<br /><br /> 原文信息:  原文链接：<a href='" + document.location.href + "'>" + document.location.href + "</a>"; var copy_text = selection + pagelink; var new_div = document.createElement('div');
    new_div.style.left = '-99999px';
    new_div.style.position = 'absolute';
    body_element.appendChild(new_div);
    new_div.innerHTML = copy_text;
    selection.selectAllChildren(new_div);
    window.setTimeout(function() { body_element.removeChild(new_div); }, 0); }
document.oncopy = addLink;