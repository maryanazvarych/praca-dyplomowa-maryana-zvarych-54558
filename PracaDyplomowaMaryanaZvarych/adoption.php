<?php
    include 'header.html';
?>
<body>
<section class="banner-home nav_mg">
    <div class="bg banner-wrapper" style="background-image:url('img/adoption.jpg');">
        <div class="container">
            <div class="row">
                <div class="banner-content">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="banner-title">
                            <h1 class="">Adopcja</h1>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-us double-pad-top" style="background-color:#fafafa;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 flex-align-column order-md-1 order-2">
                    <div style="background-image:url('img/3.jpg')" class="about-us-img"></div>
                </div>
                <div class="col-md-6 flex-align-column order-md-2 order-1">
                <div class="er-title-2">O adopcji</div>
                <div class="tmp-separator"></div>
                    <div class="desc">
                        <p>Adopcja zwierzaka to wspaniała decyzja, która może odmienić życie zarówno Twoje, jak i naszego podopiecznego. Każdy zwierzak w naszym schronisku czeka na kochający dom, w którym znajdzie bezpieczeństwo i miłość. Przejrzyj profile naszych podopiecznych na naszej stronie internetowej lub odwiedź nas osobiście, aby poznać swojego przyszłego przyjaciela. Skontaktuj się z nami, aby dowiedzieć się więcej o procesie adopcji i rozpocząć nową przygodę z lojalnym towarzyszem u boku! </p>
                    </div>
                </div>   
            </div>
        </div>
</section>

<?php
$tekst = file_get_contents('texts/adoption-1');
?>
<section class="about-us double-pad" style="background-color:#d3e4df;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="er-title-2 text-center">Proces adopcji</div>
                <div class="desc">
                    <p> <?php echo $tekst; ?></p>
                </div>
            </div>  
        </div>
    </div>
</section> 


<section class="adoption-cta bg w-100 " style="background-color:var(--second-bg-color);">
        <div class="container">
            <div class="row  cta-wrapper-bg">
                <div class="col-xl-8">
                    <div class="cta-left-col w-100">
                        <div class="er-title-3">
                                Jeszcze się zastanawiasz?
                        </div>  
                        <div class="er-title-5">
                        Jeśli masz dodatkowe pytania dotyczące procesu adopcji, nie wahaj się skontaktować z naszym zespołem. Jesteśmy tutaj, aby Ci pomóc znaleźć idealnego przyjaciela i uczynić proces adopcji jak najłatwiejszym i bardziej satysfakcjonującym.
                        </div>
                    </div>
                </div>
                <div class="col-xl-2" style="align-content: center;">
                    <div class="cta-right-col w-100">
                        <div class="def-btn-bg">
                            <a href="contact.php">
                                Kontakt
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>


<?php
include 'DB/funct-animal-library.php';
?>
<section class="animals-section double-pad-bottom"> 
    <div class="container">
        <div class="row first-row">
            <div class="col-lg-8">
                <div class="er-title-2">Nasze Zwierzęta</div>
                <div class="desc">
                </div>
                <div class="tmp-separator"></div>
            </div>
            <div class="col-lg-4">
                <div class="btn-home-wrapper">
                    <div class="def-btn-bg">
                        <a href="animals.php">
                        Zobacz więcej
                        </a>
                    </div>
                </div>
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
                $counter = 0;
                foreach ($myAnimals as $myK => $myAnimal) {
                    if ($counter < 3) { 
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
                        $counter++; 
                    } else {
                        break; 
                    }
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