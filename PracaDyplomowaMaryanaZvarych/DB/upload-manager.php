<?php
include "funct-library.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];

        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        echo "file extension -> $ext /// file size -> $filesize /// file type-> $filetype";
        if (!array_key_exists($ext, $allowed)) {
            die("Error: Please select a valid file format.");
        }

        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize) {
            die("Error: File size is larger than the allowed limit.");
        }

        if (in_array($filetype, $allowed)) {
            if (file_exists("images/" . $filename)) {
                echo $filename . " already exists.";
            } else {
                move_uploaded_file($_FILES["photo"]["tmp_name"], "images/" . $filename);
                echo "Your image file was uploaded successfully.";
            }
        } else {
            echo "Error: There was a problem uploading your file. Please try again.";
        }
    } else {
        echo "Error: " . $_FILES["photo"]["error"];
    }

    $postTitle = correct_input($_POST["title"]);
    if ($postTitle == "") {
        $postTitle = "Title of post $filename";
    }

    $content = correct_input($_POST["content"]);

    require_once "config.php";
    $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $stmt = $mysqli->prepare("INSERT INTO blog (filename, title, content) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $filename, $postTitle, $content);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $mysqli->close();

    header('Location: ../add-post-page.php');
    exit();
}
?>
