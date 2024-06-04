<?php
session_start();
    include 'header.html';
?>

<body>


<div style="margin: 30px 160px;" class="double-pad">
    <form action="DB/upload-manager.php" method="post" enctype="multipart/form-data">
        <h2 class="commentTitle">Dodaj nowy post:</h2>
        <fieldset>
        <div class="formul"><label for="fileSelect">Zdjęcie:</label>
        <input type="file" name="photo" id="fileSelect"></div>

        <div class="formul"><label for="posttitle">Tytuł:</label>
        <input type="text" name="title" id="posttitle" size="255"></div>

        <div class="formul"><label for="postcontent">Opis:</label>
        <textarea name="content" id="postcontent" rows="10" cols="30"></textarea>
        <p class="note"><strong>Uwaga:</strong> Tylko &nbsp;.jpg, .jpeg, .gif, .png  &nbsp;formaty (do 5 MB)</p>
        
        <div class="formul" style="margin: 40px 0px 0px;"><input type="submit" name="submit" value="Dodaj"> <div>
        </fieldset>
        
    </form>
</div>

<?php
include 'footer.html';
?>

</body>
</html>