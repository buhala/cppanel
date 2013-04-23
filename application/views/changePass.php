<h1>Change password</h1>
<?php
if(isset($error)){
    foreach($error as $value){
        if($value=='CURPASS_SHORT'){
            echo 'Your current password is too short, input it again!';
        }
        elseif($value=='NEWPASS_SHORT'){
            echo 'Your new password is too short';
        }
        elseif($value=='NEWPASS_MISMATCH'){
            echo 'New password does not match with repeated one!';
        }
        else{
            echo 'Old password does not match the one from the database';
        }
    }
}
if(isset($success)){//DO NOT THROW A NOTICE PLEASE. Thank you!
    if($success==true){
        echo 'Your password is changed!';
    }
}
?>
<form method='post'><table>
    <tr><td>Current password:</td><td><input type='password' name='curpass'></td></tr>
    <tr><td>New password:</td><td><input type='password' name='newpass'></td></tr>
    <tr><td>New password(again):</td><td><input type='password' name='newpassagain'></td></tr>
    <tr><td colspan='2'><input type='submit' name='act' value='Change it!'></td></tr></table>
</form>