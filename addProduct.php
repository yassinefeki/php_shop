<?php

include_once "inc/header.php";
if ((empty($_SESSION['username']))){
    header("Location: login.php");
}
?>
<body>

    <div class="container mt-5">
    <?php if (isset($_GET['error'])) { ?>
        <div class="alert alert-danger" role="alert">
        <?php echo $_GET['error']; ?>
      </div>
      <?php } ?>
        <h2 class="mb-4">Add Product</h2>
        <form action="addProductConfirme.php" method="POST"  enctype="multipart/form-data">
            <div class="form-group">
                <label for="productName">Product Name</label>
                <input type="text" class="form-control" id="productName" name="Product" placeholder="Enter Product Name" required>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="Quantity" placeholder="Enter Quantity" required>
            </div>

            <div class="form-group">
                <label for="unitPrice">Unit Price</label>
                <input type="number" class="form-control" id="unitPrice" name="Price" placeholder="Enter Unit Price" required>
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

                     foreach($rows as $row){
                         echo "<option value='$row->name_des'>$row->name_des</option>";
                        
                     }
                    ?>
                </select>
            </div>
            <div class="form-group">
                        <label for="productImage">Product Image</label>
                        <div class="custom-file">
                            <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
                        </div>
            </div>
<br>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
    <?php
include_once "inc/footer.php";
?> 

