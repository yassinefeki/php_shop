<?php

include_once "inc/header.php";
if ((empty($_SESSION['username']))){
    header("Location: login.php");
    
}
$mod=$_GET['mod'];
$req="SELECT * FROM products WHERE `id`=$mod ";
                   $result=$pdo->query($req);
                   $row=$result->fetch();

?>
<body>

    <div class="container mt-5">
    <?php if (isset($_GET['error'])) { ?>
        <div class="alert alert-danger" role="alert">
        <?php echo $_GET['error']; ?>
      </div>
      <?php } ?>
        <h2 class="mb-4">Modify Product</h2>
        <form <?php echo "action='ModifyProductConfirme.php?mod=".$_GET["mod"]."'"?> method="POST"  enctype="multipart/form-data">
            <div class="form-group">
                <label for="productName">Product Name</label>
                <input type="text" class="form-control" id="productName" name="Product" value="<?php echo $row['Product']; ?>" required>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="Quantity" value="<?php echo $row['Quantity']; ?>" required>
            </div>

            <div class="form-group">
                <label for="unitPrice">Unit Price</label>
                <input type="number" class="form-control" id="unitPrice" name="Price" value="<?php echo $row['Prix_Unitaire']; ?>" required>
            </div>

            <div class="form-group">
                <label for="designation">Designation</label>
                <select class="form-control" name="Designation"  id="designation" required>
                    <option value="">Select Designation</option>
                    <?php
                    $req="SELECT * FROM designation";
                    $result=$pdo->query($req);
                    $rows = $result->fetchAll(PDO::FETCH_OBJ);
                    
                    $result->closeCursor();

                     foreach($rows as $ro){
                        if ($ro->name_des===$row['designation']){
                         echo "<option  value='$ro->name_des' selected>$ro->name_des</option>";}
                         else{
                         echo "<option  value='$ro->name_des' >$ro->name_des</option>";
                        }
                     }
                    ?>
                </select>
            </div>
            <div class="form-group">
                        <label for="productImage">Product Image</label>
                        <div class="custom-file">
                            <input type="file" class="form-control" name="fileToUpload" value="555" id="fileToUpload">
                        </div>
            </div>
<br>
        <button type="submit" class="btn btn-primary">Modify Product</button>
        </form>
    </div>
    <?php
include_once "inc/footer.php";
?> 

