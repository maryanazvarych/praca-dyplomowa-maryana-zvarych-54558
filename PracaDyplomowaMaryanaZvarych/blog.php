<?php
    include 'header.html';
    include 'DB/funct-library.php';
?>
<body>
<section class="banner-home nav_mg">
    <div class="bg banner-wrapper" style="background-image:url('img/blog.jpg');">
        <div class="container">
            <div class="row">
                <div class="banner-content">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="banner-title">
                            <h1 class="">Blog</h1>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog-section"> 
    <div class="container">

        <div class="row first-row">
            <div class="col-lg-8">
                <div class="er-title-2">Aktualności</div>
                <div class="desc">
                Na naszym blogu znajdziesz porady, ciekawostki oraz inspirujące historie, które pomogą Ci lepiej zrozumieć i zaopiekować się swoimi futrzastymi przyjaciółmi. Sprawdź nasze ostatnie posty i czerp wiedzę!
                </div>
                <div class="tmp-separator"></div>
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
                foreach ($myPosts as $myK => $myPh) {
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
