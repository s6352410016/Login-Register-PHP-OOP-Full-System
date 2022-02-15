<?php 
    define("DB_SERVER" , "localhost");
    define("DB_USER" , "root");
    define("DB_PASS" , "");
    define("DB_NAME" , "login_register_system");

    class server{
        function __construct(){
            $conn = mysqli_connect(DB_SERVER , DB_USER , DB_PASS , DB_NAME);
            $this->dbcon = $conn;

            if(!$conn){
                echo "Failed to connect" . mysqli_connect_error();
            }
        }
        public function checkUsername($username){
            $checkuser = mysqli_query($this->dbcon , "SELECT fname , lname FROM userdata WHERE username = '$username'");
            return $checkuser;
        }
        public function insertData($fname , $lname , $username , $password){
            $insertdata = mysqli_query($this->dbcon , "INSERT INTO userdata(fname , lname , username , password) VALUES('$fname' , '$lname' , '$username' , '$password')");
            return $insertdata;
        }
        public function loginCheck($username , $password){
            $checklogin = mysqli_query($this->dbcon , "SELECT * FROM userdata WHERE username = '$username' AND password = '$password'");
            return $checklogin;
        }
    }
?>