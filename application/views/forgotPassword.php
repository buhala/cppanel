
<h1>Forgot password</h1>
<?php
    if(isset($success)){
        if($success==1){
            echo 'Your password has been changed successfully! Check your email to get it!';
        }
        else{
            foreach($error as $value){
                if($value=='INVALID_MAIL'){
                    echo 'Your email is invalid!';
                }
                else{
                    echo 'Your email does not exist in our database';
                }
            }
        }
    }
?>
<table><form method="post"><tr><td>Email</td><td><input type="text" name="email"</td></tr>
        <tr><td colspan="2"><input type="submit" name="act" value="Change it"></td></tr></form></table>