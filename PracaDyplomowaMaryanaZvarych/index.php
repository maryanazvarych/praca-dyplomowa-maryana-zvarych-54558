<?php
session_start();
require_once "DB/create-database.php";
if(isset($_SERVER['PHP_SELF'])){
	$_SESSION["filename"] = $_SERVER['PHP_SELF'];
}
include 'header.html';
include 'DB/funct-library.php';

?>

<body>
<section class="banner-home nav_mg">
    <div class="bg banner-wrapper" style="background-image:url('img/banner.jpg');">
        <div class="container">
            <div class="row">
                <div class="banner-content">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="banner-title">
                            <h2 class="">Schronisko</h2>
                            <h1 class="">Puchata przystań</h1>  
                        </div>
                        <div class="desc">
                            <p>Znajdź swojego nowego najlepszego przyjaciela w naszym schronisku dla zwierząt. 
                                Codziennie otwieramy nasze serca i drzwi dla potrzebujących futrzaków. Pomóż 
                                nam zmieniać życia - adoptuj, wesprzyj naszą misję lub po prostu odwiedź nas,
                                 aby przytulić naszych podopiecznych. Razem tworzymy lepsze jutro dla naszych
                                  zwierzęcych przyjaciół! </p>
                        </div>
                        <div class="def-btn mt-30">
                            <a href="adoption.php">Adoptuję</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-us">
        <div class="container">
            <div class="row">
                <div class="col-md-6 flex-align-column order-md-1 order-2">
                    <div style="background-image:url('img/about-us-1.jpg')" class="about-us-img"></div>
                </div>
                <div class="col-md-6 flex-align-column order-md-2 order-1">
                <div class="er-title-2">O nas</div>
                <div class="tmp-separator"></div>
                    <div class="desc">
                        <p>Jesteśmy Puchatą Przystanią - miejscem, gdzie serca zwierząt spotykają
                             się z sercami ludzi. Nasza pasja to zapewnienie bezdomnym zwierzętom 
                             miłości, troski i szansy na nowy początek. Od kociąt do psów i innych 
                             stworzeń, każdy mieszkaniec naszego schroniska ma swoją własną historię
                              i osobowość, a my wierzymy, że każdy z nich zasługuje na szansę na 
                              szczęśliwe życie. 
                              <br><br>W Puchatej Przystani oddajemy hołd miłości do zwierząt poprzez zapewnienie 
                              im bezpiecznego schronienia, opieki i nadziei na nowy dom. Zespół naszych
                               wolontariuszy i pracowników pracuje nieustannie, by zapewnić naszym 
                               podopiecznym wsparcie i miłość, aż znajdą swoje rodziny.
                            </p>
                    </div>
                </div>   
            </div>
        </div>
</section>

<section class="about-us" style="background-color:var(--second-bg-color);">
        <div class="container">
            <div class="row">
                <div class="col-md-6 flex-align-column order-md-1 order-1">
                    <div class="er-title-2">Misja i cel</div>
                    <div class="tmp-separator"></div>
                    <div class="desc">
                        <p>W Puchatej Przystani naszą misją jest zapewnienie bezpiecznego schronienia, 
                            opieki i miłości dla porzuconych, bezdomnych zwierząt. Dążymy do tego, 
                            aby każdy podopieczny, niezależnie od swojej przeszłości czy potrzeb,
                             miał szansę na nowy początek. Naszym celem jest nie tylko znalezienie
                              im kochających domów, ale także promowanie świadomości i edukacji na 
                              temat odpowiedzialnej opieki nad zwierzętami oraz walka ze zjawiskiem bezdomności zwierząt.

                            <br><br>Pracujemy z pasją i zaangażowaniem, aby zmieniać życia i tworzyć lepszą 
                            przyszłość dla naszych podopiecznych oraz społeczności, w której żyjemy. Przyjdź i dołącz 
                            do naszej misji - razem tworzymy lepsze życie dla każdego futrzaka!
                             </p>
                    </div>
                </div>  
                <div class="col-md-6 flex-align-column order-md-2 order-2">
                    <div style="background-image:url('img/about-us-2.jpg')" class="about-us-img"></div>
                </div> 
            </div>
        </div>
</section> 

<?php
include 'DB/funct-animal-library.php';
?>
<section class="animals-section"> 
    <div class="container">
        <div class="row first-row">
            <div class="col-lg-8">
                <div class="er-title-2">Nasze Zwierzęta</div>
                <div class="desc">
                Poznaj naszą wspaniałą rodzinę! Tutaj znajdziesz zdjęcia wszystkich naszych podopiecznych 
                - od kociąt po psy i inne zwierzęta czekające na swój szczęśliwy dom. Każde zwierzę ma swoją 
                unikalną historię i osobowość, ale wszystkie mają jedno wspólne - potrzebują Twojej miłości i
                 troski. Przeglądaj naszą galerię, a być może znajdziesz swojego nowego najlepszego przyjaciela!
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


