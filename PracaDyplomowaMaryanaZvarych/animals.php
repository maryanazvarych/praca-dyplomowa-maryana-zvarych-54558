<?php
include 'DB/funct-animal-library.php';
include 'header.html';
?>
<body>

<section class="banner-home nav_mg">
    <div class="bg banner-wrapper">
        <video autoplay="autoplay" loop="loop" muted="" playsinline="" width="100%" height="auto">
            <source src="video/video-1.mp4">
        </video>
        <div class="container rel">
            <div class="row">
                <div class="banner-content">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="banner-title">
                            <h1 class="">Zwierzęta</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="animals-section"> 
    <div class="container">
        <div class="row first-row">
            <div class="col-lg-8">
                <div class="er-title-2">Nasze Zwierzęta</div>
                <div class="desc">
                Poznaj naszą wspaniałą rodzinę! Tutaj znajdziesz zdjęcia wszystkich naszych podopiecznych - od kociąt po psy i inne zwierzęta czekające na swój szczęśliwy dom. Każde zwierzę ma swoją unikalną historię i osobowość, ale wszystkie mają jedno wspólne - potrzebują Twojej miłości i troski. Przeglądaj naszą galerię, a być może znajdziesz swojego nowego najlepszego przyjaciela!
                </div>
                <div class="tmp-separator"></div>
            </div>
        </div>
        <div class="row">
            <?php
            $imgDir = "DB/images-gallery";
            try {
                if (!is_dir($imgDir)) {
                    throw new Exception('Image directory does not exist.');
                }

                $myAnimals = loadMyAnimalContent();
                foreach ($myAnimals as $myK => $myAnimal) {
                    $imgName = $myAnimal->filename;
                    $wiek = $myAnimal->wiek;
                    $imgStyle = "style=\"background-image: url('$imgDir/$imgName');\"";
                    $aTitle = $myAnimal->imie;
                    echo "<div class=\"col-lg-4 col-md-6 col-sm-6\">
                            <div class=\"one-animal\"> 
                                <a href=\"./animals-details.php?aid=$myK\">
                                    <div class=\"img_th\" $imgStyle></div>
                                </a>
                                <div class=\"name-age\">
                                    $aTitle 
                                    <span class=\"age\">$wiek lat</span>
                                </div>
                                <p class=\"btn-wrapper\"><a href=\"./animals-details.php?aid=$myK\" class=\"btn-animals\">Zobacz więcej</a></p>
                            </div>
                        </div>";
                }
            } catch (Exception $e) {
                echo "<p>An error was encountered: " . $e->getMessage() . "</p>";
            }
            ?>
        </div>
    </div>
</section>



<?php
include 'footer.html';
?>

</body>
</html>
