<?php
    include 'header.html';
?>
<body>
<section class="banner-home nav_mg">
    <div class="bg banner-wrapper" style="background-image:url('img/2.jpg');">
        <div class="container">
            <div class="row">
                <div class="banner-content">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="banner-title">
                            <h1 class="">Wymagania</h1>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
$tekst = file_get_contents('texts/adoption-2');
?>
<section class="about-us" style="background-color:#d3e4df;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="er-title-2 text-center">Wymagania adopcyjne</div>
                <div class="desc">
                    <p> <?php echo $tekst; ?></p>
                </div>
            </div>  
        </div>
    </div>
</section> 




<section class="adoption-cta bg w-100 double-pad" style="background-color:var(--second-bg-color);">
        <div class="container">
            <div class="row  cta-wrapper-bg">
                <div class="col-xl-8">
                    <div class="cta-left-col w-100">
                        <div class="er-title-3">
                                Jeszcze się zastanawiasz?
                        </div>
                        <div class="er-title-5">
                        Jeśli masz dodatkowe pytania dotyczące wymagań adopcyjnych, nie wahaj się skontaktować z naszym zespołem. Jesteśmy tutaj, aby pomóc Ci zrozumieć proces i przygotować się do adopcji nowego, kochającego przyjaciela.
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
    include 'footer.html';
?>

</body>
</html>