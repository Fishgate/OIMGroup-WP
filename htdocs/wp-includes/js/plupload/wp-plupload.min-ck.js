window.wp=window.wp||{},function(e,t){var n;"undefined"!=typeof _wpPluploadSettings&&(n=function(e){var r,i,s=this,o={container:"container",browser:"browse_button",dropzone:"drop_element"};if(this.supports={upload:n.browser.supported},this.supported=this.supports.upload,this.supported){this.plupload=t.extend(!0,{multipart_params:{}},n.defaults),this.container=document.body,t.extend(!0,this,e);for(r in this)t.isFunction(this[r])&&(this[r]=t.proxy(this[r],this));for(r in o)this[r]&&(this[r]=t(this[r]).first(),this[r].length?(this[r].prop("id")||this[r].prop("id","__wp-uploader-id-"+n.uuid++),this.plupload[o[r]]=this[r].prop("id")):delete this[r]);(this.browser&&this.browser.length||this.dropzone&&this.dropzone.length)&&(this.uploader=new plupload.Uploader(this.plupload),delete this.plupload,this.param(this.params||{}),delete this.params,i=function(e,t,r){r.attachment&&r.attachment.destroy(),n.errors.unshift({message:e||pluploadL10n.default_error,data:t,file:r}),s.error(e,t,r)},this.uploader.init(),this.supports.dragdrop=this.uploader.features.dragdrop&&!n.browser.mobile,function(e,t){var n,r;if(e){if(e.toggleClass("supports-drag-drop",!!t),!t)return e.unbind(".wp-uploader");e.bind("dragover.wp-uploader",function(){n&&clearTimeout(n),r||(e.trigger("dropzone:enter").addClass("drag-over"),r=!0)}),e.bind("dragleave.wp-uploader, drop.wp-uploader",function(){n=setTimeout(function(){r=!1,e.trigger("dropzone:leave").removeClass("drag-over")},0)})}}(this.dropzone,this.supports.dragdrop),this.browser?this.browser.on("mouseenter",this.refresh):(this.uploader.disableBrowse(!0),t("#"+this.uploader.id+"_html5_container").hide()),this.uploader.bind("FilesAdded",function(e,t){_.each(t,function(e){var t,r;plupload.FAILED!==e.status&&(t=_.extend({file:e,uploading:!0,date:new Date,filename:e.name,menuOrder:0,uploadedTo:wp.media.model.settings.post.id},_.pick(e,"loaded","size","percent")),r=/(?:jpe?g|png|gif)$/i.exec(e.name),r&&(t.type="image",t.subtype="jpg"===r[0]?"jpeg":r[0]),e.attachment=wp.media.model.Attachment.create(t),n.queue.add(e.attachment),s.added(e.attachment))}),e.refresh(),e.start()}),this.uploader.bind("UploadProgress",function(e,t){t.attachment.set(_.pick(t,"loaded","percent")),s.progress(t.attachment)}),this.uploader.bind("FileUploaded",function(e,t,r){var o;try{r=JSON.parse(r.response)}catch(u){return i(pluploadL10n.default_error,u,t)}return!_.isObject(r)||_.isUndefined(r.success)?i(pluploadL10n.default_error,null,t):r.success?(_.each(["file","loaded","size","percent"],function(e){t.attachment.unset(e)}),t.attachment.set(_.extend(r.data,{uploading:!1})),wp.media.model.Attachment.get(r.data.id,t.attachment),o=n.queue.all(function(e){return!e.get("uploading")}),o&&n.queue.reset(),s.success(t.attachment),void 0):i(r.data&&r.data.message,r.data,t)}),this.uploader.bind("Error",function(e,t){var r,s=pluploadL10n.default_error;for(r in n.errorMap)if(t.code===plupload[r]){s=n.errorMap[r],_.isFunction(s)&&(s=s(t.file,t));break}i(s,t,t.file),e.refresh()}),this.init())}},t.extend(n,_wpPluploadSettings),n.uuid=0,n.errorMap={FAILED:pluploadL10n.upload_failed,FILE_EXTENSION_ERROR:pluploadL10n.invalid_filetype,IMAGE_FORMAT_ERROR:pluploadL10n.not_an_image,IMAGE_MEMORY_ERROR:pluploadL10n.image_memory_exceeded,IMAGE_DIMENSIONS_ERROR:pluploadL10n.image_dimensions_exceeded,GENERIC_ERROR:pluploadL10n.upload_failed,IO_ERROR:pluploadL10n.io_error,HTTP_ERROR:pluploadL10n.http_error,SECURITY_ERROR:pluploadL10n.security_error,FILE_SIZE_ERROR:function(e){return pluploadL10n.file_exceeds_size_limit.replace("%s",e.name)}},t.extend(n.prototype,{param:function(e,n){return 1===arguments.length&&"string"==typeof e?this.uploader.settings.multipart_params[e]:(arguments.length>1?this.uploader.settings.multipart_params[e]=n:t.extend(this.uploader.settings.multipart_params,e),void 0)},init:function(){},error:function(){},success:function(){},added:function(){},progress:function(){},complete:function(){},refresh:function(){var e,n,r,i;if(this.browser){for(e=this.browser[0];e;){if(e===document.body){n=!0;break}e=e.parentNode}n||(i="wp-uploader-browser-"+this.uploader.id,r=t("#"+i),r.length||(r=t('<div class="wp-uploader-browser" />').css({position:"fixed",top:"-1000px",left:"-1000px",height:0,width:0}).attr("id","wp-uploader-browser-"+this.uploader.id).appendTo("body")),r.append(this.browser))}this.uploader.refresh()}}),n.queue=new wp.media.model.Attachments([],{query:!1}),n.errors=new Backbone.Collection,e.Uploader=n)}(wp,jQuery);