<section class="counter-section" style="background-color:var(--second-bg-color);">
    <div class="container">
        <div class="row first-row text-center" style="justify-content: center;">
            <div class="col-lg-8 col-md-12" >
                <div class="er-title-2" >
                    Nasze schronisko w liczbach
                </div>
                <div class="desc mt-30">
                Odkryj nasze schronisko w liczbach. Każda cyfra to historia - od przyjętych zwierząt po udane adopcje. Dowiedz się, jak liczby odzwierciedlają nasze zaangażowanie w dobrostan zwierząt.
                </div>
                <div class="tmp-separator margin-auto" style="margin-bottom: 40px;"></div>
            </div>
        </div>
        <div class="counter-wrapper">
            <div class="row counter-row">
                    <div class="col-xxl-3 col-md-6" >
                        <div class="item">
                            <div class="box">
                                <div class="icon-img">
                                    <img src="img/icon-1.png">
                                </div>
                                    <div class="number">
                                        <span class="value">
                                            236
                                        </span>
                                    </div>
                                    <div class="title">
                                    Liczba zwierząt, które zostały adoptowane
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6" >
                        <div class="item">
                            <div class="box">
                                <div class="icon-img">
                                    <img src="img/icon-2.png">
                                </div>
                                    <div class="number">
                                        <span class="value">
                                            14
                                        </span>
                                    </div>
                                    <div class="title">
                                    Liczba wolontariuszy pracujących w schronisku
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6" >
                        <div class="item">
                            <div class="box">
                                <div class="icon-img">
                                    <img src="img/icon-3.png">
                                </div>
                                    <div class="number">
                                        <span class="value">
                                            47
                                        </span>
                                    </div>
                                    <div class="title">
                                    Liczba akcji edukacyjnych przeprowadzonych przez nas
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6" >
                        <div class="item">
                            <div class="box">
                                <div class="icon-img">
                                    <img src="img/icon-4.png">
                                </div>
                                    <div class="number">
                                        <span class="value">
                                            385
                                        </span>
                                    </div>
                                    <div class="title">
                                    Liczba osób, które odwiedziły schronisko za ostatni rok
                                    </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</section>


<section class="blog-section double-pad-bottom"> 
    <div class="container">

        <div class="row first-row">
            <div class="col-lg-8">
                <div class="er-title-2">Aktualności</div>
                <div class="desc">
                Na naszym blogu znajdziesz porady, ciekawostki oraz inspirujące historie, które pomogą Ci lepiej zrozumieć i zaopiekować się swoimi futrzastymi przyjaciółmi. Sprawdź nasze ostatnie posty i czerp wiedzę!
                </div>
                <div class="tmp-separator"></div>
            </div>
            <div class="col-lg-4">
                <div class="btn-home-wrapper">
                        <div class="def-btn-bg">
                            <a href="blog.php">
                            Zobacz więcej
                            </a>
                        </div>
                </div>
            </div>
        </div>

        <div class="row">
            <?php
            $imgDir = "DB/images";
            try {
                if (!is_dir($imgDir)) {
                    throw new Exception('Image directory does not exist.');
                }

                $myPosts = loadContent();
                $postCounter = 0;  
                foreach ($myPosts as $myK => $myPh) {
                    if ($postCounter < 2) {
                        $imgName = $myPh->fileName;
                        $imgTag = "<div class=\"img_th\" style=\"background-image: url('$imgDir/$imgName');\"></div>";
                        $aHead = "<a href=\"./blog-post.php?iid=$myK\">";
                        $aTitle = $myPh->title;
                        $imgContent = substr($myPh->content, 0, 160);
                        $aFoot = "</a>";
            ?>
            <div class="col-lg-6 col-md-12">
                <div class="row row-post-styling">
                    <div class="col-sm-6 col-12">
                        <?php echo $aHead . $imgTag . $aFoot; ?>
                    </div>
                    <div class="col-sm-6 col-12 col-post-styling">
                        <h3><?php echo $aTitle; ?></h3>
                        <p><?php echo $imgContent . '...'; ?></p>
                        <p class="btn-post-wrapper"><a href="./blog-post.php?iid=<?php echo $myK; ?>" class="btn-post">Zobacz więcej</a></p>
                    </div>
                </div>
            </div>
            <?php
                        $postCounter++; 
                    }
                }
            } catch (Exception $e) {
                echo "<p>An error was encountered: " . $e->getMessage() . "</p>";
            }
            ?>
        </div>
    </div>
</section>

<section class="adoption-cta bg w-100 double-pad" style="background-image:url(img/1.jpg);">
        <div class="container">
            <div class="row  cta-wrapper">
                <div class="col-xl-8">
                    <div class="cta-left-col w-100">
                        <div class="er-title-3">
                                Jeszcze się zastanawiasz?
                        </div>
                        <div class="er-title-5">
                                Zadzwoń do nas już dziś, aby dowiedzieć się więcej o procesie adopcji i spotkać naszych uroczych podopiecznych! Twój nowy najlepszy przyjaciel może czekać właśnie tutaj.
                        </div>
                    </div>
                </div>
                <div class="col-xl-2" style="align-content: center;">
                    <div class="cta-right-col w-100">
                        <div class="def-btn">
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
    include 'footer.html';
?>

</body>
</html>