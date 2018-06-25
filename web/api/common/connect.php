<?php
require('credentials.php');

// function connect()
// {   global $dbhost, $dbuser, $dbpass, $dbname;
//     $connect = @mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to connect to '$dbhost'");
//     mysql_select_db($dbname) or die("Could not open the database '$dbname'");
//     return $connect;
// }

function connectPDO()
{
    global $dsn, $dbuser, $dbpass;
    $cn=new PDO($dsn, $dbuser, $dbpass);
    $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $cn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    return $cn;
}
?>

