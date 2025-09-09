<?php

require_once('DatabaseHelper.php');
$database = new DatabaseHelper();

//WebUser
$user_id = '';
if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
}
$full_name = '';
if(isset($_GET['full_name'])){
    $full_name = $_GET['full_name'];
}
$age = '';
if(isset($_GET['age'])){
    $age = $_GET['age'];
}
$gender = '';
if(isset($_GET['gender'])){
    $gender = $_GET['gender'];
}
$email = '';
if(isset($_GET['email'])){
    $email = $_GET['email'];
}
$phone_number = '';
if(isset($_GET['phone_number'])){
    $phone_number = $_GET['phone_number'];
}
$website_id = '';
if(isset($_GET['website_id'])){
    $website_id = $_GET['website_id'];
}
   
$user_array = $database->selectAllWebUsers($user_id);


//customer
$customer_id = '';
if(isset($_GET['customer_id'])){
    $customer_id = $_GET['customer_id'];
}
$country = '';
if(isset($_GET['country'])){
    $country = $_GET['country'];
}


//customer
$customerC_id = '';
if(isset($_GET['customer_id'])){
    $customerC_id = $_GET['customer_id'];
}


$database1 = new DatabaseHelper();
$customer_array = $database1->selectAllCustomers($customer_id);

$database2 = new DatabaseHelper();
$customer_contr_array = $database2->chooseCustomerOrders($customerC_id);

?>


<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent Your Dream</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class ="header">
    <h1>Rent Your Dream</h1>
</div>


<!-- Add WebUser -->
<h2 style = "border: 2px solid DodgerBlue;">Add WebUser: </h2>
<form method="post" action="addWebUser.php">
    <div>
        <label for="full_name">Full name:</label>
        <input id="full_name" name="full_name" type="text" maxlength="50">
    </div>
    <br>

    <div>
        <label for="age">Age:</label>
        <input id="age" name="age" type="number" min=18>
    </div>
    <br>

    <div>
        <label for="gender">Gender:</label>
        <input id="gender" name="gender" type="text" maxlength="1">
    </div>
    <br>

    <div>
        <label for="email">Email:</label>
        <input id="email" name="email" type="text" maxlength="50">
    </div>
    <br>

    <div>
        <label for="phone_number">Phone Number:</label>
        <input id="phone_number" name="phone_number" type="text" maxlength="20">
    </div>
    <br>

    <div>
        <label for="website_id">Website Id:</label>
        <input id="website_id" name="website_id" type="number" min=0>
    </div>
    <br>

    <!-- Submit button -->
    <div>
        <button type="submit">
            Add WebUser
        </button>
    </div>
</form>
<br>
<hr>

<!-- Delete WebUser -->
<h2 style ="border: 2px solid Tomato;">Delete WebUser: </h2>
<form method="post" action="delWebUser.php">
    <!-- ID textbox -->
    <div>
        <label for="del_user_id">WebUser ID:</label>
        <input id="del_user_id" name="user_id" type="number" min="0">
    </div>
    <br>

    <!-- Submit button -->
    <div>
        <button type="submit">
            Delete WebUser
        </button>
    </div>
</form>
<br>
<hr>

<!-- Search form -->
<h2 style = "border: 2px solid Violet;">WebUser Search:</h2>
<form method="get">
    <!-- ID textbox:-->
    <div>
        <label for="user_id">WebUser ID:</label>
        <input id="user_id" name="user_id" type="number" value='<?php echo $user_id; ?>' min="0">
    </div>
    <br>
   
    <!-- Submit button -->
    <div>
        <button id='submit' type='submit'>
            Search
        </button>
    </div>
</form>
<br>
<hr>
   
<!-- Search result -->
<h2>WebUser Search Result:</h2>


