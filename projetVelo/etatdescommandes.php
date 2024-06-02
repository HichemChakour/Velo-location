<?php
if(!isset($_SESSION['name'])){
    header("Location: /~uapv2202051/index.php?page=connexion.php");
}

$sql ="SELECT products.product_id, products.product_name, SUM(order_items.quantity) as nb
        FROM products 
        INNER JOIN order_items  ON products.product_id = order_items.product_id
        WHERE order_items.order_id IN (
            SELECT orders.order_id
            FROM orders 
            WHERE orders.order_status = 4
        )
        GROUP BY products.product_id
        ORDER BY nb DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$ttproduit = $stmt->fetchAll(PDO::FETCH_CLASS, 'Product');
?>

<table class='w3-table w3-striped'>
<thead><tr><th>Velo</th><th>Vente total</th></tr></thead>
<tbody> <?php
    foreach ($ttproduit as $p) {
       
        echo "<tr><td><a href=\"index.php?page=magasinsparproduit.php&product_id=".$p->getProductID()."\" >" . $p->getProductName()."</td></a><td>" .$p->getNb()."</td></tr>";
        
    }
    ?>
    </tbody>
    </table>
