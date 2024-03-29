<?php
include_once "inc/header.php";
if ((empty($_SESSION['username']))){
    header("Location: login.php");
}
?>

<body>

<div class="container-xl">
<?php if (isset($_GET['added'])) { ?>
        <div class="alert alert-success" role="alert">
        <?php echo $_GET['added']; ?>
      </div>
     	<?php } ?>
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Customer <b>Details</b></h2></div>
                    <div class="col-sm-4">
                        <div class="search-box">
                            <i class="material-icons">&#xE8B6;</i>
                            <input type="text" id="searchInput" class="form-control" oninput="searchProducts()" placeholder="Search&hellip;">
                        </div>
                    </div>
                </div>
            </div>
            <table id="table" class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Quantité</th>
                        <th>Prix Unitaire</th>
                        <th>Prix Total</th>
                        <th>Designation</th>
                        <th>Image</th>
                        <th>Actions</th>
                        
                    </tr>
                </thead>
                <tbody>
                   <?php
                   if (isset($_GET["del"])){
                    $sql="DELETE FROM products WHERE`id` =".$_GET['del'];
                    $res=$pdo->query($sql);
                    header("Location: crudProduit.php");
                    }
                   $req="SELECT * FROM products WHERE `user` ='".$_SESSION['id']."' ORDER BY id" ;
                   $result=$pdo->query($req);
                   $rows = $result->fetchAll(PDO::FETCH_OBJ);
                   
                   $result->closeCursor();
                   
                   if (!(empty($_SESSION['username']))){
                    
                   
                    foreach($rows as $row){
                        echo "<tr>";
                        echo "<td>$row->id</td>";
                        echo "<td>$row->Product</td>";
                        echo "<td>$row->Quantity</td>";
                        echo "<td>$row->Prix_Unitaire</td>";
                        echo "<td>$row->Prix_Total</td>";
                        echo "<td>$row->designation</td>";
                        echo "<td><img src="."$row->Image"." style='height: 50px;'></td>";
                        //<a href='#' class='view' title='View' data-toggle='tooltip'><i class='material-icons'>&#xE417;</i></a>
                    echo"
                   <td>
                       <a href='ModifyProduct.php?mod=$row->id' class='edit' title='Edit' data-toggle='tooltip'><i class='material-icons'>&#xE254;</i></a>
                       <a href='?del=$row->id' class='delete' title='Delete' data-toggle='tooltip'><i class='material-icons'>&#xE872;</i></a>
                    ";
                    }
                }
                   
                   ?>
                </tbody>
            </table>
            <a href="addProduct.php" class="btn btn-primary">Add Product</a>
            <!--<div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
                </ul>
            </div>-->
        </div>
    </div>  
</div>  

<script>
    
    function searchProducts() {
        var searchQuery = document.getElementById("searchInput").value;
            $.ajax({
                type: "POST",
                url: "search.php",
                data: { searchQuery: searchQuery },
                success: function(response) {
                    $("#table").html(response);
                }
            });
    }

</script>
<?php
include_once "inc/footer.php";
?> 
