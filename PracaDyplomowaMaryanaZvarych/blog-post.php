<?php
session_start();
include 'DB/funct-library.php';
include 'header.html';
?>
<body>
<section class="container nav_mg">
  <?php
    $imgDir = "DB/images";
    
    try {
        if (!is_dir($imgDir)) {
            throw new Exception('Image directory does not exist.');
        }
        
        if (isset($_GET['iid'])) {
            $iId = (int)$_GET['iid'];
        } else {
            $iId = 1;
        }

        $myPosts = loadContent();
        if (empty($myPosts)) {
            throw new Exception('Database table with posts is empty.');
        }

        $count = count($myPosts);

        if ($iId < 1 || $iId > $count) {
            $iId = 1;
        }

        $image = $myPosts[$iId];
        $imgName = $image->fileName;
        $imgTitle = $image->title;
        $imgContent = $image->content;
  ?>

  <div class="row">
    <div class="col-12">
      <div id="imgTitle"><h2><?php echo $imgTitle; ?></h2></div>
	  <hr>
    </div>
  </div>
  <div class="row">
    <div class="col-md-7 col-sm-12">
      <div id="imgContent"><?php echo $imgContent; ?></div>
    </div>
    <div class="col-md-5 col-sm-12" style="text-align:center;">
      <a href="./blog.php">
        <img src="<?php echo "$imgDir/$imgName"; ?>" alt="<?php echo $imgName; ?>" class="img-fluid">
      </a>
    </div>
  </div>

  <?php
    } catch (Exception $e) {
        echo "<p>An error was encountered: " . $e->getMessage() . "</p>";
    }
  ?>
</section>


<?php
include 'footer.html';
?>

</body>
</html>
