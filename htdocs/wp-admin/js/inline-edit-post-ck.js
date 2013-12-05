(function(e){inlineEditPost={init:function(){var t=this,n=e("#inline-edit"),r=e("#bulk-edit");t.type=e("table.widefat").hasClass("pages")?"page":"post";t.what="#post-";n.keyup(function(e){if(e.which==27)return inlineEditPost.revert()});r.keyup(function(e){if(e.which==27)return inlineEditPost.revert()});e("a.cancel",n).click(function(){return inlineEditPost.revert()});e("a.save",n).click(function(){return inlineEditPost.save(this)});e("td",n).keydown(function(e){if(e.which==13)return inlineEditPost.save(this)});e("a.cancel",r).click(function(){return inlineEditPost.revert()});e('#inline-edit .inline-edit-private input[value="private"]').click(function(){var t=e("input.inline-edit-password-input");e(this).prop("checked")?t.val("").prop("disabled",!0):t.prop("disabled",!1)});e("#the-list").on("click","a.editinline",function(){inlineEditPost.edit(this);return!1});e("#bulk-title-div").parents("fieldset").after(e("#inline-edit fieldset.inline-edit-categories").clone()).siblings("fieldset:last").prepend(e("#inline-edit label.inline-edit-tags").clone());e('select[name="_status"] option[value="future"]',r).remove();e("#doaction, #doaction2").click(function(n){var r=e(this).attr("id").substr(2);if(e('select[name="'+r+'"]').val()=="edit"){n.preventDefault();t.setBulk()}else e("form#posts-filter tr.inline-editor").length>0&&t.revert()})},toggle:function(t){var n=this;e(n.what+n.getId(t)).css("display")=="none"?n.revert():n.edit(t)},setBulk:function(){var t="",n=this.type,r,i=!0;this.revert();e("#bulk-edit td").attr("colspan",e(".widefat:first thead th:visible").length);e("table.widefat tbody").prepend(e("#bulk-edit"));e("#bulk-edit").addClass("inline-editor").show();e('tbody th.check-column input[type="checkbox"]').each(function(n){if(e(this).prop("checked")){i=!1;var r=e(this).val(),s;s=e("#inline_"+r+" .post_title").html()||inlineEditL10n.notitle;t+='<div id="ttle'+r+'"><a id="_'+r+'" class="ntdelbutton" title="'+inlineEditL10n.ntdeltitle+'">X</a>'+s+"</div>"}});if(i)return this.revert();e("#bulk-titles").html(t);e("#bulk-titles a").click(function(){var t=e(this).attr("id").substr(1);e('table.widefat input[value="'+t+'"]').prop("checked",!1);e("#ttle"+t).remove()});if("post"==n){r="post_tag";e('tr.inline-editor textarea[name="tax_input['+r+']"]').suggest(ajaxurl+"?action=ajax-tag-search&tax="+r,{delay:500,minchars:2,multiple:!0,multipleSep:inlineEditL10n.comma+" "})}e("html, body").animate({scrollTop:0},"fast")},edit:function(t){var n=this,r,i,s,o,u,a,f,l=!0,c,h,p;n.revert();typeof t=="object"&&(t=n.getId(t));r=["post_title","post_name","post_author","_status","jj","mm","aa","hh","mn","ss","post_password","post_format","menu_order"];n.type=="page"&&r.push("post_parent","page_template");i=e("#inline-edit").clone(!0);e("td",i).attr("colspan",e(".widefat:first thead th:visible").length);e(n.what+t).hasClass("alternate")&&e(i).addClass("alternate");e(n.what+t).hide().after(i);s=e("#inline_"+t);e(':input[name="post_author"] option[value="'+e(".post_author",s).text()+'"]',i).val()||e(':input[name="post_author"]',i).prepend('<option value="'+e(".post_author",s).text()+'">'+e("#"+n.type+"-"+t+" .author").text()+"</option>");e(':input[name="post_author"] option',i).length==1&&e("label.inline-edit-author",i).hide();h=e(".post_format",s).text();e("option.unsupported",i).each(function(){var t=e(this);t.val()!=h&&t.remove()});for(p=0;p<r.length;p++)e(':input[name="'+r[p]+'"]',i).val(e("."+r[p],s).text());e(".comment_status",s).text()=="open"&&e('input[name="comment_status"]',i).prop("checked",!0);e(".ping_status",s).text()=="open"&&e('input[name="ping_status"]',i).prop("checked",!0);e(".sticky",s).text()=="sticky"&&e('input[name="sticky"]',i).prop("checked",!0);e(".post_category",s).each(function(){var n=e(this).text();if(n){taxname=e(this).attr("id").replace("_"+t,"");e("ul."+taxname+"-checklist :checkbox",i).val(n.split(","))}});e(".tags_input",s).each(function(){var n=e(this).text(),r=e(this).attr("id").replace("_"+t,""),s=e("textarea.tax_input_"+r,i),o=inlineEditL10n.comma;if(n){","!==o&&(n=n.replace(/,/g,o));s.val(n)}s.suggest(ajaxurl+"?action=ajax-tag-search&tax="+r,{delay:500,minchars:2,multiple:!0,multipleSep:inlineEditL10n.comma+" "})});o=e("._status",s).text();"future"!=o&&e('select[name="_status"] option[value="future"]',i).remove();if("private"==o){e('input[name="keep_private"]',i).prop("checked",!0);e("input.inline-edit-password-input").val("").prop("disabled",!0)}u=e('select[name="post_parent"] option[value="'+t+'"]',i);if(u.length>0){a=u[0].className.split("-")[1];f=u;while(l){f=f.next("option");if(f.length==0)break;c=f[0].className.split("-")[1];if(c<=a)l=!1;else{f.remove();f=u}}u.remove()}e(i).attr("id","edit-"+t).addClass("inline-editor").show();e(".ptitle",i).focus();return!1},save:function(t){var n,r,i=e(".post_status_page").val()||"";typeof t=="object"&&(t=this.getId(t));e("table.widefat .spinner").show();n={action:"inline-save",post_type:typenow,post_ID:t,edit_date:"true",post_status:i};r=e("#edit-"+t+" :input").serialize();n=r+"&"+e.param(n);e.post(ajaxurl,n,function(n){e("table.widefat .spinner").hide();if(n)if(-1!=n.indexOf("<tr")){e(inlineEditPost.what+t).remove();e("#edit-"+t).before(n).remove();e(inlineEditPost.what+t).hide().fadeIn()}else{n=n.replace(/<.[^<>]*?>/g,"");e("#edit-"+t+" .inline-edit-save .error").html(n).show()}else e("#edit-"+t+" .inline-edit-save .error").html(inlineEditL10n.error).show();e("#post-"+t).prev().hasClass("alternate")&&e("#post-"+t).removeClass("alternate")},"html");return!1},revert:function(){var t=e("table.widefat tr.inline-editor").attr("id");if(t){e("table.widefat .spinner").hide();if("bulk-edit"==t){e("table.widefat #bulk-edit").removeClass("inline-editor").hide();e("#bulk-titles").html("");e("#inlineedit").append(e("#bulk-edit"))}else{e("#"+t).remove();t=t.substr(t.lastIndexOf("-")+1);e(this.what+t).show()}}return!1},getId:function(t){var n=e(t).closest("tr").attr("id"),r=n.split("-");return r[r.length-1]}};e(document).ready(function(){inlineEditPost.init()});e(document).on("heartbeat-tick.wp-check-locked-posts",function(t,n){var r=n["wp-check-locked-posts"]||{};e("#the-list tr").each(function(t,n){var i=n.id,s=e(n),o,u;if(r.hasOwnProperty(i)){if(!s.hasClass("wp-locked")){o=r[i];s.find(".column-title .locked-text").text(o.text);s.find(".check-column checkbox").prop("checked",!1);if(o.avatar_src){u=e('<img class="avatar avatar-18 photo" width="18" height="18" />').attr("src",o.avatar_src.replace(/&amp;/g,"&"));s.find(".column-title .locked-avatar").empty().append(u)}s.addClass("wp-locked")}}else s.hasClass("wp-locked")&&s.removeClass("wp-locked").delay(1e3).find(".locked-info span").empty()})}).on("heartbeat-send.wp-check-locked-posts",function(t,n){var r=[];e("#the-list tr").each(function(e,t){t.id&&r.push(t.id)});r.length&&(n["wp-check-locked-posts"]=r)})})(jQuery);