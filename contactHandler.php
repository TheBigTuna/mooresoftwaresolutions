<?php 

session_start();
include("connection.php");


// Checks for the largest ID available
$FetchID = "SELECT max(ID) AS ID FROM omoore94_mooresoftwaresolutions.contactsubmit";        
$FetchIDResult = mysqli_query($conn, $FetchID);
while($row = mysqli_fetch_assoc($FetchIDResult)){
    $ID = $row['ID'];
}

$ID++;
$ID = mysqli_real_escape_string($conn, $ID);


$Name = mysqli_real_escape_string($conn, $_POST['Name']);
$Email = mysqli_real_escape_string($conn, $_POST['Email']);
$PhoneNumber = mysqli_real_escape_string($conn, $_POST['PhoneNumber']);
$User = mysqli_real_escape_string($conn, $_POST['Subject']);
$Message = mysqli_real_escape_string($conn, $_POST['Message']);

$InsertMessage = "INSERT INTO omoore94_mooresoftwaresolutions.contactsubmit (ID, Name, Email, PhoneNumber, Subject, Message) VALUES ('$ID', '$Name', '$Email', '$PhoneNumber', '$User', '$Message');";  
$InsertMessageResult = mysqli_query($conn, $InsertMessage);


header("Location: index.html");

?>
