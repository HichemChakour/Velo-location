<?php
if(!isset($_SESSION['name'])){
    header("Location: /~uapv2202051/index.php?page=connexion.php");
}
if($_SESSION['admin']!=true){
    echo"Vous n'avais pas l'autorisation d'étre la :( ";
    echo"<a href=\"index.php\">retour à l'acceuil </a>"; 
}
else{
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
} else {
    echo "Erreur : aucun id de produit n'a été spécifié.";
    exit;
}
//dans ma requette j'ai mis SUM(order_items.quantity) pour avoir la quantité du produit par commande, les autres étudiants ont mis le nombre de commande tout cours je sais pas si c'est juste donc je chercge juste a me justifier si c'est faut

$sql ="SELECT stores.store_id, stores.store_name, SUM(order_items.quantity) AS num_orders, SUM(CASE WHEN orders.order_status = 2 THEN order_items.quantity END)  AS num_statut, stocks.quantity AS en_stock 
        FROM stores
        INNER JOIN stocks ON stores.store_id = stocks.store_id AND stocks.product_id =:product_id
        INNER JOIN orders ON orders.store_id = stores.store_id
        INNER JOIN order_items ON order_items.order_id = orders.order_id
        WHERE order_items.product_id = :product_id
        GROUP BY stores.store_id, stocks.quantity
        ORDER BY num_orders DESC";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':product_id', $product_id, PDO::PARAM_INT);
$stmt->execute();
$Pstore = $stmt->fetchAll(PDO::FETCH_CLASS, 'Store');
?>

<table class='w3-table w3-striped'>
<thead><tr><th>ID</th><th>Magasin</th><th>Toute les commandes</th><th>Nombre de commande en cours</th><th>En stock</th></tr></thead>
<tbody> <?php
    foreach ($Pstore as $s) {
       
        echo "<tr><td>" . $s->getStore_id()."</td><td>" . $s->getStore_name()."</td><td>" .$s->getNum_orders()."</td><td>" . $s->getNum_statuts()."</td><td>" .$s->getEn_stock()."</td></tr>";
        
    }
    ?>
    </tbody>
    </table>
<?php } ?>
