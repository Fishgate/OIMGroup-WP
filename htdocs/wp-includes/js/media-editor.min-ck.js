!function(e){var t={};wp.media.string={props:function(e,t){var n,r,i,s,o,u=wp.media.view.settings.defaultProps;return o=function(e){return"image"!==e.type||e.alt||(e.alt=e.caption||e.title||"",e.alt=e.alt.replace(/<\/?[^>]+>/g,""),e.alt=e.alt.replace(/[\r\n]+/g," ")),e},e=e?_.clone(e):{},t&&t.type&&(e.type=t.type),"image"===e.type&&(e=_.defaults(e||{},{align:u.align||getUserSetting("align","none"),size:u.size||getUserSetting("imgsize","medium"),url:"",classes:[]})),t?(e.title=e.title||t.title,n=e.link||u.link||getUserSetting("urlbutton","file"),"file"===n||"embed"===n?r=t.url:"post"===n?r=t.link:"custom"===n&&(r=e.linkUrl),e.linkUrl=r||"","image"===t.type?(e.classes.push("wp-image-"+t.id),s=t.sizes,i=s&&s[e.size]?s[e.size]:t,_.extend(e,_.pick(t,"align","caption","alt"),{width:i.width,height:i.height,src:i.url,captionId:"attachment_"+t.id})):"video"===t.type||"audio"===t.type?_.extend(e,_.pick(t,"title","type","icon","mime")):(e.title=e.title||t.filename,e.rel=e.rel||"attachment wp-att-"+t.id),o(e)):o(e)},link:function(e,t){var n;return e=wp.media.string.props(e,t),n={tag:"a",content:e.title,attrs:{href:e.linkUrl}},e.rel&&(n.attrs.rel=e.rel),wp.html.string(n)},audio:function(e,t){return wp.media.string._audioVideo("audio",e,t)},video:function(e,t){return wp.media.string._audioVideo("video",e,t)},_audioVideo:function(e,t,n){var r,i,s;return t=wp.media.string.props(t,n),"embed"!==t.link?wp.media.string.link(t):(r={},"video"===e&&(n.width&&(r.width=n.width),n.height&&(r.height=n.height)),s=n.filename.split(".").pop(),_.contains(wp.media.view.settings.embedExts,s)?(r[s]=n.url,i=wp.shortcode.string({tag:e,attrs:r})):wp.media.string.link(t))},image:function(e,t){var n,r,i,s,o={};return e=wp.media.string.props(e,t),r=e.classes||[],o.src="undefined"!=typeof t?t.url:e.url,_.extend(o,_.pick(e,"width","height","alt")),e.align&&!e.caption&&r.push("align"+e.align),e.size&&r.push("size-"+e.size),o["class"]=_.compact(r).join(" "),n={tag:"img",attrs:o,single:!0},e.linkUrl&&(n={tag:"a",attrs:{href:e.linkUrl},content:n}),s=wp.html.string(n),e.caption&&(i={},o.width&&(i.width=o.width),e.captionId&&(i.id=e.captionId),e.align&&(i.align="align"+e.align),s=wp.shortcode.string({tag:"caption",attrs:i,content:s+" "+e.caption})),s}},wp.media.gallery=function(){var e={};return{defaults:{order:"ASC",id:wp.media.view.settings.post.id,itemtag:"dl",icontag:"dt",captiontag:"dd",columns:"3",link:"post",size:"thumbnail",orderby:"menu_order ID"},attachments:function(t){var n,r,i,s,o=t.string(),u=e[o];return delete e[o],u?u:(n=_.defaults(t.attrs.named,wp.media.gallery.defaults),r=_.pick(n,"orderby","order"),r.type="image",r.perPage=-1,void 0!==n.orderby&&(n._orderByField=n.orderby),"rand"===n.orderby&&(n._orderbyRandom=!0),(!n.orderby||/^menu_order(?: ID)?$/i.test(n.orderby))&&(r.orderby="menuOrder"),n.ids?(r.post__in=n.ids.split(","),r.orderby="post__in"):n.include&&(r.post__in=n.include.split(",")),n.exclude&&(r.post__not_in=n.exclude.split(",")),r.post__in||(r.uploadedTo=n.id),s=_.omit(n,"id","ids","include","exclude","orderby","order"),i=wp.media.query(r),i.gallery=new Backbone.Model(s),i)},shortcode:function(t){var n,r,i=t.props.toJSON(),s=_.pick(i,"orderby","order");return t.gallery&&_.extend(s,t.gallery.toJSON()),s.ids=t.pluck("id"),i.uploadedTo&&(s.id=i.uploadedTo),delete s.orderby,s._orderbyRandom?s.orderby="rand":s._orderByField&&"rand"!=s._orderByField&&(s.orderby=s._orderByField),delete s._orderbyRandom,delete s._orderByField,s.ids&&"post__in"===s.orderby&&delete s.orderby,_.each(wp.media.gallery.defaults,function(e,t){e===s[t]&&delete s[t]}),n=new wp.shortcode({tag:"gallery",attrs:s,type:"single"}),r=new wp.media.model.Attachments(t.models,{props:i}),r.gallery=t.gallery,e[n.string()]=r,n},edit:function(e){var t,n,r=wp.shortcode.next("gallery",e),i=wp.media.gallery.defaults.id;if(r&&r.content===e)return r=r.shortcode,_.isUndefined(r.get("id"))&&!_.isUndefined(i)&&r.set("id",i),t=wp.media.gallery.attachments(r),n=new wp.media.model.Selection(t.models,{props:t.props.toJSON(),multiple:!0}),n.gallery=t.gallery,n.more().done(function(){n.props.set({query:!1}),n.unmirror(),n.props.unset("orderby")}),this.frame&&this.frame.dispose(),this.frame=wp.media({frame:"post",state:"gallery-edit",title:wp.media.view.l10n.editGalleryTitle,editing:!0,multiple:!0,selection:n}).open(),this.frame}}}(),wp.media.featuredImage={get:function(){return wp.media.view.settings.post.featuredImageId},set:function(t){var n=wp.media.view.settings;n.post.featuredImageId=t,wp.media.post("set-post-thumbnail",{json:!0,post_id:n.post.id,thumbnail_id:n.post.featuredImageId,_wpnonce:n.post.nonce}).done(function(t){e(".inside","#postimagediv").html(t)})},frame:function(){return this._frame?this._frame:(this._frame=wp.media({state:"featured-image",states:[new wp.media.controller.FeaturedImage]}),this._frame.on("toolbar:create:featured-image",function(e){this.createSelectToolbar(e,{text:wp.media.view.l10n.setFeaturedImage})},this._frame),this._frame.state("featured-image").on("select",this.select),this._frame)},select:function(){var e=wp.media.view.settings,t=this.get("selection").single();e.post.featuredImageId&&wp.media.featuredImage.set(t?t.id:-1)},init:function(){e("#postimagediv").on("click","#set-post-thumbnail",function(e){e.preventDefault(),e.stopPropagation(),wp.media.featuredImage.frame().open()}).on("click","#remove-post-thumbnail",function(){wp.media.view.settings.post.featuredImageId=-1})}},e(wp.media.featuredImage.init),wp.media.editor={insert:function(e){var t,n="undefined"!=typeof tinymce,r="undefined"!=typeof QTags,i=window.wpActiveEditor;if(window.send_to_editor)return window.send_to_editor.apply(this,arguments);if(i)n&&(t=!tinymce.activeEditor||"mce_fullscreen"!=tinymce.activeEditor.id&&"wp_mce_fullscreen"!=tinymce.activeEditor.id?tinymce.get(i):tinymce.activeEditor);else if(n&&tinymce.activeEditor)t=tinymce.activeEditor,i=window.wpActiveEditor=t.id;else if(!r)return!1;if(t&&!t.isHidden()?(tinymce.isIE&&t.windowManager.insertimagebookmark&&t.selection.moveToBookmark(t.windowManager.insertimagebookmark),-1!==e.indexOf("[caption")?t.wpSetImgCaption&&(e=t.wpSetImgCaption(e)):-1!==e.indexOf("[gallery")?t.plugins.wpgallery&&(e=t.plugins.wpgallery._do_gallery(e)):0===e.indexOf("[embed")&&t.plugins.wordpress&&(e=t.plugins.wordpress._setEmbed(e)),t.execCommand("mceInsertContent",!1,e)):r?QTags.insertContent(e):document.getElementById(i).value+=e,window.tb_remove)try{window.tb_remove()}catch(s){}},add:function(n,r){var i=this.get(n);return i?i:(i=t[n]=wp.media(_.defaults(r||{},{frame:"post",state:"insert",title:wp.media.view.l10n.addMedia,multiple:!0})),i.on("insert",function(t){var n=i.state();t=t||n.get("selection"),t&&e.when.apply(e,t.map(function(e){var t=n.display(e).toJSON();return this.send.attachment(t,e.toJSON())},this)).done(function(){wp.media.editor.insert(_.toArray(arguments).join("\n\n"))})},this),i.state("gallery-edit").on("update",function(e){this.insert(wp.media.gallery.shortcode(e).string())},this),i.state("embed").on("select",function(){var e=i.state(),t=e.get("type"),n=e.props.toJSON();n.url=n.url||"","link"===t?(_.defaults(n,{title:n.url,linkUrl:n.url}),this.send.link(n).done(function(e){wp.media.editor.insert(e)})):"image"===t&&(_.defaults(n,{title:n.url,linkUrl:"",align:"none",link:"none"}),"none"===n.link?n.linkUrl="":"file"===n.link&&(n.linkUrl=n.url),this.insert(wp.media.string.image(n)))},this),i.state("featured-image").on("select",wp.media.featuredImage.select),i.setState(i.options.state),i)},id:function(e){return e?e:(e=wpActiveEditor,!e&&"undefined"!=typeof tinymce&&tinymce.activeEditor&&(e=tinymce.activeEditor.id),e=e||"")},get:function(e){return e=this.id(e),t[e]},remove:function(e){e=this.id(e),delete t[e]},send:{attachment:function(e,t){var n,r,i=t.caption;return wp.media.view.settings.captions||delete t.caption,e=wp.media.string.props(e,t),n={id:t.id,post_content:t.description,post_excerpt:i},e.linkUrl&&(n.url=e.linkUrl),"image"===t.type?(r=wp.media.string.image(e),_.each({align:"align",size:"image-size",alt:"image_alt"},function(t,r){e[r]&&(n[t]=e[r])})):"video"===t.type?r=wp.media.string.video(e,t):"audio"===t.type?r=wp.media.string.audio(e,t):(r=wp.media.string.link(e),n.post_title=e.title),wp.media.post("send-attachment-to-editor",{nonce:wp.media.view.settings.nonce.sendToEditor,attachment:n,html:r,post_id:wp.media.view.settings.post.id})},link:function(e){return wp.media.post("send-link-to-editor",{nonce:wp.media.view.settings.nonce.sendToEditor,src:e.linkUrl,title:e.title,html:wp.media.string.link(e),post_id:wp.media.view.settings.post.id})}},open:function(e,t){var n,r;return t=t||{},e=this.id(e),"undefined"!=typeof tinymce&&(r=tinymce.get(e),tinymce.isIE&&r&&!r.isHidden()&&(r.focus(),r.windowManager.insertimagebookmark=r.selection.getBookmark())),n=this.get(e),(!n||n.options&&t.state!==n.options.state)&&(n=this.add(e,t)),n.open()},init:function(){e(document.body).on("click",".insert-media",function(t){var n=e(this),r=n.data("editor"),i={frame:"post",state:"insert",title:wp.media.view.l10n.addMedia,multiple:!0};t.preventDefault(),n.blur(),n.hasClass("gallery")&&(i.state="gallery",i.title=wp.media.view.l10n.createGalleryTitle),wp.media.editor.open(r,i)})}},_.bindAll(wp.media.editor,"open"),e(wp.media.editor.init)}(jQuery);