jQuery(function(e){e("body").bind("click.wp-gallery",function(t){var n,r,i=e(t.target);i.hasClass("wp-set-header")?((window.dialogArguments||opener||parent||top).location.href=i.data("location"),t.preventDefault()):i.hasClass("wp-set-background")&&(n=i.data("attachment-id"),r=e('input[name="attachments['+n+'][image-size]"]:checked').val(),jQuery.post(ajaxurl,{action:"set-background-image",attachment_id:n,size:r},function(){var e=window.dialogArguments||opener||parent||top;e.tb_remove(),e.location.reload()}),t.preventDefault())})});