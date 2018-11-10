<?php
/**
 * Created by PhpStorm.
 * User: NZi
 * Date: 10.11.2018
 * Time: 12:32
 */
 //class.user.php
include "dbconfig.php";
 class user{

      public $con;
      public $error;

      public function __construct()
      {
           $this->con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
           if(!$this->con)
           {
                echo 'Database Connection Error ' . mysqli_connect_error($this->con);
           }
      }
     public function reg_user($name,$email,$password){

         $password = md5($password);
         $sql="SELECT * FROM users WHERE email='$email'";

         //checking if the email is available in db
         $check =  $this->con->query($sql) ;
         $count_row = $check->num_rows;

         //if the email is not in db then insert to the table
         if ($count_row == 0){
             $sql1="INSERT INTO users SET username='$name', password='$password', email='$email'";
             $result = mysqli_query($this->con,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
             return $result;
         }
         else { return false;}
     }

      public function can_login($table_name, $where_condition)
      {
           $condition = '';
           foreach($where_condition as $key => $value)
           {
                $condition .= $key . " = '".$value."' AND ";
           }
           $condition = substr($condition, 0, -5);
           /*This code will convert array to string like this-
           input - array(
                'id'     =>     '5'
           )
           output = id = '5'*/
           $query = "SELECT * FROM ".$table_name." WHERE " . $condition;
           $result = mysqli_query($this->con, $query);
           if(mysqli_num_rows($result))
           {
                return true;
           }
           else
           {
                $this->error = "Wrong Data";
           }
      }
 }
 ?>