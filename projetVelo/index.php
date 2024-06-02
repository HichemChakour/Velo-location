<! -- 
lien :
https://pedago.univ-avignon.fr/~uapv2202051/

Requette pour ajouter admin a la table customers:
ALTER TABLE customers ADD COLUMN admin BOOLEAN NOT NULL DEFAULT FALSE;

le seul admin est le client: Chakour Hichem 
son id est : 1446
-->
<?php 
//debut de session pour la connexion
session_start();
//creation des class
class Type {
    private $category_id;
    private $category_name;

    public function getCategoryID() {
        return $this->category_id;
    }

    public function getCategoryName() {
        return $this->category_name;
    }

    public function __toString() {
        return "<div><strong>ID de la categorie:</strong> " . $this->getCategoryID() . 
        "<br><strong>Nom de la categorie:</strong> " . $this->getCategoryName() . "</div>";
    }
}

class Brand {
    private $brand_id;
    private $brand_name;

    public function getBrandID() {
        return $this->brand_id;
    }

    public function getBrandName() {
        return $this->brand_name;
    }

    public function __toString() {
        return "<div><strong>ID de la marque:</strong> " . $this->getBrandID() . 
        "<br><strong>Nom de la marque:</strong> " . $this->getBrandName() . "</div>";
    }
}

class Product {
    private $product_id;
    private $product_name;
    private $brand_id;
    private $category_id;
    private $model_year;
    private $list_price;
    private $nb;

    public function getProductID() {
        return $this->product_id;
    }

    public function getProductName() {
        return $this->product_name;
    }

    public function getBrandID() {
        return $this->brand_id;
    }

    public function getCategoryID() {
        return $this->category_id;
    }

    public function getModelYear() {
        return $this->model_year;
    }

    public function getListPrice() {
        return $this->list_price;
    }

    public function getNb() {
        return $this->nb;
    }

    public function __toString() {
        return "<div><strong>ID du produit:</strong> " . $this->getProductID() . 
        "<br><strong>Nom du produit:</strong> " . $this->getProductName() . 
        "<br><strong>ID de la marque:</strong> " . $this->getBrandID() . 
        "<br><strong>ID de la categorie:</strong> " . $this->getCategoryID() . 
        "<br><strong>l'année du model:</strong> " . $this->getModelYear() . 
        "<br><strong>Dernier prix:</strong> " . $this->getListPrice() . "</div>";
    }
}

class Customer {
    private $customer_id;
    private $first_name;
    private $last_name;
    private $phone;
    private $email;
    private $street;
    private $city;
    private $state;
    private $zip_code;
    private $admin;

    public function getAdmin() {
        return $this->admin;
    }

    public function getCustomer_id() {
        return $this->customer_id;
    }

    public function getFirst_name() {
        return $this->first_name;
    }

    public function getLast_name() {
        return $this->last_name;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getStreet() {
        return $this->street;
    }

    public function getCity() {
        return $this->city;
    }

    public function getState() {
        return $this->state;
    }

    public function getZip_code() {
        return $this->zip_code;
    }

    public function __toString() {
        return "<div><strong>ID du consommateur:</strong> " . $this-> getCustomer_id() . 
        "<br><strong>Prenom:</strong> " . $this->getFirst_name() . 
        "<br><strong>Nom:</strong> " . $this-> getLast_name() . 
        "<br><strong>Telephone :</strong> " . $this->getPhone() . 
        "<br><strong>Email:</strong> " . $this->getEmail() . 
        "<br><strong>Rue:</strong> " . $this->getStreet() . 
        "<br><strong>Ville:</strong> " . $this->getCity() . 
        "<br><strong>Etat :</strong> " . $this->getState() . 
        "<br><strong>Code zip:</strong> " . $this->getZip_code() . "</div>";
    }

}

class Store{
    public $store_id;
    private $store_name;
    private $phone;
    private $email;
    private $street;
    private $city;
    private $state;
    private $zip_code;
    private $num_orders;
    private $num_statut;
    private $en_stock;

    public function getEn_stock() {
        return $this->en_stock;
    }

    public function getNum_statuts() {
        return $this->num_statut;
    }

    public function getNum_orders() {
        return $this->num_orders;
    }

    public function getStore_id() {
        return $this->store_id;
    }

