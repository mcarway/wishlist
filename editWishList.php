<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
        <?php
        session_start();
        if (array_key_exists("user", $_SESSION)) {
            echo "Hello " . $_SESSION['user'];
        }
        else {
            header('Location: index.php');
            exit;
        }
        ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <table border="black">
            <tr>
            <th>Item</th>
            <th>Due Date</th>
            </tr>
            <?php
            $result = WishDB::getInstance()->get_wishes_by_wisher_id($wisherID);
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr><td>" . htmlentities($row['description']) . "</td>";
                echo "<td>" . htmlentities($row['due_date']) . "</td></tr>\n";
            }
            mysqli_free_result($result);
            ?>
        </table>
        <form name="addNewWish" action="editWish.php">
            <input type="submit" value="Add Wish">
        </form>
    </body>
</html>