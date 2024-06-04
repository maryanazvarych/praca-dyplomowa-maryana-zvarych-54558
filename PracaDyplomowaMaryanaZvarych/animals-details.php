<?php
session_start();
include 'DB/funct-animal-library.php';
include 'header.html'; 
?>
<body>
<section class="container one-animal-section nav_mg">
    <div class="row">
        <div class="col-md-12 text-center">
            <?php
            $imgDir = "DB/images-gallery"; 

            try {
                if (!is_dir($imgDir)) {
                    throw new Exception('Directory with animal images does not exist.');
                }

                if (isset($_GET['aid'])) {
                    $aId = (int)$_GET['aid'];
                } else {
                    $aId = 1; 
                }

                $myAnimals = loadMyAnimalContent();
                if (empty($myAnimals)) {
                    throw new Exception('Database table with animals is empty.');
                }

                $count = count($myAnimals);

                if ($aId < 1 || $aId > $count) {
                    $aId = 1;
                }
                $animal = $myAnimals[$aId];
                $imgName = $animal->filename;
                $imie = $animal->imie;
                $rasa = $animal->rasa;
                $wiek = $animal->wiek;
                $plec = $animal->plec;
                $waga = $animal->waga;
                $historia = $animal->historia;
                $galeria_zdjec = $animal->galeria_zdjec;

                echo "<div class=\"title-1\">$imie</div>";
                echo "<hr>";
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-7">
            <?php
            $aHead = "<a href=\"./animals.php\">";
            $aFoot = "</a>";

            echo "$aHead<img src=\"$imgDir/$imgName\" alt=\"$imgName\" class=\"img-fluid\">$aFoot"; 
            ?>
        </div>

        <div class="col-md-5">
            <div class="title-2">&#128062; Rasa: <?php echo $rasa; ?></div>
            <div class="title-2">&#128062; Wiek: <?php echo $wiek; ?> lat</div>
            <div class="title-2">&#128062; Płeć: <?php echo $plec; ?></div>
            <div class="title-2">&#128062; Waga: <?php echo $waga; ?> kg</div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mt-4">
            <p><?php echo $historia; ?></p>
        </div>
    </div>

    <div class="row gallery-animals mt-4">
        <?php
            if (!empty($galeria_zdjec)) {
                if (is_string($galeria_zdjec)) {
                    $galeria_zdjec = json_decode($galeria_zdjec);
                }
                foreach ($galeria_zdjec as $zdjecie) {
                    echo "<div class=\"col-md-3 col-sm-6 col-12 animal-photo\">"; 
                    echo "<img src=\"$zdjecie\" alt=\"Zdjęcie\" data-toggle=\"modal\" data-target=\"#photoModal\">";
                    echo "</div>";
                }
            } else {
                echo "<div class=\"col-md-12\"><p class=\"text-center\">Brak zdjęć w galerii.</p></div>";
            }
        ?>
    </div>
</section>

<div class="modal fade" id="photoModal" tabindex="-1" role="dialog" aria-labelledby="photoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <img src="" class="img-fluid" id="modalImage" alt="Zdjęcie">
      </div>
    </div>
  </div>
</div>

<script>
$(document).on('click', '[data-target="#photoModal"]', function () {
    var image = $(this).attr('src');
    $('#modalImage').attr('src', image);
});
</script>

<?php
    } catch (Exception $e) {
        echo "<p>An error was encountered: " . $e->getMessage() . "</p>";
    }

    include 'footer.html';
?>

</body>
</html>
