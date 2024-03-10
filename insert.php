<?php

include 'config.php';


$fname = $_POST["fname"];
$lname = $_POST["lname"];
$address = $_POST["address"];
$city = $_POST["city"];
$pin = $_POST["pin"];
$email = $_POST["email"];
$pwd = $_POST["pwd"];
$repwd = $_POST["re-pwd"];


function isPasswordStrong($password) {
    // Check length
    if (strlen($password) < 8) {
        return false;
    }
    // Check for at least one lowercase letter
    if (!preg_match('/[a-z]/', $password)) {
        return false;
    }
    // Check for at least one uppercase letter
    if (!preg_match('/[A-Z]/', $password)) {
        return false;
    }
    // Check for at least one digit
    if (!preg_match('/\d/', $password)) {
        return false;
    }
    // Check for at least one special character
    if (!preg_match('/[^a-zA-Z\d]/', $password)) {
        return false;
    }
    return true;
}

if (isPasswordStrong($pwd) && $pwd == $repwd) {

if($mysqli->query("INSERT INTO users (fname, lname, address, city, pin, email, password) VALUES('$fname', '$lname', '$address', '$city', $pin, '$email', '$pwd')")){
	echo 'Data inserted';
	echo '<br/>';
}

header ("location:login.php");

} else {
	echo 'Password is not strong enough or doesnt match';
}

?>
