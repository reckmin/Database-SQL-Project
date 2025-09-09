<?php
   
class DatabaseHelper
{
    const username = 'a11826575'; 
    const password = 'dbs22'; 
    const con_string = '//oracle19.cs.univie.ac.at:1521/orclcdb';
   

    protected $conn;

    public function __construct()
    {
        try {
            $this->conn = oci_connect(
                DatabaseHelper::username,
                DatabaseHelper::password,
                DatabaseHelper::con_string
            );
   
            //check if the connection object is != null
            if (!$this->conn) {
                die("DB error: Connection can't be established!");
            }
   
        } catch (Exception $e) {
            die("DB error: {$e->getMessage()}");
        }
    }
   
    public function __destruct()
    {
        oci_close($this->conn);
    }
   

    // ---------------------WebUser functions---------------------------------
    public function selectAllWebUsers($user_id)
    {
        $sql = "SELECT * FROM WebUser
            WHERE user_id LIKE '%{$user_id}%'
            ORDER BY user_ID ASC";

        $statement = oci_parse($this->conn, $sql);
        oci_execute($statement);
        oci_fetch_all($statement, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        //clean up;
        oci_free_statement($statement);
        return $res;
    }
   
    public function insertIntoWebUser($full_name, $age, $gender, $email, $phone_number, $website_id)
    {
        $sql = "INSERT INTO WEBUSER (full_name, age, gender, email, phone_number, website_id) VALUES 
        ('{$full_name}', '{$age}', '{$gender}', '{$email}', '{$phone_number}', 
        '{$website_id}')";
   
        $statement = oci_parse($this->conn, $sql);
        $success = oci_execute($statement) && oci_commit($this->conn);
        oci_free_statement($statement);
        return $success;
    }
    public function deleteWebUser($user_id)
    {
        $errorcode = 0;
   
        // The SQL string
        $sql = 'BEGIN P_DELETE_WEBUSER(:user_id, :errorcode); END;';
        $statement = oci_parse($this->conn, $sql);
   
        //  Bind the parameters
        oci_bind_by_name($statement, ':user_id', $user_id);
        oci_bind_by_name($statement, ':errorcode', $errorcode);
   
        // Execute Statement
        oci_execute($statement);
        //Clean Up
        oci_free_statement($statement);
        return $errorcode;
    }




    
    // ---------------------Customer functions---------------------------------
    public function selectAllCustomers($customer_id)
    {
        $sql = "SELECT * FROM Customer
            WHERE customer_id LIKE '%{$customer_id}%'
            ORDER BY customer_id ASC";

        $statement = oci_parse($this->conn, $sql);
        oci_execute($statement);
        oci_fetch_all($statement, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        //clean up;
        oci_free_statement($statement);
        return $res;
    }
   
    public function insertIntoCustomer($country, $user_id)
    {
        $sql = "INSERT INTO Customer (country, user_id) VALUES 
        ('{$country}', '{$user_id}')";
   
        $statement = oci_parse($this->conn, $sql);
        $success = oci_execute($statement) && oci_commit($this->conn);
        oci_free_statement($statement);
        return $success;
    }
    public function deleteCustomer($customer_id)
    {
        $errorcode = 0;
   
        // The SQL string
        $sql = 'BEGIN P_DELETE_CUSTOMER(:customer_id, :errorcode); END;';
        $statement = oci_parse($this->conn, $sql);
   
        //  Bind the parameters
        oci_bind_by_name($statement, ':customer_id', $customer_id);
        oci_bind_by_name($statement, ':errorcode', $errorcode);
   
        // Execute Statement
        oci_execute($statement);
        //Clean Up
        oci_free_statement($statement);
        return $errorcode;
    }




    //
    public function chooseCustomerOrders($customer_id)
    {
        $sql = "SELECT *  FROM Contract
        WHERE customer_id LIKE '%{$customer_id}%' 
        ORDER BY Contract.contract_id ASC";

    $statement = oci_parse($this->conn, $sql);
    oci_execute($statement);
    oci_fetch_all($statement, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);
    //clean up;
    oci_free_statement($statement);
    return $res;
    }


}