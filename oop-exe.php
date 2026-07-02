<?php

abstract class Personne {

    private static int $cmpt = 1;
    private int $id ;
    private string $nom;
    private string $email;


    public function __construct($nom,$email){
        $this->nom = $nom ;
        $this->email = $email;
        $this->id = self::$cmpt++;
    }

    public function getId(){
        return $this->id;
    }
    public function getNom(){
        return $this->nom;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setNom($nom){
        $this->nom = $nom ;
    }
    public function setEmail($email){
        $this->email = $email ;
    }

}

interface Payable {
    public function calculerTotal();
}

enum Statut {
    case Luxe;
    case Confort;
    case Eco;
}
class vehicule {

    private string $nom;
    private float $prix;
    private Statut $statut;

    public function __construct($nom,$prix){
        $this->nom = $nom;
        $this->prix = $prix;      
    }

    

    public function getNom(){
        return $this->nom ;
    }
    public function getPrix(){
        return $this->prix ;
    }
    public function getStatut(){
        return $this->statut;
    }


    public function calculeStatut(){
        if ($this->prix >= 100){
            $this->statut = Statut::Luxe;
        }
        elseif($this->prix >=20 && $this->prix <100){
            $this->statut = Statut::Confort;
        }elseif($this->prix<20){
            $this->statut = Statut::Eco;
        }
    }

    public function afficherVehicule(){
        echo "$this->nom" . ':' . "$this->prix" . $this->statut;
    }
}


class Location implements Payable {

    private float $total;

    private array $vehicules = [];


    public function getTotal(){
        return $this->total;
    }

    public function getVehicules(){
        return $this->vehicules;
    }
    public function ajouterVehicule($nom,$prix){
        $this->vehicules[] = new vehicule($nom,$prix); 
    }
    public function calculerTotal(){
        $somme = 0 ;

        foreach ($this->vehicules as $v) {
            $somme =+ $v->$this->getPtix();
            
        }
        return $somme;
    }

    public function afficherLocation(){
        foreach ($this->vehicules as $veh) {
            echo $veh ;

            echo $this->calculerTotal();
        }
    }

} 
class Client extends Personne {

    private array $locations = [];


    public function ajouterLocation(Location $location){
        $this->locations [] = $location;
    }

    public function afficherLocations(){
        print_r($this->locations);

         foreach ($this->locations as $loc) {
            
            
            
        }
    }


    }

 // CLIENTS
$client1 = new Client("Ahmed", "ahmed@gmail.com");
$client2 = new Client("Sara", "sara@gmail.com");
// LOCATIONS
$location1 = new Location();
$location2 = new Location();
// VEHICULES (COMPOSITION)
$location1->ajouterVehicule("BMW Serie 5", 1200);
$location1->ajouterVehicule("Dacia Logan", 50);
$location1->ajouterVehicule("Peugeot 208", 150);
$location2->ajouterVehicule("Mercedes Classe C", 800);
$location2->ajouterVehicule("Renault Clio", 30);
$location2->ajouterVehicule("Fiat Panda", 10);
// AGRÉGATION
$client1->ajouterLocation($location1);
$client2->ajouterLocation($location2);
// AFFICHAGE
echo "===== CLIENT 1 =====\n";
$client1->afficherLocations();
echo "\n===== CLIENT 2 =====\n";
$client2->afficherLocations();
