<!DOCTYPE html>
<html>
<body>
 
<form method="post" action="login.php">
User Id: <input type="text" name="userid"><br>
Password: <input type="password" name="password"><br>
<input type="submit" value="Login">
</form>
 
</body>
</html>

<!DOCTYPE html>
<html>
<body>
 
<?php
$uid = $_POST['userid'];
$pw = $_POST['password'];
 
if($uid == 'ben' and $pw == 'ben23')
{    
    session_start();
    $_SESSION['sid']=session_id();
    echo "Logged in successfully";
}
?>
 
</body>
</html>

<!DOCTYPE html>
<html>
<body>
 
<?php
 
    echo "Logged out successfully";
 
    session_start();
    session_destroy();
 
?>
 
</body>
</html>