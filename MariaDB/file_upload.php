<!DOCTYPE html>
<html>
    <body>

    <form action="file_upload.php" method="post" enctype="multipart/form-data">
        <h3>Upload File</h3>
        <input type="file" name="fileToUpload" id="fileToUpload" required>
        <input type="submit" value="Upload File" name="submit">
</form>
</body>
</html>

<?php

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (isset($_POST["submit"])) {
    // Check if file is a valid image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
// Display uploaded files
echo "<h3>Uploaded Files:</h3>";
$files = scandir($target_dir);
foreach ($files as $file) {
    if ($file !== '.' && $file !== '..') {
        // Display the image
        echo "<div style='margin-bottom: 10px;'>";
        echo "<img src='" . $target_dir . $file . "' alt='" . htmlspecialchars($file) . "' style='max-width: 200px; max-height: 200px;'><br>";
        echo "<p>" . htmlspecialchars($file) . "</p>";
        echo "</div>";
    }
}?>