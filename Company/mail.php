<?php
$db = mysqli_connect("localhost","root","","drepp");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['email']))
{
    $name = mysqli_real_escape_string($db,$_POST['name']);
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $subject = mysqli_real_escape_string($db,$_POST['subject']);
    //date_default_timezone_set('Asia/Kolkata');
   // $currentTime = date( 'd-m-Y h:i:s A', time () );
    $message = mysqli_real_escape_string($db,$_POST['message']);
    $query="Insert into contact (`name`, `email`,`subject`,`message`) values ('$name','$email','$subject','$message')";
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    if($result)
    {	
    
        echo "Thank You,we will assist you soon";
        header("refresh:2; url=index.html");
    }
    else
    {
        echo "Error while sending saving details to database";
    } 
}

if(isset($_POST['subscribe']))
{
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $query="Insert into subscribe (`email`) values ('$email')";
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    if($result){
        echo "Subscriber is added";
    }
    else
    {
        echo "Error while adding subscriber";
    }
}
error_reporting(E_ALL);
ini_set('display_errors', '1');

?>