    public function getStore_name() {
        return $this->store_name;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getStreet() {
        return $this->street;
    }

    public function getCity() {
        return $this->city;
    }

    public function getState() {
        return $this->state;
    }

    public function getZip_code() {
        return $this->zip_code;
    }

    public function __toString() {
        return "<div><strong>ID du magasin:</strong> " . $this->getStore_id() . 
        "<br><strong>Nom du magasin:</strong> " . $this->getStore_name() . 
        "<br><strong>Telephone :</strong> " . $this->getPhone() . 
        "<br><strong>Email:</strong> " . $this->getEmail() . 
        "<br><strong>Rue:</strong> " . $this->getStreet() . 
        "<br><strong>Ville:</strong> " . $this->getCity() . 
        "<br><strong>Etat :</strong> " . $this->getState() . 
        "<br><strong>Code zip:</strong> " . $this->getZip_code() . "</div>";
    }

}

class Staff{

    private $staff_id;
    private $first_name;
    private $last_name;
    private $phone;
    private $email;
    private $active;
    private $store_id;
    private $manger_id;
    private $num_order;
    private $total_ventes;

    public function getTotal_ventes() {
        return $this->total_ventes;
    }

    public function getNum_order() {
        return $this->num_order;
    }

    public function getStaff_id() {
        return $this->staff_id;
    }

    public function getFirst_name() {
        return $this->first_name;
    }

    public function getLast_name() {
        return $this->last_name;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getActive() {
        return $this->active;
    }

    public function getStore_id() {
        return $this->store_id;
    }

    public function getManger_id() {
        return $this->manger_id;
    }

    public function __toString() {
        return "<div><strong>ID du satff:</strong> " . $this->getStaff_id() . 
        "<br><strong>Prenom:</strong> " . $this->getFirst_name() . 
        "<br><strong>Nom:</strong> " . $this->getLast_name() . 
        "<br><strong>Telephone :</strong> " . $this->getPhone() . 
        "<br><strong>Email:</strong> " . $this->getEmail() . 
        "<br><strong>Active:</strong> " . $this->getActive() . 
        "<br><strong>ID du magasin:</strong> " . $this->getStore_id() .  
        "<br><strong>ID du manager:</strong> " . $this->getManger_id() . "</div>";
    }

}

class Order{

    private $order_id;
    private $customer_id;
    private $order_status;
    private $order_date;
    private $required_date;
    //private ?string $shipped_date;
    private $store_id;
    private $staff_id;
    private $store_name; 

    public function getStore_name() {
        return $this->store_name;
    }

    public function getOrder_id() {
        return $this->order_id;
    }

    public function getCustomer_id() {
        return $this->customer_id;
    }

    public function getOrder_status() {
        switch ($this->order_status) {
            case 1:
                return 'En attente';
            case 2:
                return 'Traitement';
            case 3:
                return 'Rejeté';
            case 4:
                return 'Complété';
            default:
                return 'Inconnue';
            }
    }

    public function getOrder_date() {
        return $this->order_date;
    }
    public function getRequired_date() {
        return $this->required_date;
    }

    /*public function getShipped_date() {
        return $this->shipped_date;
    }*/

    public function getStore_id() {
        return $this->store_id;
    }

    public function getStaff_id() {
        return $this->staff_id;
    }

    public function __toString() {
        return "<div><strong>ID de la commande:</strong> " . $this->getOrder_id() . 
        "<br><strong>ID du consommateur:</strong> " . $this->getCustomer_id() . 
        "<br><strong>Statut:</strong> " . $this->getOrder_status() . 
        "<br><strong>date de la commande :</strong> " . $this->getOrder_date() . 
        "<br><strong>Date prevu pour la livraison:</strong> " . $this->getRequired_date() . 
        //"<br><strong>livré:</strong> " . $this->getShipped_date() ?? 'N/A' . 
        "<br><strong>ID du magasin:</strong> " . $this->getStore_id() .  
        "<br><strong>ID du staff:</strong> " . $this->getStaff_id() . "</div>";
    }

}

class Order_item{

    private $order_id;
    private $item_id;
    private $product_id;
    private $quantity;
    private $list_price;
    private $discount;
    private $product_name;

    public function getProduct_name() {
        return $this->product_name;
    }

    public function getOrder_id() {
        return $this->order_id;
    }

    public function getItem_id() {
        return $this->item_id;
    }

    public function getProduct_id() {
        return $this->product_id;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getList_price() {
        return $this->list_price;
    }

    public function getDiscount() {
        return $this->discount;
    }

    public function __toString() {
        return "<div><strong>ID de la commande:</strong> " . $this->getOrder_id() . 
        "<br><strong>ID de l'objet:</strong> " . $this->getItem_id() . 
        "<br><strong>ID du produit:</strong> " . $this->getProduct_id() . 
        "<br><strong>Quantité :</strong> " . $this->getQuantity() . 
        "<br><strong>Prix de liste:</strong> " . $this->getList_price() .   
        "<br><strong>Rabais:</strong> " . $this->getDiscount(). "</div>";
    }

}

class Stock{

