<?php
    include 'header.html';
?>
<body>
<section class="banner-home nav_mg">
    <div class="bg banner-wrapper" style="background-image:url('img/contact.jpg');">
        <div class="container">
            <div class="row">
                <div class="banner-content">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="banner-title">
                            <h1 class="">Kontakt</h1>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

 
<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6">
                <div class="contact-info-box">
                    <div class="title er-title-5">
                    KONTAKT
                    </div>
                    <div class="tmp-separator"></div>
                    <div class="desc mt-30">
                    Masz pytania dotyczące naszych podopiecznych? Chcesz wiedzieć, jak możesz pomóc? Lub po prostu chcesz porozmawiać o adopcji? Jesteśmy tu dla Ciebie!
                    </div>
                    <div class="contact-icons">
                        <div class="item">
                            <p><img src="img/address.png" class="icons"> Ul. Kociąt 17/4, 00-000 Warszawa</p>
                            <p><img src="img/mail.png" class="icons"> contact@puchataprzystan.pl</p>
                            <p><img src="img/phone.png" class="icons"> +48 000 000 000</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-6">
                <div class="contact-form-box">
                    <div class="title er-title-5 pp">
                    NAPISZ DO NAS WIADOMOŚĆ
                    </div>
                    <div class="desc mb-30">
                    Chętnie odpowiemy na Twoje pytania, podzielimy się informacjami na temat naszych podopiecznych lub pomożemy w znalezieniu idealnego zwierzaka do adopcji. Wypełnij poniższy formularz, a my postaramy się odpowiedzieć najszybciej, jak to możliwe.
                    </div>
                    <div class="tmp-separator"></div>
                    <div class="e-form">
                        <div id="box">
                            <div style="">
                                    <div class="testdiv">
                                    <form action="DB/insert-clients-data.php" class="form" method="post">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Twoje imię" name="imie" class="input" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="email" placeholder="E-mail" name="email" class="input" required>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="tel" placeholder="Numer telefonu" name="mobile" class="input" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <textarea placeholder="Treść wiadomości" name="fmessage" id="fmessage"></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" name="submit" value="Submit" class="def-btn-bg">Gotowe</button>
                                    </form>

                                    </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cta pad-0">
<div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="contact-form-img bg" style="background-image:url('img/contact-img.jpg')"></div>
            </div>
        </div>
    </div>
</section>


<?php
    include 'footer.html';
?>

</body>
</html>