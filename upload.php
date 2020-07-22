<?php

if (isset($_POST["submit"])){
    $file = $_FILES["file"];

    $fileName = $file["name"];
    $fileTmpName = $file["tmp_name"];
    $fileError = $file["error"];
    $fileSize = $file["size"];
    $fileType = $file["type"];

    // We get the name of the file and extension
    $fileExt = explode(".", $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array("jpg", "jpeg", "png", "pdf", "webp", "svg");

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            // bytes (2MB)
            if($fileSize < 2000000){
                $fileNameNew = uniqid("", true).".".$fileActualExt;
                $fileDestination = "uploads/".$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                header("Location: index.php?upload=success");
            }
            else {
                echo "Your file is too big, limit is 2MB.";
            }
        }   
        else {
            echo "There was an error uploading your file!";
        }
    }
    else {
        echo "You can not upload files of this type!";
    }
}