<!DOCTYPE html>
<html>
<title>Portfolio</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<h1 class = "portfolio">Portfolio</h1>
<link rel = "stylesheet" href = "portfolio.css">

<body>
    <div class = "header">
        <div class = "column">
    <?php
    
    echo "</br>";
    echo "</br>";
    echo "</br>";
         $name = "Chorong Kim</br>";
         $school = "FEU Institute of Technology</br>";
         $address = "The One P. Campa</br>";
         $number = "9300846324</br>";
         $email = "kimchorong104@fit.edu.ph</br>";

         echo "$name";
         echo "$school";
         echo "$address";
         echo "$number";
         echo "$email";

         echo "</br>";
         echo "</br>";
    ?>
    </div>
    <div class = "column">
    <img src = "img.png">
     </div>
</div>
<?php
            echo "____________________________________________________________________________________________";
            echo "</br>";
            echo "</br>";
            echo "I’m a skilled speaker and presenter, and have experience in leading presentations
    and seminars. I approach setbacks with patience, choosing to focus on the bigger
    picture instead of prioritizing what is only in front of me. I can assure that I’m a
    hard worker, and will be able to handle any situation confidently.</br>
    
    My career objectives is to first and foremost, to learn. I want to able to be constantly evolving and advancing
    my skills, and to be able to apply them in a real-world setting. I want to be able to
    work with a team of like-minded individuals, and to be able to contribute to the success of the organization.";
            echo "</br>";
            echo "</br>";
            echo "____________________________________________________________________________________________";

?>
    </div>
    </div>
    <div class = "row-one">
    <div class = "column">
        <h2>Education</h2>
        <?php
            $education1 = "FEU Institute of Technology | 2023 - Present</br>Bachelor of Computer Science,
            Software </br>Engineering</br>Maryhill Coll;ege | 2012 - 2023</br>With Honors, Academic Excellence Award";
            echo $education1;
        ?>
    </div>

    <div class = "column">
        <h2>Technical</h2>
        <?php
            $technical = "- C++, Java, Javascript, HTML, CSS, SQL, Assembly";
            echo $technical;
        ?>
    </div>
    
    </div>

    <div class = "row-two">
        <div class = "column">
        <h2>Languages</h2>
        <?php
            $language = "Fluent in Written and Spoken English</br>Fluent in Written and Spoken Tagalog</br>
            Basic Conversational Proficiency in Korean";
            echo $language;
        ?>
        </div>

        <div class = "column-a">
        <h2>Experience</h2>
        <?php
            $exp = "Association of Computing Machinery in FEU Institute of Technology</br>Junior Officer in Publications</br>
            2024 - 2025</br>- Authored relevant articles and event captions for the organization</br>
            Participated in leadership training and attended seminars related to course work</br></br>KKFI x FEU TECH Partnership for Tondo Microsavings Group</br>Lead Volunteer in
        KKFI x FEU TECH Partnership with Tondo Microsavings Group</br>2023 - 2024</br>Partnered with
        Kapatiran, Kaunlaran Foundation Inc., to conduct coursework in Happyland, Tondo</br>
        Lead speaker in conducting a seminar in reading literacy targeted to the children of members of Tondo</br>
        Microsavings Group in Happyland, Tondo Metro Manila";
            echo $exp;
        ?>
        </div>
</div>
<?php
echo "</br>";
echo "____________________________________________________________________________________________";
?>

</body>
</html>