<?php
 
//Opening a fle
//echo readfile('greetings.txt');
 
 
//Opening a file
/*
$myfile = fopen("greetings.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("test.txt"));
//echo fread($myfile,2);
fclose($myfile);
*/
 
 
 
 
/*
 
Syntax:
fopen($myfile,filemode);
 
r Open a file for read only. File pointer starts at the beginning of the file
w Open a file for write only. Erases the contents of the file or creates a new file if it doesn't exist. File pointer starts at the beginning of the file
a Open a file for write only. The existing data in file is preserved. File pointer starts at the end of the file. Creates a new file if the file doesn't exist
x Creates a new file for write only. Returns FALSE and an error if file already exists
r+  Open a file for read/write. File pointer starts at the beginning of the file
w+  Open a file for read/write. Erases the contents of the file or creates a new file if it doesn't exist. File pointer starts at the beginning of the file
a+  Open a file for read/write. The existing data in file is preserved. File pointer starts at the end of the file. Creates a new file if the file doesn't exist
x+  Creates a new file for read/write. Returns FALSE and an error if file already exists
 
*/
 
 
 
 
$myfile = fopen("greetings.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  //echo fgets($myfile) . "<br>";
  echo fgetc($myfile) . "<br>";
}
fclose($myfile);
 
 
 
 
 
 

//Writing into a file
$myfile = fopen("greetings.txt", "w") or die("Unable to open file!");
$txt = "Good day everyone!\n";
fwrite($myfile, $txt);
$txt = "Have fun learning PHP!\n";
fputs($myfile, $txt);
fclose($myfile);

 
 
 
 
?>