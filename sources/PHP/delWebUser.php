<?php

require_once('DatabaseHelper.php');

$database = new DatabaseHelper();

//Grab variable id from POST request
$user_id = '';
if(isset($_POST['user_id'])){
    $user_id = $_POST['user_id'];
}
     
// Delete method
$error_code = $database->deleteWebUser( $user_id);

// Check result
if ($error_code == 1){
    echo "WebUser with ID: '{$user_id}' successfully deleted!'";
}
else{
    echo "Error can't delete WebUser with ID: '{$user_id}'. Errorcode: {$error_code}";
}
?>

<!-- link back to index page-->
<br>
<a href="index.php">  
    go back
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