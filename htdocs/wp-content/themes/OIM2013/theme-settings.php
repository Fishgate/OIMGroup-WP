<?php 

if(!current_user_can('manage_options')){ wp_die('You do not have sufficient permissions to access this page.'); } 


function save_setting($post_var, $option_name){
    update_option($option_name, esc_attr($post_var));
}

if (isset($_POST["update_settings"])) {
    $POST = array_map('trim', $_POST);
    
    save_setting($POST["fb_url"], "facebook_url");
    save_setting($POST["tw_url"], "twitter_url");
    save_setting($POST["yt_url"], "youtube_url");
    save_setting($POST["li_url"], "linkedin_url");
    save_setting($POST["footer_col1"], "footer_col1");
    save_setting($POST["footer_col2"], "footer_col2");
    save_setting($POST["footer_col3"], "footer_col3");
   
    echo '<div id="message" class="updated">Settings saved</div>';
} 
    
?>

<div class="wrap">  
    <?php screen_icon('themes'); ?> <h2>OIM Theme Settings</h2>  

    <form method="POST" action="">  
        <table class="form-table">  
            <tr valign="top">  
                <th scope="row"><label for="fb_url">Facebook URL:</label></th>
                <td><input type="text" name="fb_url" value="<?php echo get_option("facebook_url"); ?>" size="40" /></td>
            </tr>
            
            <tr valign="top">  
                <th scope="row"><label for="tw_url">Twitter URL:</label></th>
                <td><input type="text" name="tw_url" value="<?php echo get_option("twitter_url"); ?>" size="40" /></td>
            </tr>
            
            <tr valign="top">  
                <th scope="row"><label for="yt_url">Youtube URL:</label></th>
                <td><input type="text" name="yt_url" value="<?php echo get_option("youtube_url"); ?>" size="40" /></td>
            </tr>
            
            <tr valign="top">  
                <th scope="row"><label for="li_url">LinkedIn URL:</label></th>
                <td><input type="text" name="li_url" value="<?php echo get_option("linkedin_url"); ?>" size="40" /></td>
            </tr>
            
            <tr valign="top">  
                <th scope="row"><label>Footer Feeds:</label></th>
                <td>
                    <?php                                       
                        function list_parent_options($select_name, $menu_items_array){
                            echo '<select style="width: 188px" name="'.$select_name.'">';
                                foreach($menu_items_array as $item){
                                    if(has_children($menu_items_array, $item->ID)){
                                        if(trim(get_option($select_name)) == trim($item->title)){
                                            echo '<option selected="selected">'.$item->title.'</option>';
                                        }else{
                                            echo '<option>'.$item->title.'</option>';
                                        }
                                    }
                                }
                            echo '</select>'; 
                        }
                        
                        $menus = wp_get_nav_menus(); // get all active menus
                        $locations = get_nav_menu_locations(); // get all menu location info
                        $location_id = 'main-nav'; // the menu location slug we are looking for
                        
                        if (isset($locations[$location_id])) {
                            foreach ($menus as $menu) {
                                if ($menu->term_id == $locations[$location_id]) {

                                    $menu_items = wp_get_nav_menu_items($menu);
                                    
                                    list_parent_options('footer_col1', $menu_items);
                                    list_parent_options('footer_col2', $menu_items);
                                    list_parent_options('footer_col3', $menu_items);
                                    
                                    break;
                                }
                            }
                        }
                    ?>
                    
                </td>
            </tr>
            
        </table>

        <input type="hidden" name="update_settings" value="Y" />
        <p><input type="submit" value="Save settings" class="button-primary"/></p>
    </form>
</div>  