<?php
    session_start();
    include_once "database.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Image Upload | PHP</title>
    </head>

    <body>

        <?php
            if (isset($_SESSION["id"])) {
                if ($_SESSION["id"] == 1){
                    echo "You are logged in as user #1.";
                }
                echo "
                    <form action='upload.php' method='POST' enctype='multipart/form-data'>
                        <input type='file' name='file'>
                        <button type='submit' name='submit'>Upload</button>
                    </form>";
            } 
            else {
                echo "You are not logged in.";
            }
        ?>

        <p>Login as user</p>
        <form action="login.php" action="POST">
            <button type="submit" name="submit-login">Login</button>
        </form>

        <p>Logout as user</p>
        <form action="logout.php" action="POST">
            <button type="submit" name="submit-logout">Logout</button>
        </form>
    </body>
</html>