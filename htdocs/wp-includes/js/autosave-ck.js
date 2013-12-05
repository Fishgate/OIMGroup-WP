function autosave_parse_response(e){var t=wpAjax.parseAjaxResponse(e,"autosave"),n,r;if(t&&t.responses&&t.responses.length){if(t.responses[0].supplemental){r=t.responses[0].supplemental;jQuery.each(r,function(e,t){e.match(/^replace-/)&&jQuery("#"+e.replace("replace-","")).val(t)})}if(!t.errors){(n=parseInt(t.responses[0].id,10))&&autosave_update_slug(n);t.responses[0].data&&jQuery(".autosave-message").text(t.responses[0].data)}}return t}function autosave_saved(e){blockSave=!1;autosave_parse_response(e);autosave_enable_buttons()}function autosave_saved_new(e){blockSave=!1;var t=autosave_parse_response(e),n;if(t&&t.responses.length&&!t.errors){n=parseInt(t.responses[0].id,10);if(n){notSaved=!1;jQuery("#auto_draft").val("0")}autosave_enable_buttons();if(autosaveDelayPreview){autosaveDelayPreview=!1;doPreview()}}else autosave_enable_buttons()}function autosave_update_slug(e){"undefined"!=makeSlugeditClickable&&jQuery.isFunction(makeSlugeditClickable)&&!jQuery("#edit-slug-box > *").size()&&jQuery.post(ajaxurl,{action:"sample-permalink",post_id:e,new_title:fullscreen&&fullscreen.settings.visible?jQuery("#wp-fullscreen-title").val():jQuery("#title").val(),samplepermalinknonce:jQuery("#samplepermalinknonce").val()},function(e){if(e!=="-1"){var t=jQuery("#edit-slug-box");t.html(e);t.hasClass("hidden")&&t.fadeIn("fast",function(){t.removeClass("hidden")});makeSlugeditClickable()}})}function autosave_loading(){jQuery(".autosave-message").html(autosaveL10n.savingText)}function autosave_enable_buttons(){jQuery(document).trigger("autosave-enable-buttons");(!wp.heartbeat||!wp.heartbeat.hasConnectionError())&&setTimeout(function(){var e=jQuery("#submitpost");e.find(":button, :submit").removeAttr("disabled");e.find(".spinner").hide()},500)}function autosave_disable_buttons(){jQuery(document).trigger("autosave-disable-buttons");jQuery("#submitpost").find(":button, :submit").prop("disabled",!0);setTimeout(autosave_enable_buttons,5e3)}function delayed_autosave(){setTimeout(function(){if(blockSave)return;autosave()},200)}var autosave,autosaveLast="",autosavePeriodical,autosaveDelayPreview=!1,notSaved=!0,blockSave=!1,fullscreen,autosaveLockRelease=!0;jQuery(document).ready(function(e){e("#wp-content-wrap").hasClass("tmce-active")&&typeof switchEditors!="undefined"?autosaveLast=wp.autosave.getCompareString({post_title:e("#title").val()||"",content:switchEditors.pre_wpautop(e("#content").val())||"",excerpt:e("#excerpt").val()||""}):autosaveLast=wp.autosave.getCompareString();autosavePeriodical=e.schedule({time:autosaveL10n.autosaveInterval*1e3,func:function(){autosave()},repeat:!0,protect:!0});e("#post").submit(function(){e.cancel(autosavePeriodical);autosaveLockRelease=!1});e('input[type="submit"], a.submitdelete',"#submitpost").click(function(){blockSave=!0;window.onbeforeunload=null;e(":button, :submit","#submitpost").each(function(){var t=e(this);t.hasClass("button-primary")?t.addClass("button-primary-disabled"):t.addClass("button-disabled")});e(this).attr("id")=="publish"?e("#major-publishing-actions .spinner").show():e("#minor-publishing .spinner").show()});window.onbeforeunload=function(){var t=typeof tinymce!="undefined"?tinymce.activeEditor:!1,n;if(t&&!t.isHidden()){if(t.isDirty())return autosaveL10n.saveAlert}else{fullscreen&&fullscreen.settings.visible?n=wp.autosave.getCompareString({post_title:e("#wp-fullscreen-title").val()||"",content:e("#wp_mce_fullscreen").val()||"",excerpt:e("#excerpt").val()||""}):n=wp.autosave.getCompareString();if(n!=autosaveLast)return autosaveL10n.saveAlert}};e(window).unload(function(t){if(!autosaveLockRelease)return;if(t.target&&t.target.nodeName!="#document")return;e.ajax({type:"POST",url:ajaxurl,async:!1,data:{action:"wp-remove-post-lock",_wpnonce:e("#_wpnonce").val(),post_ID:e("#post_ID").val(),active_post_lock:e("#active_post_lock").val()}})});e("#post-preview").click(function(){if(e("#auto_draft").val()=="1"&&notSaved){autosaveDelayPreview=!0;autosave();return!1}doPreview();return!1});doPreview=function(){e("input#wp-preview").val("dopreview");e("form#post").attr("target","wp-preview").submit().attr("target","");var t=navigator.userAgent.toLowerCase();t.indexOf("safari")!=-1&&t.indexOf("chrome")==-1&&e("form#post").attr("action",function(e,t){return t+"?t="+(new Date).getTime()});e("input#wp-preview").val("")};e("#title").on("keydown.editor-focus",function(t){var n;if(t.which!=9)return;if(!t.ctrlKey&&!t.altKey&&!t.shiftKey){typeof tinymce!="undefined"&&(n=tinymce.get("content"));n&&!n.isHidden()?e(this).one("keyup",function(t){e("#content_tbl td.mceToolbar > a").focus()}):e("#content").focus();t.preventDefault()}});"1"==e("#auto_draft").val()&&e("#title").blur(function(){if(!this.value||e("#auto_draft").val()!="1")return;delayed_autosave()});e(document).on("heartbeat-connection-lost.autosave",function(t,n,r){if("timeout"===n||503==r){var i=e("#lost-connection-notice");wp.autosave.local.hasStorage||i.find(".hide-if-no-sessionstorage").hide();i.show();autosave_disable_buttons()}}).on("heartbeat-connection-restored.autosave",function(){e("#lost-connection-notice").hide();autosave_enable_buttons()})});autosave=function(){var e=wp.autosave.getPostData(),t,n;blockSave=!0;if(!e.autosave)return!1;if(jQuery("#TB_window").css("display")=="block")return!1;t=wp.autosave.getCompareString(e);if(t==autosaveLast)return!1;autosaveLast=t;jQuery(document).triggerHandler("wpcountwords",[e.content]);autosave_disable_buttons();e["auto_draft"]=="1"?n=autosave_saved_new:n=autosave_saved;jQuery.ajax({data:e,beforeSend:autosave_loading,type:"POST",url:ajaxurl,success:n});return!0};window.wp=window.wp||{};wp.autosave=wp.autosave||{};(function(e){wp.autosave.getPostData=function(){var t=typeof tinymce!="undefined"?tinymce.activeEditor:null,n,r,i=[],s={action:"autosave",autosave:!0,post_id:e("#post_ID").val()||0,autosavenonce:e("#autosavenonce").val()||"",post_type:e("#post_type").val()||"",post_author:e("#post_author").val()||"",excerpt:e("#excerpt").val()||""};if(t&&!t.isHidden()){if(t.plugins.spellchecker&&t.plugins.spellchecker.active){s.autosave=!1;return s}"mce_fullscreen"==t.id&&tinymce.get("content").setContent(t.getContent({format:"raw"}),{format:"raw"});tinymce.triggerSave()}if(typeof fullscreen!="undefined"&&fullscreen.settings.visible){s.post_title=e("#wp-fullscreen-title").val()||"";s.content=e("#wp_mce_fullscreen").val()||""}else{s.post_title=e("#title").val()||"";s.content=e("#content").val()||""}e('input[id^="in-category-"]:checked').each(function(){i.push(this.value)});s.catslist=i.join(",");if(n=e("#post_name").val())s.post_name=n;if(r=e("#parent_id").val())s.parent_id=r;e("#comment_status").prop("checked")&&(s.comment_status="open");e("#ping_status").prop("checked")&&(s.ping_status="open");e("#auto_draft").val()=="1"&&(s.auto_draft="1");return s};wp.autosave.getCompareString=function(t){return typeof t=="object"?(t.post_title||"")+"::"+(t.content||"")+"::"+(t.excerpt||""):(e("#title").val()||"")+"::"+(e("#content").val()||"")+"::"+(e("#excerpt").val()||"")};wp.autosave.local={lastSavedData:"",blog_id:0,hasStorage:!1,checkStorage:function(){var e=Math.random(),t=!1;try{sessionStorage.setItem("wp-test",e);t=sessionStorage.getItem("wp-test")==e;sessionStorage.removeItem("wp-test")}catch(n){}this.hasStorage=t;return t},getStorage:function(){var e=!1;if(this.hasStorage&&this.blog_id){e=sessionStorage.getItem("wp-autosave-"+this.blog_id);e?e=JSON.parse(e):e={}}return e},setStorage:function(e){var t;if(this.hasStorage&&this.blog_id){t="wp-autosave-"+this.blog_id;sessionStorage.setItem(t,JSON.stringify(e));return sessionStorage.getItem(t)!==null}return!1},getData:function(){var t=this.getStorage(),n=e("#post_ID").val();return!t||!n?!1:t["post_"+n]||!1},setData:function(t){var n=this.getStorage(),r=e("#post_ID").val();if(!n||!r)return!1;if(t)n["post_"+r]=t;else{if(!n.hasOwnProperty("post_"+r))return!1;delete n["post_"+r]}return this.setStorage(n)},save:function(t){var n=!1,r,i;if(!t)r=wp.autosave.getPostData();else{r=this.getData()||{};e.extend(r,t);r.autosave=!0}if(!r.autosave)return!1;i=wp.autosave.getCompareString(r);if(i==this.lastSavedData)return!1;r.save_time=(new Date).getTime();r.status=e("#post_status").val()||"";n=this.setData(r);n&&(this.lastSavedData=i);return n},init:function(t){var n=this;if(!this.checkStorage())return;if(!e("#content").length&&!e("#excerpt").length)return;t&&e.extend(this,t);this.blog_id||(this.blog_id=typeof window.autosaveL10n!="undefined"?window.autosaveL10n.blog_id:0);e(document).ready(function(){n.run()})},run:function(){var t=this;this.checkPost();this.schedule=e.schedule({time:15e3,func:function(){wp.autosave.local.save()},repeat:!0,protect:!0});e("form#post").on("submit.autosave-local",function(){var n=typeof tinymce!="undefined"&&tinymce.get("content"),r=e("#post_ID").val()||0;n&&!n.isHidden()?n.onSubmit.add(function(){wp.autosave.local.save({post_title:e("#title").val()||"",content:e("#content").val()||"",excerpt:e("#excerpt").val()||""})}):t.save({post_title:e("#title").val()||"",content:e("#content").val()||"",excerpt:e("#excerpt").val()||""});wpCookies.set("wp-saving-post-"+r,"check")})},compare:function(e,t){function n(e){return e.toString().replace(/[\x20\t\r\n\f]+/g,"")}return n(e||"")==n(t||"")},checkPost:function(){var t=this,n=this.getData(),r,i,s,o,u=e("#post_ID").val()||0,a=wpCookies.get("wp-saving-post-"+u);if(!n)return;if(a){wpCookies.remove("wp-saving-post-"+u);if(a=="saved"){this.setData(!1);return}}if(e("#has-newer-autosave").length)return;r=e("#content").val()||"";i=e("#title").val()||"";s=e("#excerpt").val()||"";e("#wp-content-wrap").hasClass("tmce-active")&&typeof switchEditors!="undefined"&&(r=switchEditors.pre_wpautop(r));if(a!="check"&&this.compare(r,n.content)&&this.compare(i,n.post_title)&&this.compare(s,n.excerpt))return;this.restore_post_data=n;this.undo_post_data={content:r,post_title:i,excerpt:s};o=e("#local-storage-notice");e(".wrap h2").first().after(o.addClass("updated").show());o.on("click",function(n){var r=e(n.target);if(r.hasClass("restore-backup")){t.restorePost(t.restore_post_data);r.parent().hide();e(this).find("p.undo-restore").show()}else if(r.hasClass("undo-restore-backup")){t.restorePost(t.undo_post_data);r.parent().hide();e(this).find("p.local-restore").show()}n.preventDefault()})},restorePost:function(t){var n;if(t){this.lastSavedData=wp.autosave.getCompareString(t);e("#title").val()!=t.post_title&&e("#title").focus().val(t.post_title||"");e("#excerpt").val(t.excerpt||"");n=typeof tinymce!="undefined"&&tinymce.get("content");if(n&&!n.isHidden()&&typeof switchEditors!="undefined"){n.undoManager.add();n.setContent(t.content?switchEditors.wpautop(t.content):"")}else{e("#content-html").click();e("#content").val(t.content)}return!0}return!1}};wp.autosave.local.init()})(jQuery);