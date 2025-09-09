<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();
   
//Grab variables from POST request


$full_name = '';
if(isset($_POST['full_name'])){
    $full_name = $_POST['full_name'];
}
   
$age = '';
if(isset($_POST['age'])){
    $age = $_POST['age'];
}

$gender = '';
if(isset($_POST['gender'])){
    $gender = $_POST['gender'];
}

$email = '';
if(isset($_POST['email'])){
    $email = $_POST['email'];
}

$phone_number = '';
if(isset($_POST['phone_number'])){
    $phone_number = $_POST['phone_number'];
}

$website_id = '';
if(isset($_POST['website_id'])){
    $website_id = $_POST['website_id'];
}
   
// Insert method
$success = $database->insertIntoWebUser($full_name, $age, $gender, $email, $phone_number, $website_id);
   
// Check result
if ($success){
    echo "WebUser '{$full_name} {$email}' successfully added!'";
}
else{
    echo "Error can't insert WebUser '{$full_name} {$email}'!";
}
?>
   
<!-- link back to index page-->
<br>
<a href="index.php">
    go to start
</a>


<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent Your Dream</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>
</body>
</html>