<?php
class myBlog {
    public $id, $fileName, $title, $content;
    public function __construct($id, $fileName, $title, $content) {
        $this->id = $id;
        $this->fileName = $fileName;
        $this->title = $title;
        $this->content = $content;
    }
}

function loadContent() {
    require_once "config.php";

    $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $sql = "SELECT id, filename, title, content FROM blog";
    $result = $mysqli->query($sql);
    $posts = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $postInfo = new myBlog($row["id"], $row["filename"], $row["title"], $row["content"]);
            $posts[$row["id"]] = $postInfo;
        }
    } else {
        echo "No posts in database";
    }

    $mysqli->close();
    return $posts;
}

function correct_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
