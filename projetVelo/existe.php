<?php 
// page supplementaire mais obligatoir pour le json dans la page clients.php
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
$serveur = "pgsql:host=localhost;dbname=etd";
$utilisateur = "uapv2202051";
$mot_de_passe = "Le4Um7";

try {
    $pdo = new PDO($serveur,"$utilisateur",$mot_de_passe);
  }
  catch(PDOException $e){
 echo "Erreur : " . $e->getMessage();
}
// Récupération des clients
$stmt = $pdo->query('SELECT * FROM customers ORDER BY customer_id ');
$clients = $stmt->fetchAll(PDO::FETCH_CLASS, 'Customer');

foreach ($clients as $client) {
    if($client->getCustomer_id()==$_GET['q']){
        $client_data = array(
        'first_name' => $client->getFirst_name(),
        'last_name' => $client->getLast_name(),
        'phone' =>$client->getPhone(),
        'email' =>$client->getEmail(),
        'street' =>$client->getStreet(),
        'city' =>$client->getCity(),
        'state' =>$client->getState()
        );
        header('Content-Type: application/json');
        echo json_encode($client_data);
        break;
    }
}
?>