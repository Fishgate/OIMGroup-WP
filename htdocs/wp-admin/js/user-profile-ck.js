(function(e){function t(){var t=e("#pass1").val(),n=e("#user_login").val(),r=e("#pass2").val(),i;e("#pass-strength-result").removeClass("short bad good strong");if(!t){e("#pass-strength-result").html(pwsL10n.empty);return}i=wp.passwordStrength.meter(t,wp.passwordStrength.userInputBlacklist(),r);switch(i){case 2:e("#pass-strength-result").addClass("bad").html(pwsL10n.bad);break;case 3:e("#pass-strength-result").addClass("good").html(pwsL10n.good);break;case 4:e("#pass-strength-result").addClass("strong").html(pwsL10n.strong);break;case 5:e("#pass-strength-result").addClass("short").html(pwsL10n.mismatch);break;default:e("#pass-strength-result").addClass("short").html(pwsL10n["short"])}}e(document).ready(function(){var n=e("#display_name");e("#pass1").val("").keyup(t);e("#pass2").val("").keyup(t);e("#pass-strength-result").show();e(".color-palette").click(function(){e(this).siblings('input[name="admin_color"]').prop("checked",!0)});n.length&&e("#first_name, #last_name, #nickname").bind("blur.user_profile",function(){var t=[],r={display_nickname:e("#nickname").val()||"",display_username:e("#user_login").val()||"",display_firstname:e("#first_name").val()||"",display_lastname:e("#last_name").val()||""};if(r.display_firstname&&r.display_lastname){r.display_firstlast=r.display_firstname+" "+r.display_lastname;r.display_lastfirst=r.display_lastname+" "+r.display_firstname}e.each(e("option",n),function(e,n){t.push(n.value)});e.each(r,function(i,s){if(!s)return;var o=s.replace(/<\/?[a-z][^>]*>/gi,"");if(r[i].length&&e.inArray(o,t)==-1){t.push(o);e("<option />",{text:o}).appendTo(n)}})})})})(jQuery);