<?php
 require ('common/connect.php');

 function signup($name,$email, $password)
 {
    try
    {

        $cn=connectPDO();
        $stmt = $cn->prepare('CALL `MLP_SIGNUP` (?,?,?,@o1,@o2,@o3)');
        $stmt->bindParam(1, $name, PDO::PARAM_STR);
        $stmt->bindParam(2, $email, PDO::PARAM_STR);
        $stmt->bindParam(3, $password, PDO::PARAM_STR);
        $stmt->execute();
        $row=$cn->query('select @o1,@o2,@o3')->fetchAll();
                
        if (!isset($myObj)) 
            $myObj = new stdClass();
        
        if ($row &&  $row !== false ) 
        {
            $myObj->OUT_RTN_CD = $row[0]['@o1'] ;
            $myObj->OUT_RTN_MSG = $row[0]['@o2'];
            $myObj->OUT_RTN_ROWS = $row[0]['@o3'];
        }
        else
        {
            $myObj->OUT_RTN_CD = null ;
            $myObj->OUT_RTN_MSG = null;
            $myObj->OUT_RTN_ROWS = null;
        }   
        $myJSON = json_encode($myObj);
        return $myJSON;
    }
    catch (PDOException $e)
    {
        die("Error occurred:" . $e->getMessage());
    }
    return null;
 }

 function main()
 {
     $name=null;
     $email=null;
     $password=null;

     if(isset($_GET["name"]))
     {
         $name=$_GET["name"];
        
     }

     if(isset($_GET["email"]))
     {
         $email=$_GET["email"];
     }

     if(isset($_GET["password"]))
     {
         $password=$_GET["password"];
     }

    $rtn= signup($name,$email,$password);
    echo $rtn;
 }

 main();
?>