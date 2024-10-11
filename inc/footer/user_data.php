<div>
<?php 
if(is_loggged_in()){
   $user_info_arr = wpent_get_current_user();
   $user_image_url = wpent_get_user_image();
   if($user_image_url){
     echo '<img src="'.$user_image_url.'" alt="Profile Picture" style="width:40px; height:50px"/>'. $user_info_arr["user_fields"]['username'];
   } else {
     echo 'Profile picture not found';
   }
} else {
   echo 'No login';
}
?>
</div>