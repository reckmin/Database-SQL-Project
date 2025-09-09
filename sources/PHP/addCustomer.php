<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();
   
//Grab variables from POST request


$country = '';
if(isset($_POST['country'])){
    $country = $_POST['country'];
}
   
$user_id = '';
if(isset($_POST['user_id'])){
    $user_id = $_POST['user_id'];
}


   
// Insert method
$success = $database->insertIntoCustomer($country, $user_id);
   
// Check result
if ($success){
    echo "WebUser '{$country} {$user_id}' successfully added!'";
}
else{
    echo "Error can't insert WebUser '{$country} {$user_id}'!";
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