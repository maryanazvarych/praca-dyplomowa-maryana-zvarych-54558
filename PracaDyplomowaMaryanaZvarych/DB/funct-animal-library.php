<?php
class myAnimal {
    public $id, $filename, $imie, $rasa, $wiek, $plec, $waga, $historia, $galeria_zdjec;
    
    public function __construct($id, $filename, $imie, $rasa, $wiek, $plec, $waga, $historia, $galeria_zdjec) {
        $this->id = $id;
        $this->filename = $filename;
        $this->imie = $imie;
        $this->rasa = $rasa;
        $this->wiek = $wiek;
        $this->plec = $plec;
        $this->waga = $waga;
        $this->historia = $historia;
        $this->galeria_zdjec = $galeria_zdjec;
    }
}

function loadMyAnimalContent() {
    require_once "config.php";

    $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $sql = "SELECT id, filename, imie, rasa, wiek, plec, waga, historia FROM zwierzeta";
    $result = $mysqli->query($sql);
    $animals = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $imie = $row["imie"];
            $directory_path = "DB/images-gallery/" . $imie;
            $galeria_zdjec = [];

            if (is_dir($directory_path)) {
                $zdjecia = scandir($directory_path);
                foreach ($zdjecia as $zdjecie) {
                    if ($zdjecie != "." && $zdjecie != "..") {
                        $galeria_zdjec[] = $directory_path . "/" . $zdjecie;
                    }
                }
            }

            $animalInfo = new myAnimal(
                $row["id"],
                $row["filename"],
                $row["imie"],
                $row["rasa"],
                $row["wiek"],
                $row["plec"],
                $row["waga"],
                $row["historia"],
                $galeria_zdjec 
            );
            $animals[$row["id"]] = $animalInfo;
        }
    } else {
        echo "No animals in database";
    }

    $mysqli->close();
    return $animals;
}


function correct_animal_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
