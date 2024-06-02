
<?php

// récupération de l'id du client
if (isset($_GET['customer_id'])) {
    $id_client = $_GET['customer_id'];
} else {
    echo "Erreur : aucun id de client n'a été spécifié.";
    exit;
}

// récupération des commandes du client
$sql = "SELECT orders.order_id, orders.order_status, orders.order_date, orders.required_date, orders.shipped_date, stores.store_name  
        FROM orders  
        INNER JOIN stores ON orders.store_id = stores.store_id 
        WHERE orders.customer_id = :id_client 
        ORDER BY orders.order_status ASC";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id_client', $id_client, PDO::PARAM_INT);
$stmt->execute();
$commandes = $stmt->fetchAll(PDO::FETCH_CLASS, 'Order');

// récupération des produits pour chaque commande


unset($commande); // libération de la référence

// affichage des résultats
?>

    <h1>Commandes du client N°<?php echo $id_client; ?></h1>
    <table id="commandes" class="w3-table-all w3-card-4">
        <thead>
            <tr>
                <th>Id commande</th>
                <th>Statut</th>
                <th>Magasin</th>
                <th>Date commande</th>
                <th>Date livraison</th>
                <th>Date expédition</th>
                <th  class="produit">Produits</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($commandes as $commande): 
                $sql = "SELECT products.product_name, order_items.quantity, order_items.list_price, order_items.discount 
                                            FROM order_items  
                                            INNER JOIN products  ON order_items.product_id = products.product_id 
                                            WHERE order_items.order_id = :id_commande";
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->bindValue(':id_commande', $commande->getOrder_id(), PDO::PARAM_INT);
                                    $stmt->execute();
                                    $produits = $stmt->fetchAll(PDO::FETCH_CLASS, 'Order_item');
                                    ?>
                <tr>
                    <td><?= $commande->getOrder_id() ?></td>
                    <td><?= $commande->getOrder_status() ?></td>
                    <td><?= $commande->getStore_name() ?></td>
                    <td><?= $commande->getOrder_date() ?></td>
                    <td><?= $commande->getRequired_date() ?></td>
                    <td><?= $commande->shipped_date ?></td>
                    <td class="produit">
                        <ul >
                            <?php 
                                    
                                    foreach ($produits as $p){ ?>
                                <li><?= $p->getProduct_name()?> (<?= $p->getQuantity() ?> x <?= $p->getList_price() ?> € - <?= $p->getDiscount() ?> %)</li>
                            <?php } ?>
                        </ul>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
             </table>
            <button class="monbouton w3-button w3-round w3-blue"> enlever produits</button>
       
   <script >
      $(document).ready(function(){
        $(".monbouton").click(function(){
                     $(".produit").slideToggle("slow");
                     $(this).toggleClass("active");
                     });
        });
</script>

 