<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/HMIS2018/general.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/font-awesome/font-awesome.min.css" rel="stylesheet" type="text/css" />
 <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hmis2018";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Cambiar el conjunto de caracteres a utf8
$conn->set_charset("utf8");

//Close connection
//$conn->close();
?>