    private $store_id;
    private $product_id;
    private $quantity;

    public function getStore_id() {
        return $this->store_id;
    }

    public function getProduct_id() {
        return $this->product_id;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function __toString() {
        return "<div><strong>ID du magasin:</strong> " . $this->getStore_id() .
        "<br><strong>ID du produit:</strong> " . $this->getProduct_id() . 
        "<br><strong>Quantité :</strong> " . $this->getQuantity() . 
 "</div>";
    }

}


?>

<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<?php
// informations de connexion a la base de données
$serveur = "pgsql:host=localhost;dbname=etd";
$utilisateur = "uapv2202051";
$mot_de_passe = "Le4Um7";

try {
    $pdo = new PDO($serveur,"$utilisateur",$mot_de_passe);
  }
  catch(PDOException $e){
 echo "Erreur : " . $e->getMessage();
}
// Recupération des clients
$stmt = $pdo->query('SELECT * FROM customers ORDER BY customer_id ');
$clients = $stmt->fetchAll(PDO::FETCH_CLASS, 'Customer');

// Recupération des types
$stmt = $pdo->query('SELECT * FROM types');
$type = $stmt->fetchAll(PDO::FETCH_CLASS, 'Type');

// Recupération des marques
$stmt = $pdo->query('SELECT * FROM brands');
$marque = $stmt->fetchAll(PDO::FETCH_CLASS, 'Brand');

// Recupération des produits
$stmt = $pdo->query('SELECT * FROM products');
$produit = $stmt->fetchAll(PDO::FETCH_CLASS, 'Product');

// Recupération des magasins
$stmt = $pdo->query('SELECT * FROM stores');
$magasin = $stmt->fetchAll(PDO::FETCH_CLASS, 'Store');

// Recupération des staffs(pas vraiment besoin)
$stmt = $pdo->query('SELECT * FROM staffs');
$staff = $stmt->fetchAll(PDO::FETCH_CLASS, 'Staff');

// Recupération des commendes
$stmt = $pdo->query('SELECT * FROM orders');
$commande = $stmt->fetchAll(PDO::FETCH_CLASS, 'Order');

// Recupération des objets
$stmt = $pdo->query('SELECT * FROM order_items');
$item = $stmt->fetchAll(PDO::FETCH_CLASS, 'Order_item');

// Recupération des stocks
$stmt = $pdo->query('SELECT * FROM stocks');
$stock = $stmt->fetchAll(PDO::FETCH_CLASS, 'Stock');



//compteur pour avoir l'id du dernier clients
$last=0;
 foreach ($clients as $c) {
    $last=$c->getCustomer_id();
}


$tmp=0;
if (isset($_POST['ID'])) {
    foreach ($clients as $c) {
        if($_POST['ID']==$c->getCustomer_id()){
            //pour verifier si c'est un admin ou non
            if($c->getAdmin()==1){
                echo"ce client est un admin et ne peut etre modifié";   
            }
            else{
                //requette pour recuperer les infos obligatoir
                $sql = "UPDATE customers SET first_name  = :prenom, last_name = :nom, email = :email WHERE customer_id = :id";

                $stmt = $pdo->prepare($sql);

                $stmt->bindParam(':nom', $_POST['nom']);
                $stmt->bindParam(':prenom', $_POST['prenom']);
                $stmt->bindParam(':email', $_POST['mail']);
                $stmt->bindParam(':id', $_POST['ID']);

                $stmt->execute();

                //reste pour les non obligatoir
                if(isset($_POST['phone'])){
                    $sql = "UPDATE customers SET phone = :phone WHERE customer_id = :id";

                $stmt = $pdo->prepare($sql);

                $stmt->bindParam(':phone', $_POST['phone']);
                $stmt->bindParam(':id', $_POST['ID']);

                $stmt->execute();

                }

                if(isset($_POST['rue'])){
                    $sql = "UPDATE customers SET street = :rue WHERE customer_id = :id";

                $stmt = $pdo->prepare($sql);

                $stmt->bindParam(':rue', $_POST['rue']);
                $stmt->bindParam(':id', $_POST['ID']);

                $stmt->execute();

                }

                if(isset($_POST['ville'])){
                    $sql = "UPDATE customers SET city = :ville WHERE customer_id = :id";

                $stmt = $pdo->prepare($sql);

                $stmt->bindParam(':ville', $_POST['ville']);
                $stmt->bindParam(':id', $_POST['ID']);

                $stmt->execute();

                }

                if(isset($_POST['etat'])){
                    $sql = "UPDATE customers SET state = :etat WHERE customer_id = :id";

                $stmt = $pdo->prepare($sql);

                $stmt->bindParam(':etat', $_POST['etat']);
                $stmt->bindParam(':id', $_POST['ID']);

                $stmt->execute();

                }

                if($_POST['admin']=='Y'){
                    $sql = "UPDATE customers SET admin = true WHERE customer_id = :id";

                $stmt = $pdo->prepare($sql);

                $stmt->bindParam(':id', $_POST['ID']);

                $stmt->execute();

                }

            }
            break;
        }
        else{
            $tmp=$c->getCustomer_id();
        }
    }

    //dans ce cas on a pas trouvé l'id demandé donc on ajout la personne
    if($tmp==$last){
        $sql = "INSERT INTO customers (customer_id, first_name, last_name, email, admin) VALUES (:customer_id, :first_name, :last_name, :email, false)";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            'customer_id' =>  $_POST['ID'], 
            'first_name' =>  $_POST['prenom'],
            'last_name' => $_POST['nom'],
            'email' =>  $_POST['mail'],
        ]);

