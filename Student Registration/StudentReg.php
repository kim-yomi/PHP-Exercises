<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Registration Form</title>
    <link rel="stylesheet" href="StudentReg.css">
</head>
<body>
    <form action="" method="post">
        <h2>Student Registration Form</h2>

        <h3>Form Header</h3>
        <label for="permissionToRegister">For School Use - Permission to Register:</label>
        <input type="text" id="permissionToRegister" name="permissionToRegister" required>

        <label for="date">Date:</label>
        <input type="date" id="date" name="date">

        <input type="checkbox" id="ESL" name="ESL">
        <label for="ESL">ESL</label>

        <input type="checkbox" id="SPED" name="SPED">
        <label for="ESL">SPED</label>

        <input type="checkbox" id="IPRC" name="IPRC">
        <label for="IPRC">IPRC</label>

        <input type="checkbox" id="ISA" name="ISA">
        <label for="ISA">ISA</label><br>

        <label for="studentNo">Student Number:</label>
        <input type="text" id="studentNo" name="studentNo" required>

        <label for="entryDate">Entry Date:</label>
        <input type="date" id="entryDate" name="entryDate" required>

        <label for="entryType">Entry Type:</label>
        <input type="text" id="entryType" name="entryType" required>

        <label for="Grade">Grade:</label>
        <input type="text" id="Grade" name="Grade" required><br>

        <label for="DEN">DEN:</label>
        <input type="text" id="DEN" name="DEN" required>

        <label for="form">Class/Homeform</label>
        <input type="text" id="form" name="form" required><br><br>

        <label for="expelled">Is the student currently expelled from any school or school board?:</label>
        <input type="checkbox" id="DEN" name="DEN"><br>

        <h3>Student Information</h3>
        <label for="fname">Full Legal Name:</label>
        <input type="text" id="fname" name="fname" required><br>

        <label for="pname">Preferred Name:</label>
        <input type="text" id="pname" name="pname" required><br>

        <label for="gender">Gender:</label>
        <select id ="gender">
            <option value = "male">Male</option>
            <option value = "female">Female</option>
        </select>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required>

        <div class = "dobdiv">
        <label for="dob">If the student has other siblings in this school, please list them here:</label><br>
        <input type="text" id="dob" name="dob" required><br>
        </div>

        <label for="date">For School Use - Proof of Birth:</label>

        <input type="checkbox" id="OSR" name="OSR">
        <label for="OSR">OSR</label>

        <input type="checkbox" id="BapR" name="BapR">
        <label for="BapR">BapR</label>

        <input type="checkbox" id="BR" name="BR">
        <label for="BR">Birth Registration</label>

        <input type="checkbox" id="BC" name="BC">
        <label for="BC">Birth Certificate</label>

        <input type="checkbox" id="IP" name="IP">
        <label for="IP">Immigration Papers/Card</label>

        <input type="checkbox" id="PP" name="PP">
        <label for="PP">Passport</label>

        <input type="checkbox" id="other" name="other">
        <label for="other">Others:</label><br>

        <label for="mname">Name of Previous School Board/Municipality:</label>
        <input type="text" id="mname" name="mname" required>

        <label for="ldate">Last date attended:</label>
        <input type="text" id="ldate" name="ldate" required><br>

        <label for="sname">Name of Previous School:</label>
        <input type="text" id="sname" name="sname" required>

        <label for="pgrade">Grade at Previous School:</label>
        <input type="text" id="pgrade" name="pgrade" required>

        <label for="language">Language of Instruction:</label>
        <select id ="language">
            <option value = "english">English</option>
            <option value = "french">French</option>
            <option value = "lother">lother</option>
        </select>

        <label for="transfer">Reason for Transfer:</label>
        <input type="text" id="transfer" name="transfer" required><br>

        <label for="transfer">Did the student ever attend a Waterloo Region District School Board school in the past?</label>
        <select id ="transfer">
            <option value = "tyes">Yes</option>
            <option value = "tno">No</option>
            <option value = "tother">Other</option>
        </select>

        <label for="nameschools">If yes, name schools:</label><br>
        <input type="text" id="nameschools" name="nameschools" required>
        <input type="text" id="nameschools" name="nameschools" required>
        <input type="text" id="nameschools" name="nameschools" required>

        <h3>Health Information</h3>
        <label for="medicalconditions">Medical Conditions (include information or special equipment or medication, if required):</label><br>
        <input type="text" id="medicalconditions" name="medicalconditions" required><br>

        <label for="epipen">Does the student require an epi-pen?:</label>
        <select id ="epipen">
            <option value = "eyes">Yes</option>
            <option value = "eno">No</option>
        </select><br>

        <h3>Citizenship Information</h3>

        <label for="bcountry">Birth Country:</label>
        <input type="text" id="bcountry" name="bcountry" required>

        <label for="pcountry">If Canada, Province of Birth:</label>
        <input type="text" id="pcountry" name="pcountry" required><br>

        <label for="ccountry">Country of Citizenship:</label>
        <input type="text" id="ccountry" name="ccountry" required><br>

        <label for="firsttime">If student not born in Canada, provide date student entered Canada to live for the first time:</label>
        <input type="date" id="firsttime" name="firsttime" required><br>

        <input type = "submit" value = "Register">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fname = ucfirst(strtolower($_POST['fname']));
        $pname = ucfirst(strtolower($_POST['pname']));
        $gender = isset($_POST['gender']) ? 'Male' : 'Female';
        $dob = $_POST['dob'];
        $sname = $_POST['sname'];
        $mname = $_POST['mname'];
        $ldate = $_POST['ldate'];
        $pgrade = $_POST['pgrade'];
        $medicalconditions = $_POST['medicalconditions'];
        $epipen = isset($_POST['epipen']) ? 'Yes' : 'No';
        $bcountry = ucfirst(strtolower($_POST['bcountry']));
        $ccountry = ucfirst(strtolower($_POST['ccountry']));
    

        echo "<h3>Registration Details</h3>";
        echo "Name: $fname <br>";
        echo "Preferred Name: " . $pname . "<br>";
        echo "Gender: " . $gender . "<br>";
        echo "Date of Birth: " . $dob . "<br>";
        echo "Previous School: " . $sname . "<br>";
        echo "Previous School Board: " . $mname . "<br>";
        echo "Last Date Attended: " . $ldate . "<br>";
        echo "Grade at Previous School: " . $pgrade . "<br>";
        echo "Medical Conditions: " . $medicalconditions . "<br>";
        echo "Requires Epi-Pen: " . $epipen . "<br>";
        echo "Country of Birth: " . $bcountry . "<br>";
        echo "Country of Citizenship: " . $ccountry . "<br>";
    }
?>
        
    
   
        
    
</body>
</html>

