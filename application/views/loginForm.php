<h1>Login form</h1><form method='post'>
    <?php
    if(isset($error)){
        foreach($error as $value){
            if($value=='SHORT_USERNAME'){
                $print='Your username is too short!';
            }
            elseif($value=='SHORT_PASSWORD'){
                $print='Your password is too short!';
            }
            else{
                $print='Wrong details. Sorry :(';
            }
            
            echo '<div class="error">'.$print.'</div>';
        }
    }
    ?>
    <table>
        <tr><td>Username</td><td><input type='text' name='username'</td></tr>
        <tr><td>Password</td><td><input type='password' name='password'</td></tr>
        <tr><td colspan='2'><input type='submit' name='act' value='Login'</td></tr>
    </table>
    <a href="<?=  base_url();?>index.php/login/forgotPass">Forgot password?</a>
</form>