        if(isset($_POST['phone'])){
                    $sql = "UPDATE customers SET phone = :phone WHERE customer_id = :id";

                $stmt = $pdo->prepare($sql);

                $stmt->bindParam(':phone', $_POST['phone']);
                $stmt->bindParam(':id', $_POST['ID']);

                $stmt->execute();

                }

                if(isset($_POST['rue'])){
                    $sql = "UPDATE customers SET street = :rue WHERE customer_id = :id";

                $stmt = $pdo->prepare($sql);

                $stmt->bindParam(':rue', $_POST['rue']);
                $stmt->bindParam(':id', $_POST['ID']);

                $stmt->execute();

                }

                if(isset($_POST['ville'])){
                    $sql = "UPDATE customers SET city = :ville WHERE customer_id = :id";

                $stmt = $pdo->prepare($sql);

                $stmt->bindParam(':ville', $_POST['ville']);
                $stmt->bindParam(':id', $_POST['ID']);

                $stmt->execute();

                }

                if(isset($_POST['etat'])){
                    $sql = "UPDATE customers SET state = :etat WHERE customer_id = :id";

                $stmt = $pdo->prepare($sql);

                $stmt->bindParam(':etat', $_POST['etat']);
                $stmt->bindParam(':id', $_POST['ID']);

                $stmt->execute();

                }

                if($_POST['admin']=='Y'){
                    $sql = "UPDATE customers SET admin = true WHERE customer_id = :id";

                $stmt = $pdo->prepare($sql);

                $stmt->bindParam(':id', $_POST['ID']);

                $stmt->execute();

                 $zip=rand(10000, 99999);
                 $sql = "UPDATE customers SET zip_code = :zip WHERE customer_id = :id";

                $stmt = $pdo->prepare($sql);

                $stmt->bindParam(':zip', $zip);
                $stmt->bindParam(':id', $_POST['ID']);

                $stmt->execute();

                }

    }
}
//on refait les objet avec la nouvelle personne ou la mofification 
$stmt = $pdo->query('SELECT * FROM customers ORDER BY customer_id ');
$clients = $stmt->fetchAll(PDO::FETCH_CLASS, 'Customer');

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <META http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue.css">
  <div class="m_w3-panel m_w3-ios-background">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

  <title>HC vélo</title>
  
  </head>
  <body>


    <style>
        .zoom {
            transform: scale(1.2); 
            z-index: 100;
        }
    </style>

    <script>
  $(document).ready(function() {
    // Effet de survol pour les lignes de commande
    $("table#commandes tbody tr").hover(
      function() {
        $(this).addClass("w3-yellow");
      },
      function() {
        $(this).removeClass("w3-yellow");
      }
    );
    
    // Effet de survol pour les clients avec statut "admin"
    $(".admin").hover(
      function() {
        $(this).find("td:nth-child(3)").addClass("zoom");
      },
      function() {
        $(this).find("td:nth-child(3)").removeClass("zoom");
      }
    );
  });
</script>

  <?php include 'menu.php';
  if (isset($_GET["page"])){
            include $_GET["page"];
        }
        else{
            include 'clients.php';
        }
        ?>

  </body>
<?php include 'footer.php';?>
