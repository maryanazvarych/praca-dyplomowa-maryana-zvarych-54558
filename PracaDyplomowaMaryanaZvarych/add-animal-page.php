<?php
session_start();

include 'header.html';
?>

<body>
    
<div style="margin: 30px 160px;" class="double-pad">
    <form action="DB/upload-animal-manager.php" method="post" enctype="multipart/form-data">
        <h2 class="commentTitle">Dodaj nowe zwierzę:</h2>
        <fieldset>
            <div class="formul">
                <label for="fileSelect">Zdjęcie:</label>
                <input type="file" name="photo" id="fileSelect">
            </div>

            <div class="formul">
                <label for="animalName">Imię:</label>
                <input type="text" name="imie" id="animalName" size="255">
            </div>

            <div class="formul">
                <label for="breed">Rasa:</label>
                <input type="text" name="rasa" id="breed" size="255">
            </div>

            <div class="formul">
                <label for="age">Wiek:</label>
                <input type="text" name="wiek" id="age" size="255">
            </div>

            <div class="formul">
                <label for="gender">Płeć:</label>
                <input type="text" name="plec" id="gender" size="255">
            </div>

            <div class="formul">
                <label for="weight">Waga:</label>
                <input type="text" name="waga" id="weight" size="255">
            </div>

            <div class="formul">
                <label for="history">Historia:</label>
                <textarea name="historia" id="history" rows="10" cols="30"></textarea>
            </div>

            <div class="formul">
                <label for="photoGallery">Galeria zdjęć:</label>
                <input type="file" name="zdjecia[]" id="photoGallery" multiple accept="image/*">
                <p style="color:red;">Możesz wybrać jedno lub więcej zdjęć.</p>
            </div>
            <p class="note"><strong>Uwaga:</strong> Tylko &nbsp;.jpg, .jpeg, .gif, .png  &nbsp;formaty (do 5 MB)</p>


            <div class="formul" style="margin: 40px 0px 0px;">
                <input type="submit" name="submit" value="Dodaj">
            </div>
        </fieldset>
        
    </form>
</div>

<?php
include 'footer.html';
?>

</body>
</html>