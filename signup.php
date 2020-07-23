<?php

include_once "database.php";

// if(isset($_POST["signup"])){
    $first = $_POST["first"];
    $last = $_POST["last"];
    $password = $_POST["password"];
    $username = $_POST["username"];

    // insert given data into db
    $sql = "INSERT INTO user (first, last, username, password) VALUES ('$first', '$last', '$username', '$password');";
    mysqli_query($conn, $sql);
    
    // display data about user
    $sql = "SELECT * FROM user WHERE username='$username' AND first='$first';";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $userid = $row["id"];
            $sql = "INSERT INTO profileimg (userid, status) VALUES ('$userid', 1);";
            mysqli_query($conn, $sql);
            header("Location: index.php");
        }
    }
    else {
        echo "You have an error!";
    }
// }