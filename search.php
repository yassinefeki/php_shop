<?php
// Include necessary files and initialize database connection
session_start();
include_once "Conn/sqlConnection.php";

if (isset($_POST['searchQuery'])) {

    $searchQuery =$_POST['searchQuery'];

    if (!empty($searchQuery)) {
        $req="SELECT * FROM products WHERE `user` ='".$_SESSION['id']."' AND `Product` LIKE '%$searchQuery%' ORDER BY id" ;
    } else {
        $req="SELECT * FROM products WHERE `user` ='".$_SESSION['id']."' ORDER BY id" ;
                   
    }
    $result=$pdo->query($req);
    $rows = $result->fetchAll(PDO::FETCH_OBJ);
    
    $result->closeCursor();


    ?>
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
            
<?php
} else {
    // Handle empty search query if needed
}
?>