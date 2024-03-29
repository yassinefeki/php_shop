<?php 
session_start(); 
include_once "Conn/sqlConnection.php";


if (isset($_POST['usermail']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$usermail = validate($_POST['usermail']);
	$password = validate($_POST['password']);
	$box = validate($_POST['checkbox']);
	if ($box==="remember"){
		setcookie("usermail", $usermail, time() + 3600, "/");
		setcookie("password", $password, time() + 3600, "/");
	}
	else{
		setcookie("usermail", $usermail, time() - 3600*3, "/"); 
		setcookie("password", $password, time() - 3600*3, "/"); 
	}

    if (empty($usermail)) {
		header("Location: login.php?log&error=User Name is required");
	    exit();
	}else if(empty($password)){
        header("Location: login.php?log&error=Password is required");
	    exit();

	}else{
		$sql = "SELECT * FROM users WHERE (username='$usermail' OR email='$usermail') AND password='$password'";

		$result = $pdo->query($sql);

		if ($result->rowCount() === 1) {
			$row=$result->fetch();
            if (($row['username'] === $usermail || $row['mail'] === $usermail )  && $row['password'] === $password) {
            	$_SESSION['username'] = $row['username'];
            	//$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: crudProduit.php");
		        exit();
            }else{
				header("Location: login.php?log&error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: login.php?log&error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: login.php");
	exit();
}