<style>
  .tb { border-collapse: collapse; width:750px; }
  .tb th, .tb td { padding: 5px; border: solid 1px #777; }
  .tb th { background-color: lightblue; }
</style>


<button onclick="button1(this);">Hide data</button>

<script>
  let button1 = button => {
    let element = document.getElementById("WebUser");
    let hidden = element.getAttribute("hidden");

    if (hidden) {
       element.removeAttribute("hidden");
       button.innerText = "Hide WebUser data";
    } else {
       element.setAttribute("hidden", "hidden");
       button.innerText = "Show WebUser data";
    }
  }
</script>
<style>
   p {
    text-indent: 10px; 
   }
</style>

<br />
<table class = "tb" id ="WebUser">
    <thread>
    <tr>
        <th scope = "col">ID</th>
        <th scope = "col">full_name</th>
        <th scope = "col">age</th>
        <th scope = "col">gender</th>
        <th scope = "col">email</th>
        <th scope = "col">phone number</th>
    </tr>
    </thread>
    <tbody>
    <?php foreach ($user_array as $user) : ?>
        <tr>
            <th scope="row"><?php echo $user['USER_ID']; ?>  </th>
            <td><?php echo $user['FULL_NAME']; ?>  </td>
            <td><?php echo $user['AGE']; ?>  </td>
            <td><?php echo $user['GENDER']; ?>  </td>
            <td><?php echo $user['EMAIL']; ?>  </td>
            <td><?php echo $user['PHONE_NUMBER']; ?>  </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
   






<!-- Add Customer -->
<h2 style = "border: 2px solid DodgerBlue;">Add Customer: </h2>
<form method="post" action="addCustomer.php">
    <div>
        <label for="country">country:</label>
        <input id="country" name="country" type="text" maxlength="20">
    </div>
    <br>

    <div>
        <label for="user_id">User ID:</label>
        <input id="user_id" name="user_id" type="number" min=0>
    </div>
    <br>
    <!-- Submit button -->
    <div>
        <button type="submit">
            Add WebUser
        </button>
    </div>
</form>
<br>
<hr>

<!-- Delete Customer -->
<h2 style ="border: 2px solid Tomato;">Delete Customer: </h2>
<form method="post" action="delCustomer.php">
    <!-- ID textbox -->
    <div>
        <label for="del_customer_id">WebUser ID:</label>
        <input id="del_customer_id" name="customer_id" type="number" min="0">
    </div>
    <br>
    <!-- Submit button -->
    <div>
        <button type="submit">
            Delete Customer
        </button>
    </div>
</form>
<br>
<hr>

<!-- Search form -->
<h2 style = "border: 2px solid Violet;">Customer Search:</h2>
<form method="get">
    <!-- ID textbox:-->
    <div>
        <label for="customer_id">Customer ID:</label>
        <input id="customer_id" name="customer_id" type="number" value='<?php echo $customer_id; ?>' min="0">
    </div>
    <br>
    <!-- Submit button -->
    <div>
        <button id='submit' type='submit'>
            Search
        </button>
    </div>
</form>
<br>
<hr>
   
<!-- Search result -->
<h2>Customer Search Result:</h2>


<style>
  .tb { border-collapse: collapse; width:1000px; }
  .tb th, .tb td { padding: 5px; border: solid 1px #777; }
  .tb th { background-color: lightblue; }
</style>


<button onclick="button2(this);">Hide data</button>

<script>
  let button2 = button => {
    let element = document.getElementById("Customer");
    let hidden = element.getAttribute("hidden");

    if (hidden) {
       element.removeAttribute("hidden");
       button.innerText = "Hide Customer data";
    } else {
       element.setAttribute("hidden", "hidden");
       button.innerText = "Show Customer data";
    }
  }
</script>
<style>
   p {
    text-indent: 10px; 
   }
</style>

<br />
<table class = "tb" id ="Customer">
    <thread>
    <tr>
        <th scope = "col">customer_id</th>
        <th scope = "col">country</th>
        <th scope = "col">user_id</th>
    </tr>
    </thread>
    <tbody>
    <?php foreach ($customer_array as $customer) : ?>
        <tr>
            <th scope="row"><?php echo $customer['CUSTOMER_ID']; ?>  </th>
            <td><?php echo $customer['COUNTRY']; ?>  </td>
            <td><?php echo $customer['USER_ID']; ?>  </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>




<!-- Show Which Contracts has Customer with ID-->
   
<!-- Search result -->
<h2>Customer's Contracts Search Result:</h2>

<style>
  .tb { border-collapse: collapse; width:500px; }
  .tb th, .tb td { padding: 5px; border: solid 1px #777; }
  .tb th { background-color: lightblue; }
</style>



<button onclick="button3(this);">Hide data</button>

<script>
  let button3 = button => {
    let element = document.getElementById("CustomerC");
    let hidden = element.getAttribute("hidden");

    if (hidden) {
       element.removeAttribute("hidden");
       button.innerText = "Hide Customer data";
    } else {
       element.setAttribute("hidden", "hidden");
       button.innerText = "Show Customer data";
    }
  }
</script>
<style>
   p {
    text-indent: 10px; 
   }
</style>

<br />
<table class = "tb" id ="CustomerC">
    <thread>
    <tr>
        <th scope = "col">contract_id</th>
        <th scope = "col">contract_name</th>
        <th scope = "col">price</th>
        <th scope = "col">provider_id</th>
    </tr>
    </thread>
    <tbody>
    <?php foreach ($customer_contr_array as $c) : ?>
        <tr>
            <th scope="row"><?php echo $c['CONTRACT_ID']; ?>  </th>
            <td><?php echo $c['CONTRACT_NAME']; ?>  </td>
            <td><?php echo $c['CONTRACT_PRICE']; ?>  </td>
            <td><?php echo $c['PROVIDER_ID']; ?>  </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


</body>
</html>

