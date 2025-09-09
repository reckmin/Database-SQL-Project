<?php

require_once('DatabaseHelper.php');

$database = new DatabaseHelper();

//Grab variable id from POST request
$customer_id = '';
if(isset($_POST['customer_id'])){
    $customer_id = $_POST['customer_id'];
}
     
// Delete method
$error_code = $database->deleteCustomer($customer_id);

// Check result
if ($error_code == 1){
    echo "Customer with ID: '{$customer_id}' successfully deleted!'";
}
else{
    echo "Error can't delete Customer with ID: '{$customer_id}'. Errorcode: {$error_code}";
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