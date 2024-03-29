<?php 
session_start(); 
include_once "Conn/sqlConnection.php";


if (isset($_POST['username']) && isset($_POST['mail'])&& isset($_POST['password'])&& isset($_POST['password2'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$usename = validate($_POST['username']);
	$mail = validate($_POST['mail']);
    $password = validate($_POST['password']);
	$password2 = validate($_POST['password2']);

    if (empty($usename)) {
		header("Location: register.php?log&error=User Name is required");
	    exit();
	}else if(empty($mail)){
        header("Location: register.php?log&error=Mail is required");
	    exit();

	}else if(empty($password)){
        header("Location: register.php?log&error=Password is required");
	    exit();

	}else if(empty($password2)){
        header("Location: register.php?log&error=Confirm Password is required");
	    exit();

	}else{
		if ($password === $password2) {
			$sql = "INSERT INTO `users` ( `username`, `email`, `password`) VALUES ('$usename', '$mail', '$password')";

			$result = $pdo->query($sql);
			echo($_SESSION['id']);
				header("Location: login.php?reg&register=Account resgistered successfully");
		        exit();
            }else{
				header("Location: register.php?reg&error=Password incorrect");
				exit();
			}
		
	}
	
}else{
	header("Location: login.php");
	exit();
}