<?php
include 'funct-animal-library.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];

        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) {
            die("Error: Please select a valid file format.");
        }

        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize) {
            die("Error: File size is larger than the allowed limit.");
        }

        if (in_array($filetype, $allowed)) {
            if (file_exists("images-gallery/" . $filename)) {
                echo $filename . " already exists.";
            } else {
                move_uploaded_file($_FILES["photo"]["tmp_name"], "images-gallery/" . $filename);
                echo "Your image file was uploaded successfully.";
            }
        } else {
            echo "Error: There was a problem uploading your file. Please try again.";
        }
    } else {
        echo "Error: " . $_FILES["photo"]["error"];
    }

    $photos = $_FILES["zdjecia"];
    $imie = correct_animal_input($_POST["imie"]);
    $directory_path = "images-gallery/" . $imie;

    if (!file_exists($directory_path)) {
        mkdir($directory_path, 0777, true);
    }

    $galeria_zdjec = array();

    foreach ($photos["tmp_name"] as $index => $tmp_name) {
        $file_name = $photos["name"][$index];
        $file_location = $photos["tmp_name"][$index];

        $new_location = $directory_path . "/" . $file_name;
        move_uploaded_file($file_location, $new_location);

        $galeria_zdjec[] = $file_name;
    }

    $galeria_zdjec_json = json_encode($galeria_zdjec);

    $imie = correct_animal_input($_POST["imie"]);
    $rasa = correct_animal_input($_POST["rasa"]);
    $wiek = floatval($_POST["wiek"]);
    $plec = correct_animal_input($_POST["plec"]);
    $waga = floatval($_POST["waga"]);
    $historia = correct_animal_input($_POST["historia"]);

    require_once "config.php";
    $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $stmt = $mysqli->prepare("INSERT INTO zwierzeta (filename, imie, rasa, wiek, plec, waga, historia, galeria_zdjec) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $filename, $imie, $rasa, $wiek, $plec, $waga, $historia, $galeria_zdjec_json);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $mysqli->close();

    header('Location: ../add-animal-page.php');
    exit();
}
?>
