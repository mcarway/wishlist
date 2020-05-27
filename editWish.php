<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

        <?php
       session_start();
        if (!array_key_exists("user", $_SESSION)) {
            header('Location: index.php');
            exit;
         }
        ?>
<html>
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST")
            $wish = array("description" => $_POST['wish'],
                        "due_date" => $_POST['dueDate']);
        else
            $wish = array("description" => "",
                        "due_date" => "");
?>
        <form name="editWish" action="editWish.php" method="POST">
            Describe your wish: <input type="text" name="wish"  value="<?php echo $wish['description'];?>" /><br/>
            When do you want to get it? <input type="text" name="dueDate" value="<?php echo $wish['due_date']; ?>"/><br/>
            <input type="submit" name="saveWish" value="Save Changes"/>
            <input type="submit" name="back" value="Back to the List"/>
        </form>
    </body>
</html>