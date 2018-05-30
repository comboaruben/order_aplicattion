
<?php
 
 /*
  * Following code will create a new product row
  * All product details are read from HTTP Post Request
  */
  
 // array for JSON response

 $response = array();
 
 

 if (isset($_POST['name']) && isset($_POST['last_name']) && isset($_POST['birthday']) && isset($_POST['password']) && isset($_POST['email'])) {
        require_once __DIR__ . '/db_connect.php';
        $db = new DB_CONNECT();
        

    //  $result = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost); 
        $insert = ("INSERT INTO user (name,last_name,birthday,email,password)VALUES ('".$_POST['name']."','".$_POST['last_name']."','".$_POST['birthday']."','".$_POST['email']."','".$_POST['password']."')");
   
     $resultado_query=mysqli_query( $db->conexion,$insert);
 
     // check if row inserted or not
     if ($resultado_query) {
         // successfully inserted into database
         $response["success"] []= 1;
         $response["message"] []= "Product successfully created.";
  
         // echoing JSON response
         echo json_encode($response);
     } else {
         // failed to insert row
         $response["success"] = 0;
         $response["message"] = "Oops! An error occurred.";
  
         // echoing JSON response
         echo json_encode($response);
     }
 } else {
     // required field is missing
     $response["success"] = 0;
     $response["message"] = "Required field(s) is missing";
  
     // echoing JSON response
     echo json_encode($response);
 }
 // ?>