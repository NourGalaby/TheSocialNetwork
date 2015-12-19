<?php 


$hostname = "localhost";
$username = "root";
$password  = "";
$dbname="facebook";
// Create connection


    try 
    {
        $dbh = new PDO("mysql:host=$hostname;dbname=mysql", $username, $password);
        /*** echo a message saying we have connected ***/
        //echo 'Connected to database';
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }   

    $stmt = $dbh->prepare("SELECT * FROM member where email = ?");
    $stmt->execute(array($_POST['Email']));
    echo $stmt->rowCount();
 
 ?>