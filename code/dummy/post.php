<?php

function generateRandomString($length = 10) {
    $characters = 'abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// Vars for database
$vorname = $_POST['vorname']; 
$name = $_POST['name']; 
$beschreibung = $_POST['beschreibung']; 
$beruf = $_POST['beruf']; 
$wunschgehalt = $_POST['wunschgehalt']; 
$email = $_POST['email']; 
$pageid = generateRandomString();


// Database Config
$servername = "localhost";
$username = "webd_philip";
$password = "nvzHol-#p6PEu#ai";
$dbname = "webd_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO userprofile (Vorname, Name, Beschreibung, Beruf, Wunschgehalt, Email, Pageid)
VALUES ('$vorname', '$name', '$beschreibung', '$beruf', '$wunschgehalt', '$email', '$pageid')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();



// Create new Website
$myfile = fopen("html_template.html", "r") or die("Unable to open file!");
$htmlcontent = fread($myfile,"100");
fclose($myfile);

echo var_dump($htmlcontent);

$myfile = str_replace(VORNAME, $vorname, $myfile);
$myfile = str_replace(NACHNAME, $nachname, $myfile);
$myfile = str_replace(BESCHREIBUNG, $beschreibung, $myfile);
$myfile = str_replace(BERUF, $beruf, $myfile);
$myfile = str_replace(WUNSCHGEHALT, $wunschgehalt, $myfile);
$myfile = str_replace(EMAIL, $email, $myfile);

$file_name = $pageid . ".html";
echo $file_name;
$new_website = fopen("$file_name", "w");
fwrite($new_website, $myfile);
fclose($new_website);



$url_open = "https://webdev.learning-it.io/dummy/" . $file_name;
echo $url_open;

?>

