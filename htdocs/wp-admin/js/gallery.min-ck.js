jQuery(document).ready(function(e){var t,n,r,i=!1;n=function(){t=e("#media-items").sortable({items:"div.media-item",placeholder:"sorthelper",axis:"y",distance:2,handle:"div.filename",stop:function(){var t=e("#media-items").sortable("toArray"),n=t.length;e.each(t,function(t,r){var s=i?n-t:1+t;e("#"+r+" .menu_order input").val(s)})}})},sortIt=function(){var t=e(".menu_order_input"),n=t.length;t.each(function(t){var r=i?n-t:1+t;e(this).val(r)})},clearAll=function(t){t=t||0,e(".menu_order_input").each(function(){("0"==this.value||t)&&(this.value="")})},e("#asc").click(function(){return i=!1,sortIt(),!1}),e("#desc").click(function(){return i=!0,sortIt(),!1}),e("#clear").click(function(){return clearAll(1),!1}),e("#showall").click(function(){return e("#sort-buttons span a").toggle(),e("a.describe-toggle-on").hide(),e("a.describe-toggle-off, table.slidetoggle").show(),e("img.pinkynail").toggle(!1),!1}),e("#hideall").click(function(){return e("#sort-buttons span a").toggle(),e("a.describe-toggle-on").show(),e("a.describe-toggle-off, table.slidetoggle").hide(),e("img.pinkynail").toggle(!0),!1}),n(),clearAll(),e("#media-items>*").length>1&&(r=wpgallery.getWin(),e("#save-all, #gallery-settings").show(),"undefined"!=typeof r.tinyMCE&&r.tinyMCE.activeEditor&&!r.tinyMCE.activeEditor.isHidden()?(wpgallery.mcemode=!0,wpgallery.init()):e("#insert-gallery").show())}),jQuery(window).unload(function(){tinymce=tinyMCE=wpgallery=null});var tinymce=null,tinyMCE,wpgallery;wpgallery={mcemode:!1,editor:{},dom:{},is_update:!1,el:{},I:function(e){return document.getElementById(e)},init:function(){var e,t,n,r,i=this,s=i.getWin();if(i.mcemode){for(e=(""+document.location.search).replace(/^\?/,"").split("&"),t={},n=0;n<e.length;n++)r=e[n].split("="),t[unescape(r[0])]=unescape(r[1]);t.mce_rdomain&&(document.domain=t.mce_rdomain),tinymce=s.tinymce,tinyMCE=s.tinyMCE,i.editor=tinymce.EditorManager.activeEditor,i.setup()}},getWin:function(){return window.dialogArguments||opener||parent||top},setup:function(){var e,t,n,r,i,s,o=this,u=o.editor;if(o.mcemode){if(o.el=u.selection.getNode(),"IMG"!=o.el.nodeName||!u.dom.hasClass(o.el,"wpGallery")){if(!(t=u.dom.select("img.wpGallery"))||!t[0])return"1"==getUserSetting("galfile")&&(o.I("linkto-file").checked="checked"),"1"==getUserSetting("galdesc")&&(o.I("order-desc").checked="checked"),getUserSetting("galcols")&&(o.I("columns").value=getUserSetting("galcols")),getUserSetting("galord")&&(o.I("orderby").value=getUserSetting("galord")),jQuery("#insert-gallery").show(),void 0;o.el=t[0]}e=u.dom.getAttrib(o.el,"title"),e=u.dom.decode(e),e?(jQuery("#update-gallery").show(),o.is_update=!0,n=e.match(/columns=['"]([0-9]+)['"]/),r=e.match(/link=['"]([^'"]+)['"]/i),i=e.match(/order=['"]([^'"]+)['"]/i),s=e.match(/orderby=['"]([^'"]+)['"]/i),r&&r[1]&&(o.I("linkto-file").checked="checked"),i&&i[1]&&(o.I("order-desc").checked="checked"),n&&n[1]&&(o.I("columns").value=""+n[1]),s&&s[1]&&(o.I("orderby").value=s[1])):jQuery("#insert-gallery").show()}},update:function(){var e,t=this,n=t.editor,r="";return t.mcemode&&t.is_update?("IMG"==t.el.nodeName&&(r=n.dom.decode(n.dom.getAttrib(t.el,"title")),r=r.replace(/\s*(order|link|columns|orderby)=['"]([^'"]+)['"]/gi,""),r+=t.getSettings(),n.dom.setAttrib(t.el,"title",r),t.getWin().tb_remove()),void 0):(e="[gallery"+t.getSettings()+"]",t.getWin().send_to_editor(e),void 0)},getSettings:function(){var e=this.I,t="";return e("linkto-file").checked&&(t+=' link="file"',setUserSetting("galfile","1")),e("order-desc").checked&&(t+=' order="DESC"',setUserSetting("galdesc","1")),3!=e("columns").value&&(t+=' columns="'+e("columns").value+'"',setUserSetting("galcols",e("columns").value)),"menu_order"!=e("orderby").value&&(t+=' orderby="'+e("orderby").value+'"',setUserSetting("galord",e("orderby").value)),t}};