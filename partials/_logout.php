
<?php
session_start();
unset($_SESSION["loggedin"]);
unset($_SESSION["useremail"]);
session_destroy();
echo 'Logged out';
header("Location: /php_learn/forums/index.php");
?>