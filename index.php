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
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>

        <?php
            $sql = "SELECT * FROM user;";
            $result = mysqli_query($conn, $sql);
            // do we have any result
            if(mysqli_num_rows($result) > 0){
                // spit te result out
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row["id"];
                    $sqlImg = "SELECT * FROM profileimg WHERE userid='$id';";
                    $resultImg = mysqli_query($conn, $sqlImg);
                    while($rowImg = mysqli_fetch_assoc($resultImg)){
                        echo "<div class='user-container'>";
                            if($rowImg["status"] === 0){
                                echo "<img src='uploads/profile".$id.".jpg?'".mt_rand().">";
                            }
                            else {
                                echo "<img src='uploads/deafult.jpg'>";
                            }
                            echo "<p>".$row["username"]."</p>";
                        echo "</div>";
                    }
                }
            }
            else {
                echo "There are no users yet!";
            }

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
                echo "
                    <form action='signup.php' method='post'>
                        <input type='text' name='first' placeholder='First Name'>
                        <input type='text' name='last' placeholder='Last Name'>
                        <input type='text' name='username' placeholder='Username'>
                        <input type='password' name='password' placeholder='Password'>
                        <button type='submit' name='signup'>Signup</button>
                    </form>
                ";
            }
        ?>

        <p>Login as user</p>
        <form action="login.php" method="POST">
            <button type="submit" name="submit-login">Login</button>
        </form>

        <p>Logout as user</p>
        <form action="logout.php" method="POST">
            <button type="submit" name="submit-logout">Logout</button>
        </form>
    </body>
</html>