function quicktags(e){return new QTags(e)}function edInsertContent(e,t){return QTags.insertContent(t)}function edButton(e,t,n,r,i){return QTags.addButton(e,t,n,r,i,"",-1)}var QTags,edButtons=[],edCanvas,edAddTag=function(){},edCheckOpenTags=function(){},edCloseAllTags=function(){},edInsertImage=function(){},edInsertLink=function(){},edInsertTag=function(){},edLink=function(){},edQuickLink=function(){},edRemoveTag=function(){},edShowButton=function(){},edShowLinks=function(){},edSpell=function(){},edToolbar=function(){};!function(){var e,t=function(e){var n,r,i;"undefined"!=typeof jQuery?jQuery(document).ready(e):(n=t,n.funcs=[],n.ready=function(){if(!n.isReady)for(n.isReady=!0,r=0;r<n.funcs.length;r++)n.funcs[r]()},n.isReady?e():n.funcs.push(e),n.eventAttached||(document.addEventListener?(i=function(){document.removeEventListener("DOMContentLoaded",i,!1),n.ready()},document.addEventListener("DOMContentLoaded",i,!1),window.addEventListener("load",n.ready,!1)):document.attachEvent&&(i=function(){"complete"===document.readyState&&(document.detachEvent("onreadystatechange",i),n.ready())},document.attachEvent("onreadystatechange",i),window.attachEvent("onload",n.ready),function(){try{document.documentElement.doScroll("left")}catch(e){return setTimeout(arguments.callee,50),void 0}n.ready()}()),n.eventAttached=!0))},n=function(){var e,t=new Date;return e=function(e){var t=e.toString();return t.length<2&&(t="0"+t),t},t.getUTCFullYear()+"-"+e(t.getUTCMonth()+1)+"-"+e(t.getUTCDate())+"T"+e(t.getUTCHours())+":"+e(t.getUTCMinutes())+":"+e(t.getUTCSeconds())+"+00:00"}();e=QTags=function(n){if("string"==typeof n)n={id:n};else if("object"!=typeof n)return!1;var r,i,s,o=this,u=n.id,f=document.getElementById(u),l="qt_"+u;return u&&f?(o.name=l,o.id=u,o.canvas=f,o.settings=n,"content"!=u||"string"!=typeof adminpage||"post-new-php"!=adminpage&&"post-php"!=adminpage?s=l+"_toolbar":(edCanvas=f,s="ed_toolbar"),r=document.createElement("div"),r.id=s,r.className="quicktags-toolbar",f.parentNode.insertBefore(r,f),o.toolbar=r,i=function(e){e=e||window.event;var t,n=e.target||e.srcElement,r=n.clientWidth||n.offsetWidth;r&&/ ed_button /.test(" "+n.className+" ")&&(o.canvas=f=document.getElementById(u),t=n.id.replace(l+"_",""),o.theButtons[t]&&o.theButtons[t].callback.call(o.theButtons[t],n,f,o))},r.addEventListener?r.addEventListener("click",i,!1):r.attachEvent&&r.attachEvent("onclick",i),o.getButton=function(e){return o.theButtons[e]},o.getButtonElement=function(e){return document.getElementById(l+"_"+e)},e.instances[u]=o,e.instances[0]||(e.instances[0]=e.instances[u],t(function(){e._buttonsInit()})),void 0):!1},e.instances={},e.getInstance=function(t){return e.instances[t]},e._buttonsInit=function(){var t,n,r,i,s,o,u,f,l,c,h=this,p=",strong,em,link,block,del,ins,img,ul,ol,li,code,more,close,";for(o in h.instances)if(0!=o){u=h.instances[o],t=u.canvas,n=u.name,r=u.settings,s="",i={},c="",r.buttons&&(c=","+r.buttons+",");for(l in edButtons)edButtons[l]&&(f=edButtons[l].id,c&&-1!=p.indexOf(","+f+",")&&-1==c.indexOf(","+f+",")||edButtons[l].instance&&edButtons[l].instance!=o||(i[f]=edButtons[l],edButtons[l].html&&(s+=edButtons[l].html(n+"_"))));c&&-1!=c.indexOf(",fullscreen,")&&(i.fullscreen=new e.FullscreenButton,s+=i.fullscreen.html(n+"_")),"rtl"==document.getElementsByTagName("html")[0].dir&&(i.textdirection=new e.TextDirectionButton,s+=i.textdirection.html(n+"_")),u.toolbar.innerHTML=s,u.theButtons=i}h.buttonsInitDone=!0},e.addButton=function(t,n,r,i,s,o,u,f){var l;if(t&&n){if(u=u||0,i=i||"","function"==typeof r)l=new e.Button(t,n,s,o,f),l.callback=r;else{if("string"!=typeof r)return;l=new e.TagButton(t,n,r,i,s,o,f)}if(-1==u)return l;if(u>0){for(;"undefined"!=typeof edButtons[u];)u++;edButtons[u]=l}else edButtons[edButtons.length]=l;this.buttonsInitDone&&this._buttonsInit()}},e.insertContent=function(e){var t,n,r,i,s,o=document.getElementById(wpActiveEditor);return o?(document.selection?(o.focus(),t=document.selection.createRange(),t.text=e,o.focus()):o.selectionStart||"0"==o.selectionStart?(s=o.value,n=o.selectionStart,r=o.selectionEnd,i=o.scrollTop,o.value=s.substring(0,n)+e+s.substring(r,s.length),o.focus(),o.selectionStart=n+e.length,o.selectionEnd=n+e.length,o.scrollTop=i):(o.value+=e,o.focus()),!0):!1},e.Button=function(e,t,n,r,i){var s=this;s.id=e,s.display=t,s.access=n,s.title=r||"",s.instance=i||""},e.Button.prototype.html=function(e){var t=this.access?' accesskey="'+this.access+'"':"";return'<input type="button" id="'+e+this.id+'"'+t+' class="ed_button" title="'+this.title+'" value="'+this.display+'" />'},e.Button.prototype.callback=function(){},e.TagButton=function(t,n,r,i,s,o,u){var f=this;e.Button.call(f,t,n,s,o,u),f.tagStart=r,f.tagEnd=i},e.TagButton.prototype=new e.Button,e.TagButton.prototype.openTag=function(e,t){var n=this;t.openTags||(t.openTags=[]),n.tagEnd&&(t.openTags.push(n.id),e.value="/"+e.value)},e.TagButton.prototype.closeTag=function(e,t){var n=this,r=n.isOpen(t);r!==!1&&t.openTags.splice(r,1),e.value=n.display},e.TagButton.prototype.isOpen=function(e){var t=this,n=0,r=!1;if(e.openTags)for(;r===!1&&n<e.openTags.length;)r=e.openTags[n]==t.id?n:!1,n++;else r=!1;return r},e.TagButton.prototype.callback=function(e,t,n){var r,i,s,o,u,a,f,l,c=this,h=t.value,p=h?c.tagEnd:"";document.selection?(t.focus(),l=document.selection.createRange(),l.text.length>0?l.text=c.tagEnd?c.tagStart+l.text+p:l.text+c.tagStart:c.tagEnd?c.isOpen(n)===!1?(l.text=c.tagStart,c.openTag(e,n)):(l.text=p,c.closeTag(e,n)):l.text=c.tagStart,t.focus()):t.selectionStart||"0"==t.selectionStart?(r=t.selectionStart,i=t.selectionEnd,s=i,o=t.scrollTop,u=h.substring(0,r),a=h.substring(i,h.length),f=h.substring(r,i),r!=i?c.tagEnd?(t.value=u+c.tagStart+f+p+a,s+=c.tagStart.length+p.length):(t.value=u+f+c.tagStart+a,s+=c.tagStart.length):c.tagEnd?c.isOpen(n)===!1?(t.value=u+c.tagStart+a,c.openTag(e,n),s=r+c.tagStart.length):(t.value=u+p+a,s=r+p.length,c.closeTag(e,n)):(t.value=u+c.tagStart+a,s=r+c.tagStart.length),t.focus(),t.selectionStart=s,t.selectionEnd=s,t.scrollTop=o):(p?c.isOpen(n)!==!1?(t.value+=c.tagStart,c.openTag(e,n)):(t.value+=p,c.closeTag(e,n)):t.value+=c.tagStart,t.focus())},e.SpellButton=function(){},e.CloseButton=function(){e.Button.call(this,"close",quicktagsL10n.closeTags,"",quicktagsL10n.closeAllOpenTags)},e.CloseButton.prototype=new e.Button,e._close=function(e,t,n){var r,i,s=n.openTags;if(s)for(;s.length>0;)r=n.getButton(s[s.length-1]),i=document.getElementById(n.name+"_"+r.id),e?r.callback.call(r,i,t,n):r.closeTag(i,n)},e.CloseButton.prototype.callback=e._close,e.closeAllTags=function(t){var n=this.getInstance(t);e._close("",n.canvas,n)},e.LinkButton=function(){e.TagButton.call(this,"link","link","","</a>","a")},e.LinkButton.prototype=new e.TagButton,e.LinkButton.prototype.callback=function(t,n,r,i){var s,o=this;return"undefined"!=typeof wpLink?(wpLink.open(),void 0):(i||(i="http://"),o.isOpen(r)===!1?(s=prompt(quicktagsL10n.enterURL,i),s&&(o.tagStart='<a href="'+s+'">',e.TagButton.prototype.callback.call(o,t,n,r))):e.TagButton.prototype.callback.call(o,t,n,r),void 0)},e.ImgButton=function(){e.TagButton.call(this,"img","img","","","m")},e.ImgButton.prototype=new e.TagButton,e.ImgButton.prototype.callback=function(t,n,r,i){i||(i="http://");var s,o=prompt(quicktagsL10n.enterImageURL,i);o&&(s=prompt(quicktagsL10n.enterImageDescription,""),this.tagStart='<img src="'+o+'" alt="'+s+'" />',e.TagButton.prototype.callback.call(this,t,n,r))},e.FullscreenButton=function(){e.Button.call(this,"fullscreen",quicktagsL10n.fullscreen,"f",quicktagsL10n.toggleFullscreen)},e.FullscreenButton.prototype=new e.Button,e.FullscreenButton.prototype.callback=function(e,t){t.id&&"undefined"!=typeof fullscreen&&fullscreen.on()},e.TextDirectionButton=function(){e.Button.call(this,"textdirection",quicktagsL10n.textdirection,"",quicktagsL10n.toggleTextdirection)},e.TextDirectionButton.prototype=new e.Button,e.TextDirectionButton.prototype.callback=function(e,t){var n="rtl"==document.getElementsByTagName("html")[0].dir,r=t.style.direction;r||(r=n?"rtl":"ltr"),t.style.direction="rtl"==r?"ltr":"rtl",t.focus()},edButtons[10]=new e.TagButton("strong","b","<strong>","</strong>","b"),edButtons[20]=new e.TagButton("em","i","<em>","</em>","i"),edButtons[30]=new e.LinkButton,edButtons[40]=new e.TagButton("block","b-quote","\n\n<blockquote>","</blockquote>\n\n","q"),edButtons[50]=new e.TagButton("del","del",'<del datetime="'+n+'">',"</del>","d"),edButtons[60]=new e.TagButton("ins","ins",'<ins datetime="'+n+'">',"</ins>","s"),edButtons[70]=new e.ImgButton,edButtons[80]=new e.TagButton("ul","ul","<ul>\n","</ul>\n\n","u"),edButtons[90]=new e.TagButton("ol","ol","<ol>\n","</ol>\n\n","o"),edButtons[100]=new e.TagButton("li","li","	<li>","</li>\n","l"),edButtons[110]=new e.TagButton("code","code","<code>","</code>","c"),edButtons[120]=new e.TagButton("more","more","<!--more-->","","t"),edButtons[140]=new e.CloseButton}();