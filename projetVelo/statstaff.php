<! -- 
lien :
https://pedago.univ-avignon.fr/~uapv2202051/index.php?page=statstaff.php
tout foncionne tres bien comme damandé 
le menu etait deja fait d'avance dans le mini projet 
mais pour que statstaff.php foncionne elle doit imperativement etre inculide dans index.php
car c'est la que j'ai tout mes class donc je vous pris d'utilser le lien comme indiqué ci dessous pour que cela foncionne 
bonne vacances.
-->
<?php 
if(!isset($_SESSION['name'])){
    header("Location: /~uapv2202051/index.php?page=connexion.php");
}
if($_SESSION['admin']!=true){
    echo"Vous n'avais pas l'autorisation d'étre la :( ";
    echo"<a href=\"index.php\">retour à l'acceuil </a>"; 
}
else{
$sql = "SELECT staffs.staff_id, staffs.first_name, staffs.last_name,staffs.store_id , COUNT(orders.order_id) AS num_order, SUM(order_items.list_price * order_items.quantity) AS total_ventes
				FROM staffs 
				LEFT JOIN orders ON staffs.staff_id = orders.staff_id
				LEFT JOIN order_items  ON orders.order_id = order_items.order_id
				GROUP BY staffs.staff_id, staffs.first_name, staffs.last_name
				ORDER BY total_ventes DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$staffs = $stmt->fetchAll(PDO::FETCH_CLASS, 'Staff');

echo "<table class='w3-table-all w3-card-4:'>";
echo "<tr><th>ID</th><th>Prénom</th><th>Nom</th><th>nombre commandes</th><th> total des ventes</th><th class='produit'>3 produit les plus vendu</th></tr>";
foreach ($staffs as $s) {
									$sql = "SELECT products.product_name, COUNT(products.product_name) nb
                                            FROM order_items  
                                            LEFT JOIN products  ON order_items.product_id = products.product_id 
											LEFT JOIN orders  ON orders.order_id = order_items.order_id
											LEFT JOIN staffs ON staffs.staff_id = orders.staff_id
											WHERE staffs.staff_id = :staff_id 
											GROUP BY products.product_name
                                            ORDER BY nb DESC LIMIT 3";
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->bindValue(':staff_id', $s->getStaff_id(), PDO::PARAM_INT);
                                    $stmt->execute();
                                    $produits = $stmt->fetchAll(PDO::FETCH_CLASS, 'Order_item');
                                    

            
    echo "<tr class='".$s->getStore_id()."'><td>" . $s->getStaff_id() . "</td><td>" . $s->getFirst_name() . "</td><td>" . $s->getLast_name() . "</td><td>" . $s->getNum_order() . "</td><td>" . $s->getTotal_ventes() ."</td><td class='produit'> ";
    foreach ($produits as $p){
    	echo  $p->getProduct_name() ;
		}
		echo  "</td>";
}
echo "</table>";
}



?>	
<button class="monbouton1 w3-button w3-round w3-blue"> Santa Cruz Bikes</button>
<button class="monbouton2 w3-button w3-round w3-red">  Baldwin Bikes</button>
<button class="monbouton3 w3-button w3-round w3-green">  Rowlett Bikes</button>
<button class="monbouton w3-button w3-round w3-teal">sup 3 meillieur ventes </button>
<script >
      $(document).ready(function(){
        $(".monbouton1").click(function(){
                     $(".1").slideToggle("slow");
                     $(this).toggleClass("active");
                     });
        $(".monbouton2").click(function(){
                     $(".2").slideToggle("slow");
                     $(this).toggleClass("active");
                     });
        $(".monbouton3").click(function(){
                     $(".3").slideToggle("slow");
                     $(this).toggleClass("active");
                     });
//j'ai rajouter cette foncion qui focionne comme dans le tp 4 c'est a dire elle supprime la colomne produit en entier si en en a pas l'utilité
        $(".monbouton").click(function(){
                     $(".produit").slideToggle("slow");
                     $(this).toggleClass("active");
                     });
        });
</script>			