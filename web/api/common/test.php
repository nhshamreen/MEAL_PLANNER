<html>
<head>
<title>Test PHP Connection Script</title>
</head>
<body>

<h3>Welcome to the PHP Connect Test</h3>

<?php
$dbname = 'myspac17_MLPLANNER';
$dbuser = 'myspac17';
$dbpass = 'Sitara@1991';
$dbhost = 'localhost';
$connect = @mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to connect to '$dbhost'");
mysql_select_db($dbname) or die("Could not open the database '$dbname'");
$result = mysql_query("SELECT ID,NAME FROM USR");
echo json_encode($result);
while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
    printf("ID: %s  Name: %s <br>", $row[0], $row[1]);
}

// if (!isset($myObj)) 
//     $myObj = new stdClass();
// $myObj->name = "John";
// $myObj->age = 30;
// $myObj->city = "New York";

// $myJSON = json_encode($myObj);

echo $myJSON;
?>

</body>
</html>