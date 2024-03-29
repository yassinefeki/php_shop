<?php 
session_start(); 
include_once "Conn/sqlConnection.php";

if (isset($_POST['Product']) && isset($_POST['Quantity'])&& isset($_POST['Price'])&& isset($_POST['Designation'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$Product = validate($_POST['Product']);
	$Quantity = validate($_POST['Quantity']);
    $Price = validate($_POST['Price']);
	$Designation = validate($_POST['Designation']);

    $target_dir = "PNG/";
    $target_file = $target_dir . htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));
  




    if (empty($Product)) {
		header("Location: addProduct.php?log&error=Product name is required");
	    exit();
	}else if(empty($Quantity)){
        header("Location: addProduct.php?log&error=Quantity is required");
	    exit();

	}else if(empty($Price)){
        header("Location: addProduct.php?log&error=Price is required");
	    exit();

	}else if(empty($Designation)){
        header("Location: addProduct.php?log&error=Designation is required");
	    exit();
	}else{
			$mod=$_GET["mod"];
			if($target_file === $target_dir) {
				$sql = "UPDATE `products` SET `Product`='$Product', `Quantity`=$Quantity, `Prix_Unitaire`=$Price, `Prix_Total`=$Quantity*$Price, `designation`='$Designation' WHERE `products`.`id` =$mod AND `user` ='".$_SESSION['id']."';";
				$result = $pdo->query($sql);

			}else{
				$sql = "UPDATE `products` SET `Product`='$Product', `Quantity`=$Quantity, `Prix_Unitaire`=$Price, `Prix_Total`=$Quantity*$Price, `designation`='$Designation', `Image`='$target_file' WHERE `products`.`id` =$mod AND `user` ='".$_SESSION['id']."';";
				$result = $pdo->query($sql);
				
			}
				header("Location: crudProduit.php?reg&added=Items added successfully");
		        exit();
            
			
		
	}
	
}else{
	header("Location: crudProduit.php");
	exit();
}