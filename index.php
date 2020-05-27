<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require_once("Includes/db.php");
$logonSuccess = false;

// verify user's credentials
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $logonSuccess = (WishDB::getInstance()->verify_wisher_credentials($_POST['user'], $_POST['userpassword']));
    if ($logonSuccess == true) {
      session_start();
      $_SESSION['user'] = $_POST['user'];
      header('Location: editWishList.php');
      exit;
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form name="wishlist" method="GET" action="wishlist.php">
            Show wishlist of: 
            <input type="text" name="user" value="" />
            <input type="submit" value="Go" />
        </form> 
        <br>Still don't have a wish list?! <a href="createNewWisher.php">Create now</a>
        
        <form name="logon" action="index.php" method="POST" >
            Username: <input type="text" name="user">
            Password  <input type="password" name="userpassword">
            <input type="submit" value="Edit My Wish List">
            <?php
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    if (!$logonSuccess)
                        echo "Invalid name and/or password";
                }
            ?>
        </form>
</body>
</html>
