<h1>Add coins</h1>
<?php
if(isset($success)){
    echo 'Coins were added successfully!';
}
?>
<table><tr><td><form method='post'>Coins to add</td><td><input type='text' name='coins'></td></tr>
    <tr><td colspan='2'><input type='submit' name='act' value='Add coins'></td></tr>
</form></table>
