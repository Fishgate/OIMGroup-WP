addComment={moveForm:function(e,t,n,r){var i,s=this,o=s.I(e),u=s.I(n),a=s.I("cancel-comment-reply-link"),f=s.I("comment_parent"),l=s.I("comment_post_ID");if(o&&u&&a&&f){s.respondId=n,r=r||!1,s.I("wp-temp-form-div")||(i=document.createElement("div"),i.id="wp-temp-form-div",i.style.display="none",u.parentNode.insertBefore(i,u)),o.parentNode.insertBefore(u,o.nextSibling),l&&r&&(l.value=r),f.value=t,a.style.display="",a.onclick=function(){var e=addComment,t=e.I("wp-temp-form-div"),n=e.I(e.respondId);if(t&&n)return e.I("comment_parent").value="0",t.parentNode.insertBefore(n,t),t.parentNode.removeChild(t),this.style.display="none",this.onclick=null,!1};try{s.I("comment").focus()}catch(c){}return!1}},I:function(e){return document.getElementById(e)}};