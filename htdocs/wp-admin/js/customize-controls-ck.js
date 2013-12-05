(function(e,t){var n=wp.customize;n.Setting=n.Value.extend({initialize:function(e,t,r){var i;n.Value.prototype.initialize.call(this,t,r);this.id=e;this.transport=this.transport||"refresh";this.bind(this.preview)},preview:function(){switch(this.transport){case"refresh":return this.previewer.refresh();case"postMessage":return this.previewer.send("setting",[this.id,this()])}}});n.Control=n.Class.extend({initialize:function(e,r){var i=this,s,o,u;this.params={};t.extend(this,r||{});this.id=e;this.selector="#customize-control-"+e.replace(/\]/g,"").replace(/\[/g,"-");this.container=t(this.selector);u=t.map(this.params.settings,function(e){return e});n.apply(n,u.concat(function(){var e;i.settings={};for(e in i.params.settings)i.settings[e]=n(i.params.settings[e]);i.setting=i.settings["default"]||null;i.ready()}));i.elements=[];s=this.container.find("[data-customize-setting-link]");o={};s.each(function(){var e=t(this),r;if(e.is(":radio")){r=e.prop("name");if(o[r])return;o[r]=!0;e=s.filter('[name="'+r+'"]')}n(e.data("customizeSettingLink"),function(t){var r=new n.Element(e);i.elements.push(r);r.sync(t);r.set(t())})})},ready:function(){},dropdownInit:function(){var e=this,t=this.container.find(".dropdown-status"),n=this.params,r=function(e){typeof e=="string"&&n.statuses&&n.statuses[e]?t.html(n.statuses[e]).show():t.hide()},i=!1;this.container.on("click keydown",".dropdown",function(t){if(t.type==="keydown"&&13!==t.which)return;t.preventDefault();i||e.container.toggleClass("open");e.container.hasClass("open")&&e.container.parent().parent().find("li.library-selected").focus();i=!0;setTimeout(function(){i=!1},400)});this.setting.bind(r);r(this.setting())}});n.ColorControl=n.Control.extend({ready:function(){var e=this,t=this.container.find(".color-picker-hex");t.val(e.setting()).wpColorPicker({change:function(n,r){e.setting.set(t.wpColorPicker("color"))},clear:function(){e.setting.set(!1)}})}});n.UploadControl=n.Control.extend({ready:function(){var e=this;this.params.removed=this.params.removed||"";this.success=t.proxy(this.success,this);this.uploader=t.extend({container:this.container,browser:this.container.find(".upload"),dropzone:this.container.find(".upload-dropzone"),success:this.success,plupload:{},params:{}},this.uploader||{});e.params.extensions&&(e.uploader.plupload.filters=[{title:n.l10n.allowedFiles,extensions:e.params.extensions}]);e.params.context&&(e.uploader.params["post_data[context]"]=this.params.context);n.settings.theme.stylesheet&&(e.uploader.params["post_data[theme]"]=n.settings.theme.stylesheet);this.uploader=new wp.Uploader(this.uploader);this.remover=this.container.find(".remove");this.remover.on("click keydown",function(t){if(t.type==="keydown"&&13!==t.which)return;e.setting.set(e.params.removed);t.preventDefault()});this.removerVisibility=t.proxy(this.removerVisibility,this);this.setting.bind(this.removerVisibility);this.removerVisibility(this.setting.get())},success:function(e){this.setting.set(e.get("url"))},removerVisibility:function(e){this.remover.toggle(e!=this.params.removed)}});n.ImageControl=n.UploadControl.extend({ready:function(){var e=this,r;this.uploader={init:function(t){var n,r;if(this.supports.dragdrop)return;n=e.container.find(".upload-fallback");r=n.children().detach();this.browser.detach().empty().append(r);n.append(this.browser).show()}};n.UploadControl.prototype.ready.call(this);this.thumbnail=this.container.find(".preview-thumbnail img");this.thumbnailSrc=t.proxy(this.thumbnailSrc,this);this.setting.bind(this.thumbnailSrc);this.library=this.container.find(".library");this.tabs={};r=this.library.find(".library-content");this.library.children("ul").children("li").each(function(){var n=t(this),i=n.data("customizeTab"),s=r.filter('[data-customize-tab="'+i+'"]');e.tabs[i]={both:n.add(s),link:n,panel:s}});this.library.children("ul").on("click keydown","li",function(n){if(n.type==="keydown"&&13!==n.which)return;var r=t(this).data("customizeTab"),i=e.tabs[r];n.preventDefault();if(i.link.hasClass("library-selected"))return;e.selected.both.removeClass("library-selected");e.selected=i;e.selected.both.addClass("library-selected")});this.library.on("click keydown","a",function(n){if(n.type==="keydown"&&13!==n.which)return;var r=t(this).data("customizeImageValue");if(r){e.setting.set(r);n.preventDefault()}});if(this.tabs.uploaded){this.tabs.uploaded.target=this.library.find(".uploaded-target");this.tabs.uploaded.panel.find(".thumbnail").length||this.tabs.uploaded.both.addClass("hidden")}r.each(function(){var n=e.tabs[t(this).data("customizeTab")];if(!n.link.hasClass("hidden")){e.selected=n;n.both.addClass("library-selected");return!1}});this.dropdownInit()},success:function(e){n.UploadControl.prototype.success.call(this,e);if(this.tabs.uploaded&&this.tabs.uploaded.target.length){this.tabs.uploaded.both.removeClass("hidden");e.element=t('<a href="#" class="thumbnail"></a>').data("customizeImageValue",e.get("url")).append('<img src="'+e.get("url")+'" />').appendTo(this.tabs.uploaded.target)}},thumbnailSrc:function(e){/^(https?:)?\/\//.test(e)?this.thumbnail.prop("src",e).show():this.thumbnail.hide()}});n.defaultConstructor=n.Setting;n.control=new n.Values({defaultConstructor:n.Control});n.PreviewFrame=n.Messenger.extend({sensitivity:2e3,initialize:function(e,r){var i=t.Deferred(),s=this;i.promise(this);this.container=e.container;this.signature=e.signature;t.extend(e,{channel:n.PreviewFrame.uuid()});n.Messenger.prototype.initialize.call(this,e,r);this.add("previewUrl",e.previewUrl);this.query=t.extend(e.query||{},{customize_messenger_channel:this.channel()});this.run(i)},run:function(e){var n=this,r=!1,i=!1;this._ready&&this.unbind("ready",this._ready);this._ready=function(){i=!0;r&&e.resolveWith(n)};this.bind("ready",this._ready);this.request=t.ajax(this.previewUrl(),{type:"POST",data:this.query,xhrFields:{withCredentials:!0}});this.request.fail(function(){e.rejectWith(n,["request failure"])});this.request.done(function(s){var o=n.request.getResponseHeader("Location"),u=n.signature,a;if(o&&o!=n.previewUrl()){e.rejectWith(n,["redirect",o]);return}if("0"===s){n.login(e);return}if("-1"===s){e.rejectWith(n,["cheatin"]);return}a=s.lastIndexOf(u);if(-1===a||a<s.lastIndexOf("</html>")){e.rejectWith(n,["unsigned"]);return}s=s.slice(0,a)+s.slice(a+u.length);n.iframe=t("<iframe />").appendTo(n.container);n.iframe.one("load",function(){r=!0;i?e.resolveWith(n):setTimeout(function(){e.rejectWith(n,["ready timeout"])},n.sensitivity)});n.targetWindow(n.iframe[0].contentWindow);n.targetWindow().document.open();n.targetWindow().document.write(s);n.targetWindow().document.close()})},login:function(e){var r=this,i;i=function(){e.rejectWith(r,["logged out"])};if(this.triedLogin)return i();t.get(n.settings.url.ajax,{action:"logged-in"}).fail(i).done(function(n){var s;"1"!==n&&i();s=t('<iframe src="'+r.previewUrl()+'" />').hide();s.appendTo(r.container);s.load(function(){r.triedLogin=!0;s.remove();r.run(e)})})},destroy:function(){n.Messenger.prototype.destroy.call(this);this.request.abort();this.iframe&&this.iframe.remove();delete this.request;delete this.iframe;delete this.targetWindow}});(function(){var e=0;n.PreviewFrame.uuid=function(){return"preview-"+e++}})();n.Previewer=n.Messenger.extend({refreshBuffer:250,initialize:function(e,r){var i=this,s=/^https?/,o;t.extend(this,r||{});this.refresh=function(e){var t=e.refresh,n=function(){r=null;t.call(e)},r;return function(){if(typeof r!="number"){if(!e.loading)return n();e.abort()}clearTimeout(r);r=setTimeout(n,e.refreshBuffer)}}(this);this.container=n.ensure(e.container);this.allowedUrls=e.allowedUrls;this.signature=e.signature;e.url=window.location.href;n.Messenger.prototype.initialize.call(this,e);this.add("scheme",this.origin()).link(this.origin).setter(function(e){var t=e.match(s);return t?t[0]:""});this.add("previewUrl",e.previewUrl).setter(function(e){var n;if(/\/wp-admin(\/|$)/.test(e.replace(/[#?].*$/,"")))return null;t.each([e.replace(s,i.scheme()),e],function(e,r){t.each(i.allowedUrls,function(e,t){var i;t=t.replace(/\/+$/,"");i=r.replace(t,"");if(0===r.indexOf(t)&&/^([/#?]|$)/.test(i)){n=r;return!1}});if(n)return!1});return n?n:null});this.previewUrl.bind(this.refresh);this.scroll=0;this.bind("scroll",function(e){this.scroll=e});this.bind("url",this.previewUrl)},query:function(){},abort:function(){if(this.loading){this.loading.destroy();delete this.loading}},refresh:function(){var e=this;this.abort();this.loading=new n.PreviewFrame({url:this.url(),previewUrl:this.previewUrl(),query:this.query()||{},container:this.container,signature:this.signature});this.loading.done(function(){this.bind("synced",function(){e.preview&&e.preview.destroy();e.preview=this;delete e.loading;e.targetWindow(this.targetWindow());e.channel(this.channel());e.send("active")});this.send("sync",{scroll:e.scroll,settings:n.get()})});this.loading.fail(function(t,n){"redirect"===t&&n&&e.previewUrl(n);if("logged out"===t){if(e.preview){e.preview.destroy();delete e.preview}e.login().done(e.refresh)}"cheatin"===t&&e.cheatin()})},login:function(){var e=this,r,i,s;if(this._login)return this._login;r=t.Deferred();this._login=r.promise();i=new n.Messenger({channel:"login",url:n.settings.url.login});s=t('<iframe src="'+n.settings.url.login+'" />').appendTo(this.container);i.targetWindow(s[0].contentWindow);i.bind("login",function(){s.remove();i.destroy();delete e._login;r.resolve()});return this._login},cheatin:function(){t(document.body).empty().addClass("cheatin").append("<p>"+n.l10n.cheatin+"</p>")}});n.controlConstructor={color:n.ColorControl,upload:n.UploadControl,image:n.ImageControl};t(function(){n.settings=window._wpCustomizeSettings;n.l10n=window._wpCustomizeControlsL10n;if(!n.settings)return;if(!t.support.postMessage||!t.support.cors&&n.settings.isCrossDomain)return window.location=n.settings.url.fallback;var e=t(document.body),r=e.children(".wp-full-overlay"),i,s,o;t("#customize-controls").on("keydown",function(e){if(t(e.target).is("textarea"))return;13===e.which&&e.preventDefault()});s=new n.Previewer({container:"#customize-preview",form:"#customize-controls",previewUrl:n.settings.url.preview,allowedUrls:n.settings.url.allowed,signature:"WP_CUSTOMIZER_SIGNATURE"},{nonce:n.settings.nonce,query:function(){return{wp_customize:"on",theme:n.settings.theme.stylesheet,customized:JSON.stringify(n.get()),nonce:this.nonce.preview}},save:function(){var r=this,i=t.extend(this.query(),{action:"customize_save",nonce:this.nonce.save}),s=t.post(n.settings.url.ajax,i);n.trigger("save",s);e.addClass("saving");s.always(function(){e.removeClass("saving")});s.done(function(e){if("0"===e){r.preview.iframe.hide();r.login().done(function(){r.save();r.preview.iframe.show()});return}if("-1"===e){r.cheatin();return}n.trigger("saved")})}});s.bind("nonce",function(e){t.extend(this.nonce,e)});t.each(n.settings.settings,function(e,t){n.create(e,e,t.value,{transport:t.transport,previewer:s})});t.each(n.settings.controls,function(e,t){var r=n.controlConstructor[t.type]||n.Control,i;i=n.control.add(e,new r(e,{params:t,previewer:s}))});s.previewUrl()?s.refresh():s.previewUrl(n.settings.url.home);(function(){var e=new n.Values,r=e.create("saved"),i=e.create("activated");e.bind("change",function(){var e=t("#save"),s=t(".back");if(!i()){e.val(n.l10n.activate).prop("disabled",!1);s.text(n.l10n.cancel)}else if(r()){e.val(n.l10n.saved).prop("disabled",!0);s.text(n.l10n.close)}else{e.val(n.l10n.save).prop("disabled",!1);s.text(n.l10n.cancel)}});r(!0);i(n.settings.theme.active);n.bind("change",function(){e("saved").set(!1)});n.bind("saved",function(){e("saved").set(!0);e("activated").set(!0)});i.bind(function(e){e&&n.trigger("activated")});n.state=e})();t("#save").click(function(e){s.save();e.preventDefault()}).keydown(function(e){if(9===e.which)return;13===e.which&&s.save();e.preventDefault()});t(".back").keydown(function(e){if(9===e.which)return;13===e.which&&this.click();e.preventDefault()});t(".upload-dropzone a.upload").keydown(function(e){13===e.which&&this.click()});t(".collapse-sidebar").on("click keydown",function(e){if(e.type==="keydown"&&13!==e.which)return;r.toggleClass("collapsed").toggleClass("expanded");e.preventDefault()});o=new n.Messenger({url:n.settings.url.parent,channel:"loader"});o.bind("back",function(){t(".back").on("click.back",function(e){e.preventDefault();o.send("close")})});n.bind("saved",function(){o.send("saved")});n.bind("activated",function(){o.targetWindow()?o.send("activated",n.settings.url.activated):n.settings.url.activated&&(window.location=n.settings.url.activated)});o.send("ready");t.each({background_image:{controls:["background_repeat","background_position_x","background_attachment"],callback:function(e){return!!e}},show_on_front:{controls:["page_on_front","page_for_posts"],callback:function(e){return"page"===e}},header_textcolor:{controls:["header_textcolor"],callback:function(e){return"blank"!==e}}},function(e,r){n(e,function(e){t.each(r.controls,function(t,i){n.control(i,function(t){var n=function(e){t.container.toggle(r.callback(e))};n(e.get());e.bind(n)})})})});n.control("display_header_text",function(e){var t="";e.elements[0].unsync(n("header_textcolor"));e.element=new n.Element(e.container.find("input"));e.element.set("blank"!==e.setting());e.element.bind(function(r){r||(t=n("header_textcolor").get());e.setting.set(r?t:"blank")});e.setting.bind(function(t){e.element.set("blank"!==t)})});n.control("header_image",function(e){e.setting.bind(function(t){t===e.params.removed&&e.settings.data.set(!1)});e.library.on("click","a",function(n){e.settings.data.set(t(this).data("customizeHeaderImageData"))});e.uploader.success=function(t){var r;n.ImageControl.prototype.success.call(e,t);r={attachment_id:t.get("id"),url:t.get("url"),thumbnail_url:t.get("url"),height:t.get("height"),width:t.get("width")};t.element.data("customizeHeaderImageData",r);e.settings.data.set(r)}});n.trigger("ready");var u=t(".back");u.focus();setTimeout(function(){u.focus()},200)})})(wp,jQuery);