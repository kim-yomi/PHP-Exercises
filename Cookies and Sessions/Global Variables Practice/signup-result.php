<html>
<body>

<?php
$id = $_POST['id'] ?? '';
$name = $_POST['name'] ?? '';
$course = $_POST['course'] ?? '';
$year = $_POST['year'] ?? '';

$errors = [];

if (!is_numeric($id) || strlen($id) > 8) {
    $errors[] = "Student ID must be numeric and up to 8 digits only.";
}

if (!ctype_alpha(str_replace(' ', '', $name))) {
    $errors[] = "Full name must contain only letters and spaces.";
}

if (!ctype_alpha($course)) {
    $errors[] = "Course must contain only letters.";
}

if (!is_numeric($year) || strlen ($year) > 1 || $year < 1 || $year > 4) {
    $errors[] = "Year must only be a number between 1 and 4, and up to 1 digit only.";
}



if (!empty($errors)) {
    echo "<h3>Form Errors:</h3><ul>";
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
} else {
    echo "<h3>Form submitted successfully!</h3>";
    echo "Student ID: $id<br>";
    echo "Name: $name<br>";
    echo "Course: $course<br>";
    echo "Year Level: $year";
}
?>

</body>
</html>
