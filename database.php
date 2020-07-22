<?php

$conn = mysqli_connect("localhost", "root", "", "imgupload");

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}