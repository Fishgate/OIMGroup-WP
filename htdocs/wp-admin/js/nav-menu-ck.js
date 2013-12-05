/**
 * WordPress Administration Navigation Menu
 * Interface JS functions
 *
 * @version 2.0.0
 *
 * @package WordPress
 * @subpackage Administration
 */var wpNavMenu;(function(e){var t=wpNavMenu={options:{menuItemDepthPerLevel:30,globalMaxDepth:11},menuList:undefined,targetList:undefined,menusChanged:!1,isRTL:"undefined"!=typeof isRtl&&!!isRtl,negateIfRTL:"undefined"!=typeof isRtl&&isRtl?-1:1,init:function(){t.menuList=e("#menu-to-edit");t.targetList=t.menuList;this.jQueryExtensions();this.attachMenuEditListeners();this.setupInputWithDefaultTitle();this.attachQuickSearchListeners();this.attachThemeLocationsListeners();this.attachTabsPanelListeners();this.attachUnsavedChangesListener();t.menuList.length&&this.initSortables();menus.oneThemeLocationNoMenus&&e("#posttype-page").addSelectedToMenu(t.addMenuItemToBottom);this.initManageLocations();this.initAccessibility();this.initToggles()},jQueryExtensions:function(){e.fn.extend({menuItemDepth:function(){var e=t.isRTL?this.eq(0).css("margin-right"):this.eq(0).css("margin-left");return t.pxToDepth(e&&-1!=e.indexOf("px")?e.slice(0,-2):0)},updateDepthClass:function(t,n){return this.each(function(){var r=e(this);n=n||r.menuItemDepth();e(this).removeClass("menu-item-depth-"+n).addClass("menu-item-depth-"+t)})},shiftDepthClass:function(t){return this.each(function(){var n=e(this),r=n.menuItemDepth();e(this).removeClass("menu-item-depth-"+r).addClass("menu-item-depth-"+(r+t))})},childMenuItems:function(){var t=e();this.each(function(){var n=e(this),r=n.menuItemDepth(),i=n.next();while(i.length&&i.menuItemDepth()>r){t=t.add(i);i=i.next()}});return t},shiftHorizontally:function(t){return this.each(function(){var n=e(this),r=n.menuItemDepth(),i=r+t;n.moveHorizontally(i,r)})},moveHorizontally:function(t,n){return this.each(function(){var r=e(this),i=r.childMenuItems(),s=t-n,o=r.find(".is-submenu");r.updateDepthClass(t,n).updateParentMenuItemDBId();i&&i.each(function(t){var n=e(this),r=n.menuItemDepth(),i=r+s;n.updateDepthClass(i,r).updateParentMenuItemDBId()});0===t?o.hide():o.show()})},updateParentMenuItemDBId:function(){return this.each(function(){var t=e(this),n=t.find(".menu-item-data-parent-id"),r=parseInt(t.menuItemDepth()),i=r-1,s=t.prevAll(".menu-item-depth-"+i).first();0==r?n.val(0):n.val(s.find(".menu-item-data-db-id").val())})},hideAdvancedMenuItemFields:function(){return this.each(function(){var t=e(this);e(".hide-column-tog").not(":checked").each(function(){t.find(".field-"+e(this).val()).addClass("hidden-field")})})},addSelectedToMenu:function(n){return 0==e("#menu-to-edit").length?!1:this.each(function(){var r=e(this),i={},s=menus.oneThemeLocationNoMenus&&0==r.find(".tabs-panel-active .categorychecklist li input:checked").length?r.find('#page-all li input[type="checkbox"]'):r.find(".tabs-panel-active .categorychecklist li input:checked"),o=new RegExp("menu-item\\[([^\\]]*)");n=n||t.addMenuItemToBottom;if(!s.length)return!1;r.find(".spinner").show();e(s).each(function(){var r=e(this),s=o.exec(r.attr("name")),u="undefined"==typeof s[1]?0:parseInt(s[1],10);this.className&&-1!=this.className.indexOf("add-to-top")&&(n=t.addMenuItemToTop);i[u]=r.closest("li").getItemData("add-menu-item",u)});t.addItemToMenu(i,n,function(){s.removeAttr("checked");r.find(".spinner").hide()})})},getItemData:function(e,t){e=e||"menu-item";var n={},r,i=["menu-item-db-id","menu-item-object-id","menu-item-object","menu-item-parent-id","menu-item-position","menu-item-type","menu-item-title","menu-item-url","menu-item-description","menu-item-attr-title","menu-item-target","menu-item-classes","menu-item-xfn"];!t&&e=="menu-item"&&(t=this.find(".menu-item-data-db-id").val());if(!t)return n;this.find("input").each(function(){var s;r=i.length;while(r--){e=="menu-item"?s=i[r]+"["+t+"]":e=="add-menu-item"&&(s="menu-item["+t+"]["+i[r]+"]");this.name&&s==this.name&&(n[i[r]]=this.value)}});return n},setItemData:function(t,n,r){n=n||"menu-item";!r&&n=="menu-item"&&(r=e(".menu-item-data-db-id",this).val());if(!r)return this;this.find("input").each(function(){var i=e(this),s;e.each(t,function(e,t){n=="menu-item"?s=e+"["+r+"]":n=="add-menu-item"&&(s="menu-item["+r+"]["+e+"]");s==i.attr("name")&&i.val(t)})});return this}})},countMenuItems:function(t){return e(".menu-item-depth-"+t).length},moveMenuItem:function(n,r){var i=e("#menu-to-edit li");menuItemsCount=i.length,thisItem=n.parents("li.menu-item"),thisItemChildren=thisItem.childMenuItems(),thisItemData=thisItem.getItemData(),thisItemDepth=parseInt(thisItem.menuItemDepth()),thisItemPosition=parseInt(thisItem.index()),u=thisItem.next(),a=u.childMenuItems(),nextItemDepth=parseInt(u.menuItemDepth())+1,prevItem=thisItem.prev(),prevItemDepth=parseInt(prevItem.menuItemDepth()),prevItemId=prevItem.getItemData()["menu-item-db-id"];switch(r){case"up":var s=thisItemPosition-1;if(0===thisItemPosition)break;0===s&&0!==thisItemDepth&&thisItem.moveHorizontally(0,thisItemDepth);0!==prevItemDepth&&thisItem.moveHorizontally(prevItemDepth,thisItemDepth);if(thisItemChildren){var o=thisItem.add(thisItemChildren);o.detach().insertBefore(i.eq(s)).updateParentMenuItemDBId()}else thisItem.detach().insertBefore(i.eq(s)).updateParentMenuItemDBId();break;case"down":if(thisItemChildren){var o=thisItem.add(thisItemChildren),u=i.eq(o.length+thisItemPosition),a=0!==u.childMenuItems().length;if(a){var f=parseInt(u.menuItemDepth())+1;thisItem.moveHorizontally(f,thisItemDepth)}if(menuItemsCount===thisItemPosition+o.length)break;o.detach().insertAfter(i.eq(thisItemPosition+o.length)).updateParentMenuItemDBId()}else{0!==a.length&&thisItem.moveHorizontally(nextItemDepth,thisItemDepth);if(menuItemsCount===thisItemPosition+1)break;thisItem.detach().insertAfter(i.eq(thisItemPosition+1)).updateParentMenuItemDBId()}break;case"top":if(0===thisItemPosition)break;if(thisItemChildren){var o=thisItem.add(thisItemChildren);o.detach().insertBefore(i.eq(0)).updateParentMenuItemDBId()}else thisItem.detach().insertBefore(i.eq(0)).updateParentMenuItemDBId();break;case"left":if(0===thisItemDepth)break;thisItem.shiftHorizontally(-1);break;case"right":if(0===thisItemPosition)break;if(thisItemData["menu-item-parent-id"]===prevItemId)break;thisItem.shiftHorizontally(1)}n.focus();t.registerChange();t.refreshKeyboardAccessibility();t.refreshAdvancedAccessibility()},initAccessibility:function(){t.refreshKeyboardAccessibility();t.refreshAdvancedAccessibility();e(".menus-move-up").on("click",function(n){t.moveMenuItem(e(this).parents("li.menu-item").find("a.item-edit"),"up");n.preventDefault()});e(".menus-move-down").on("click",function(n){t.moveMenuItem(e(this).parents("li.menu-item").find("a.item-edit"),"down");n.preventDefault()});e(".menus-move-top").on("click",function(n){t.moveMenuItem(e(this).parents("li.menu-item").find("a.item-edit"),"top");n.preventDefault()});e(".menus-move-left").on("click",function(n){t.moveMenuItem(e(this).parents("li.menu-item").find("a.item-edit"),"left");n.preventDefault()});e(".menus-move-right").on("click",function(n){t.moveMenuItem(e(this).parents("li.menu-item").find("a.item-edit"),"right");n.preventDefault()})},refreshAdvancedAccessibility:function(){e(".menu-item-settings .field-move a").css("display","none");e(".item-edit").each(function(){var t=e(this),n=[],r="",i=t.closest("li.menu-item").first(),s=i.menuItemDepth(),o=0===s,u=t.closest(".menu-item-handle").find(".menu-item-title").text(),a=parseInt(i.index()),f=o?s:parseInt(s-1),l=i.prevAll(".menu-item-depth-"+f).first().find(".menu-item-title").text(),c=i.prevAll(".menu-item-depth-"+s).first().find(".menu-item-title").text(),h=e("#menu-to-edit li").length,p=i.nextAll(".menu-item-depth-"+s).length;if(0!==a){var d=i.find(".menus-move-up");d.prop("title",menus.moveUp).css("display","inline")}if(0!==a&&o){var d=i.find(".menus-move-top");d.prop("title",menus.moveToTop).css("display","inline")}if(a+1!==h&&0!==a){var d=i.find(".menus-move-down");d.prop("title",menus.moveDown).css("display","inline")}if(0===a&&0!==p){var d=i.find(".menus-move-down");d.prop("title",menus.moveDown).css("display","inline")}if(!o){var d=i.find(".menus-move-left"),v=menus.outFrom.replace("%s",l);d.prop("title",menus.moveOutFrom.replace("%s",l)).html(v).css("display","inline")}if(0!==a&&i.find(".menu-item-data-parent-id").val()!==i.prev().find(".menu-item-data-db-id").val()){var d=i.find(".menus-move-right"),v=menus.under.replace("%s",c);d.prop("title",menus.moveUnder.replace("%s",c)).html(v).css("display","inline")}if(o)var m=e(".menu-item-depth-0"),g=m.index(i)+1,h=m.length,y=menus.menuFocus.replace("%1$s",u).replace("%2$d",g).replace("%3$d",h);else{var b=i.prevAll(".menu-item-depth-"+parseInt(s-1)).first(),w=b.find(".menu-item-data-db-id").val(),E=b.find(".menu-item-title").text(),S=e('.menu-item .menu-item-data-parent-id[value="'+w+'"]'),g=e(S.parents(".menu-item").get().reverse()).index(i)+1;y=menus.subMenuFocus.replace("%1$s",u).replace("%2$d",g).replace("%3$s",E)}t.prop("title",y).html(y)})},refreshKeyboardAccessibility:function(){e(".item-edit").off("focus").on("focus",function(){e(this).off("keydown").on("keydown",function(n){var r=e(this);if(37!=n.which&&38!=n.which&&39!=n.which&&40!=n.which)return;r.off("keydown");if(1===e("#menu-to-edit li").length)return;var i={38:"up",40:"down",37:"left",39:"right"};e("body").hasClass("rtl")&&(i={38:"up",40:"down",39:"left",37:"right"});switch(i[n.which]){case"up":t.moveMenuItem(r,"up");break;case"down":t.moveMenuItem(r,"down");break;case"left":t.moveMenuItem(r,"left");break;case"right":t.moveMenuItem(r,"right")}e("#edit-"+thisItemData["menu-item-db-id"]).focus();return!1})})},initToggles:function(){postboxes.add_postbox_toggles("nav-menus");columns.useCheckboxesForHidden();columns.checked=function(t){e(".field-"+t).removeClass("hidden-field")};columns.unchecked=function(t){e(".field-"+t).addClass("hidden-field")};t.menuList.hideAdvancedMenuItemFields();e(".hide-postbox-tog").click(function(){var t=e(".accordion-container li.accordion-section").filter(":hidden").map(function(){return this.id}).get().join(",");e.post(ajaxurl,{action:"closed-postboxes",hidden:t,closedpostboxesnonce:jQuery("#closedpostboxesnonce").val(),page:"nav-menus"})})},initSortables:function(){function m(e){var n;o=e.placeholder.prev();u=e.placeholder.next();o[0]==e.item[0]&&(o=o.prev());u[0]==e.item[0]&&(u=u.next());a=o.length?o.offset().top+o.height():0;f=u.length?u.offset().top+u.height()/3:0;i=u.length?u.menuItemDepth():0;o.length?s=(n=o.menuItemDepth()+1)>t.options.globalMaxDepth?t.options.globalMaxDepth:n:s=0}function g(e,t){e.placeholder.updateDepthClass(t,n);n=t}function y(){if(!p[0].className)return 0;var e=p[0].className.match(/menu-max-depth-(\d+)/);return e&&e[1]?parseInt(e[1]):0}function b(n){var r,i=v;if(n===0)return;if(n>0){r=d+n;r>v&&(i=r)}else if(n<0&&d==v)while(!e(".menu-item-depth-"+i,t.menuList).length&&i>0)i--;p.removeClass("menu-max-depth-"+v).addClass("menu-max-depth-"+i);v=i}var n=0,r,i,s,o,u,a,f,l,c,h=t.menuList.offset().left,p=e("body"),d,v=y();0!=e("#menu-to-edit li").length&&e(".drag-instructions").show();h+=t.isRTL?t.menuList.width():0;t.menuList.sortable({handle:".menu-item-handle",placeholder:"sortable-placeholder",start:function(n,i){var s,o,u,a,f;t.isRTL&&(i.item[0].style.right="auto");c=i.item.children(".menu-item-transport");r=i.item.menuItemDepth();g(i,r);u=i.item.next()[0]==i.placeholder[0]?i.item.next():i.item;a=u.childMenuItems();c.append(a);s=c.outerHeight();s+=s>0?i.placeholder.css("margin-top").slice(0,-2)*1:0;s+=i.helper.outerHeight();l=s;s-=2;i.placeholder.height(s);d=r;a.each(function(){var t=e(this).menuItemDepth();d=t>d?t:d});o=i.helper.find(".menu-item-handle").outerWidth();o+=t.depthToPx(d-r);o-=2;i.placeholder.width(o);f=i.placeholder.next();f.css("margin-top",l+"px");i.placeholder.detach();e(this).sortable("refresh");i.item.after(i.placeholder);f.css("margin-top",0);m(i)},stop:function(e,i){var s,o=n-r;s=c.children().insertAfter(i.item);var u=i.item.find(".item-title .is-submenu");0<n?u.show():u.hide();if(o!=0){i.item.updateDepthClass(n);s.shiftDepthClass(o);b(o)}t.registerChange();i.item.updateParentMenuItemDBId();i.item[0].style.top=0;if(t.isRTL){i.item[0].style.left="auto";i.item[0].style.right=0}t.refreshKeyboardAccessibility();t.refreshAdvancedAccessibility()},change:function(e,n){n.placeholder.parent().hasClass("menu")||(o.length?o.after(n.placeholder):t.menuList.prepend(n.placeholder));m(n)},sort:function(r,o){var c=o.helper.offset(),p=t.isRTL?c.left+o.helper.width():c.left,d=t.negateIfRTL*t.pxToDepth(p-h);d>s||c.top<a?d=s:d<i&&(d=i);d!=n&&g(o,d);if(f&&c.top+l>f){u.after(o.placeholder);m(o);e(this).sortable("refreshPositions")}}})},initManageLocations:function(){e("#menu-locations-wrap form").submit(function(){window.onbeforeunload=null});e(".menu-location-menus select").on("change",function(){var t=e(this).closest("tr").find(".locations-edit-menu-link");e(this).find("option:selected").data("orig")?t.show():t.hide()})},attachMenuEditListeners:function(){var t=this;e("#update-nav-menu").bind("click",function(e){if(e.target&&e.target.className){if(-1!=e.target.className.indexOf("item-edit"))return t.eventOnClickEditLink(e.target);if(-1!=e.target.className.indexOf("menu-save"))return t.eventOnClickMenuSave(e.target);if(-1!=e.target.className.indexOf("menu-delete"))return t.eventOnClickMenuDelete(e.target);if(-1!=e.target.className.indexOf("item-delete"))return t.eventOnClickMenuItemDelete(e.target);if(-1!=e.target.className.indexOf("item-cancel"))return t.eventOnClickCancelLink(e.target)}});e('#add-custom-links input[type="text"]').keypress(function(t){if(t.keyCode===13){t.preventDefault();e("#submit-customlinkdiv").click()}})},setupInputWithDefaultTitle:function(){var t="input-with-default-title";e("."+t).each(function(){var n=e(this),r=n.attr("title"),i=n.val();n.data(t,r);if(""==i)n.val(r);else{if(r==i)return;n.removeClass(t)}}).focus(function(){var n=e(this);n.val()==n.data(t)&&n.val("").removeClass(t)}).blur(function(){var n=e(this);""==n.val()&&n.addClass(t).val(n.data(t))});e(".blank-slate .input-with-default-title").focus()},attachThemeLocationsListeners:function(){var t=e("#nav-menu-theme-locations"),n={};n.action="menu-locations-save";n["menu-settings-column-nonce"]=e("#menu-settings-column-nonce").val();t.find('input[type="submit"]').click(function(){t.find("select").each(function(){n[this.name]=e(this).val()});t.find(".spinner").show();e.post(ajaxurl,n,function(e){t.find(".spinner").hide()});return!1})},attachQuickSearchListeners:function(){var n;e(".quick-search").keypress(function(r){var i=e(this);if(13==r.which){t.updateQuickSearchResults(i);return!1}n&&clearTimeout(n);n=setTimeout(function(){t.updateQuickSearchResults(i)},400)}).attr("autocomplete","off")},updateQuickSearchResults:function(n){var r,i,s=2,o=n.val();if(o.length<s)return;r=n.parents(".tabs-panel");i={action:"menu-quick-search","response-format":"markup",menu:e("#menu").val(),"menu-settings-column-nonce":e("#menu-settings-column-nonce").val(),q:o,type:n.attr("name")};e(".spinner",r).show();e.post(ajaxurl,i,function(e){t.processQuickSearchQueryResponse(e,i,r)})},addCustomLink:function(n){var r=e("#custom-menu-item-url").val(),i=e("#custom-menu-item-name").val();n=n||t.addMenuItemToBottom;if(""==r||"http://"==r)return!1;e(".customlinkdiv .spinner").show();this.addLinkToMenu(r,i,n,function(){e(".customlinkdiv .spinner").hide();e("#custom-menu-item-name").val("").blur();e("#custom-menu-item-url").val("http://")})},addLinkToMenu:function(e,n,r,i){r=r||t.addMenuItemToBottom;i=i||function(){};t.addItemToMenu({"-1":{"menu-item-type":"custom","menu-item-url":e,"menu-item-title":n}},r,i)},addItemToMenu:function(t,n,r){var i=e("#menu").val(),s=e("#menu-settings-column-nonce").val();n=n||function(){};r=r||function(){};params={action:"add-menu-item",menu:i,"menu-settings-column-nonce":s,"menu-item":t};e.post(ajaxurl,params,function(t){var i=e("#menu-instructions");t=e.trim(t);n(t,params);e("li.pending").hide().fadeIn("slow");e(".drag-instructions").show();!i.hasClass("menu-instructions-inactive")&&i.siblings().length&&i.addClass("menu-instructions-inactive");r()})},addMenuItemToBottom:function(n,r){e(n).hideAdvancedMenuItemFields().appendTo(t.targetList);t.refreshKeyboardAccessibility();t.refreshAdvancedAccessibility()},addMenuItemToTop:function(n,r){e(n).hideAdvancedMenuItemFields().prependTo(t.targetList);t.refreshKeyboardAccessibility();t.refreshAdvancedAccessibility()},attachUnsavedChangesListener:function(){e("#menu-management input, #menu-management select, #menu-management, #menu-management textarea, .menu-location-menus select").change(function(){t.registerChange()});0!=e("#menu-to-edit").length||0!=e(".menu-location-menus select").length?window.onbeforeunload=function(){if(t.menusChanged)return navMenuL10n.saveAlert}:e("#menu-settings-column").find("input,select").end().find("a").attr("href","#").unbind("click")},registerChange:function(){t.menusChanged=!0},attachTabsPanelListeners:function(){e("#menu-settings-column").bind("click",function(n){var r,i,s,o,u=e(n.target);if(u.hasClass("nav-tab-link")){i=u.data("type");s=u.parents(".accordion-section-content").first();e("input",s).removeAttr("checked");e(".tabs-panel-active",s).removeClass("tabs-panel-active").addClass("tabs-panel-inactive");e("#"+i,s).removeClass("tabs-panel-inactive").addClass("tabs-panel-active");e(".tabs",s).removeClass("tabs");u.parent().addClass("tabs");e(".quick-search",s).focus();n.preventDefault()}else if(u.hasClass("select-all")){r=/#(.*)$/.exec(n.target.href);if(r&&r[1]){o=e("#"+r[1]+" .tabs-panel-active .menu-item-title input");o.length===o.filter(":checked").length?o.removeAttr("checked"):o.prop("checked",!0);return!1}}else{if(u.hasClass("submit-add-to-menu")){t.registerChange();n.target.id&&"submit-customlinkdiv"==n.target.id?t.addCustomLink(t.addMenuItemToBottom):n.target.id&&-1!=n.target.id.indexOf("submit-")&&e("#"+n.target.id.replace(/submit-/,"")).addSelectedToMenu(t.addMenuItemToBottom);return!1}if(u.hasClass("page-numbers")){e.post(ajaxurl,n.target.href.replace(/.*\?/,"").replace(/action=([^&]*)/,"")+"&action=menu-get-metabox",function(t){if(-1==t.indexOf("replace-id"))return;var n=e.parseJSON(t),r=document.getElementById(n["replace-id"]),i=document.createElement("div"),s=document.createElement("div");if(!n.markup||!r)return;s.innerHTML=n.markup?n.markup:"";r.parentNode.insertBefore(i,r);i.parentNode.removeChild(r);i.parentNode.insertBefore(s,i);i.parentNode.removeChild(i)});return!1}}})},eventOnClickEditLink:function(t){var n,r,i=/#(.*)$/.exec(t.href);if(i&&i[1]){n=e("#"+i[1]);r=n.parent();if(0!=r.length){if(r.hasClass("menu-item-edit-inactive")){n.data("menu-item-data")||n.data("menu-item-data",n.getItemData());n.slideDown("fast");r.removeClass("menu-item-edit-inactive").addClass("menu-item-edit-active")}else{n.slideUp("fast");r.removeClass("menu-item-edit-active").addClass("menu-item-edit-inactive")}return!1}}},eventOnClickCancelLink:function(t){var n=e(t).closest(".menu-item-settings"),r=e(t).closest(".menu-item");r.removeClass("menu-item-edit-active").addClass("menu-item-edit-inactive");n.setItemData(n.data("menu-item-data")).hide();return!1},eventOnClickMenuSave:function(n){var r="",i=e("#menu-name"),s=i.val();if(!s||s==i.attr("title")||!s.replace(/\s+/,"")){i.parent().addClass("form-invalid");return!1}e("#nav-menu-theme-locations select").each(function(){r+='<input type="hidden" name="'+this.name+'" value="'+e(this).val()+'" />'});e("#update-nav-menu").append(r);t.menuList.find(".menu-item-data-position").val(function(e){return e+1});window.onbeforeunload=null;return!0},eventOnClickMenuDelete:function(e){if(confirm(navMenuL10n.warnDeleteMenu)){window.onbeforeunload=null;return!0}return!1},eventOnClickMenuItemDelete:function(n){var r=parseInt(n.id.replace("delete-",""),10);t.removeMenuItem(e("#menu-item-"+r));t.registerChange();return!1},processQuickSearchQueryResponse:function(t,n,r){var i,s,o={},u=document.getElementById("nav-menu-meta"),a=new RegExp("menu-item\\[([^\\]]*)","g"),f=e("<div>").html(t).find("li"),l;if(!f.length){e(".categorychecklist",r).html("<li><p>"+navMenuL10n.noResultsFound+"</p></li>");e(".spinner",r).hide();return}f.each(function(){l=e(this);i=a.exec(l.html());if(i&&i[1]){s=i[1];while(u.elements["menu-item["+s+"][menu-item-type]"]||o[s])s--;o[s]=!0;s!=i[1]&&l.html(l.html().replace(new RegExp("menu-item\\["+i[1]+"\\]","g"),"menu-item["+s+"]"))}});e(".categorychecklist",r).html(f);e(".spinner",r).hide()},removeMenuItem:function(t){var n=t.childMenuItems();t.addClass("deleting").animate({opacity:0,height:0},350,function(){var r=e("#menu-instructions");t.remove();n.shiftDepthClass(-1).updateParentMenuItemDBId();if(0==e("#menu-to-edit li").length){e(".drag-instructions").hide();r.removeClass("menu-instructions-inactive")}})},depthToPx:function(e){return e*t.options.menuItemDepthPerLevel},pxToDepth:function(e){return Math.floor(e/t.options.menuItemDepthPerLevel)}};e(document).ready(function(){wpNavMenu.init()})})(jQuery);