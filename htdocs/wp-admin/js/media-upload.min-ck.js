function send_to_editor(e){var t,n="undefined"!=typeof tinymce,r="undefined"!=typeof QTags;if(wpActiveEditor)n&&(t=!tinymce.activeEditor||"mce_fullscreen"!=tinymce.activeEditor.id&&"wp_mce_fullscreen"!=tinymce.activeEditor.id?tinymce.get(wpActiveEditor):tinymce.activeEditor);else if(n&&tinymce.activeEditor)t=tinymce.activeEditor,wpActiveEditor=t.id;else if(!r)return!1;t&&!t.isHidden()?(tinymce.isIE&&t.windowManager.insertimagebookmark&&t.selection.moveToBookmark(t.windowManager.insertimagebookmark),-1!==e.indexOf("[caption")?t.wpSetImgCaption&&(e=t.wpSetImgCaption(e)):-1!==e.indexOf("[gallery")?t.plugins.wpgallery&&(e=t.plugins.wpgallery._do_gallery(e)):0===e.indexOf("[embed")&&t.plugins.wordpress&&(e=t.plugins.wordpress._setEmbed(e)),t.execCommand("mceInsertContent",!1,e)):r?QTags.insertContent(e):document.getElementById(wpActiveEditor).value+=e;try{tb_remove()}catch(i){}}var wpActiveEditor,tb_position;!function(e){tb_position=function(){var t=e("#TB_window"),n=e(window).width(),r=e(window).height(),i=n>720?720:n,s=0;return e("body.admin-bar").length&&(s=28),t.size()&&(t.width(i-50).height(r-45-s),e("#TB_iframeContent").width(i-50).height(r-75-s),t.css({"margin-left":"-"+parseInt((i-50)/2,10)+"px"}),"undefined"!=typeof document.body.style.maxWidth&&t.css({top:20+s+"px","margin-top":"0"})),e("a.thickbox").each(function(){var t=e(this).attr("href");t&&(t=t.replace(/&width=[0-9]+/g,""),t=t.replace(/&height=[0-9]+/g,""),e(this).attr("href",t+"&width="+(i-80)+"&height="+(r-85-s)))})},e(window).resize(function(){tb_position()}),e(document).ready(function(e){e("a.thickbox").click(function(){var e;"undefined"!=typeof tinymce&&tinymce.isIE&&(e=tinymce.get(wpActiveEditor))&&!e.isHidden()&&(e.focus(),e.windowManager.insertimagebookmark=e.selection.getBookmark())})})}(jQuery);