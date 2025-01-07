<?php


require './User.php';
require '../config/config.php';
require './Categorie.php';


$db = new database;
$conn = $db->connect();

$tech = new categorie($conn);

// $tech->setattributes("tech");
// $tech->createcategorie();

$tech->deletecategorie(1);











class Voiture {
    // Propriétés 
    private $marque;
    private $vitesse;

    // Constructeur
    public function __construct($marque, $vitesse) {
        $this->marque = $marque;
        $this->vitesse = $vitesse;
    }

    // Méthode (comportement)
    public function accelerer() {
        $this->vitesse += 10;
        echo "Vitesse actuelle : $this->vitesse km/h";
    }
}

// Utilisation de la classe
$maVoiture = new Voiture("Toyota", 50);
$maVoiture->accelerer();









// abstract class Animal {
//     protected $nom;

//     public function __construct($nom) {
//         $this->nom = $nom;
//     }

//     // Méthode abstraite (à définir dans la classe enfant)
//     abstract public function crier();

//     // Méthode concrète
//     public function decrire() {
//         echo "Je suis un animal nommé " . $this->nom;
//     }
// }

// class Chien extends Animal {
//     public function crier() {
//         echo "Wouf!";
//     }
// }

// // Utilisation
// $chien = new Chien("Rex");
// $chien->decrire();
// $chien->crier();




interface Animal {
    public function crier();
    public function manger();
}

class Chien implements Animal {
    public function crier() {
        echo "Wouf!";
    }
    public function manger() {
        echo "Le chien mange des croquettes.";
    }
}

class Chat implements Animal {
    public function crier() {
        echo "Miaou!";
    }
    public function manger() {
        echo "Le chat mange des sardines.";
    }
}

// Utilisation
$chien = new Chien();
$chat = new Chat();
$chien->crier();
$chat->crier();








// interface Volant {
//     public function voler();
// }

// interface Nageant {
//     public function nager();
// }

// class Canard implements Volant, Nageant {
//     public function voler() {
//         echo "Le canard vole dans le ciel.<br>";
//     }

//     public function nager() {
//         echo "Le canard nage sur le lac.<br>";
//     }

//     public function decrire() {
//         echo "Je suis un canard, je peux à la fois voler et nager.<br>";
//     }
// }

// // Utilisation
// $canard = new Canard();
// $canard->decrire();
// $canard->voler();
// $canard->nager();






interface Vendable {
    public function calculerPrixTTC();
    public function appliquerRemise($pourcentage);
}

interface Expediable {
    public function calculerFraisDePort();
    public function genererEtiquette();
}

class Produit implements Vendable, Expediable {
    private $nom;
    private $prixHT;
    private $poids;

    public function __construct($nom, $prixHT, $poids) {
        $this->nom = $nom;
        $this->prixHT = $prixHT;
        $this->poids = $poids;
    }

    // Implémentation de Vendable
    public function calculerPrixTTC() {
        return $this->prixHT * 1.2; // TVA de 20%
    }

    public function appliquerRemise($pourcentage) {
        $this->prixHT -= $this->prixHT * ($pourcentage / 100);
    }

    // Implémentation de Expediable
    public function calculerFraisDePort() {
        return $this->poids * 2; // 2€ par kg
    }

    public function genererEtiquette() {
        echo "Produit : $this->nom | Prix TTC : " . $this->calculerPrixTTC() . " € | Frais de port : " . $this->calculerFraisDePort() . " €<br>";
    }
}

// Utilisation
$produit = new Produit("Ordinateur Portable", 1000, 3);
$produit->genererEtiquette();
$produit->appliquerRemise(10);
$produit->genererEtiquette();














class Produits {
    public $nom;
    public $prix;
    public $categorie;

    // Constructeur standard
    public function __construct($nom, $prix, $categorie) {
        $this->nom = $nom;
        $this->prix = $prix;
        $this->categorie = $categorie;
    }

    // Constructeur de copie
    public function __clone() {
        $this->nom = $this->nom . " (Édition Limitée)";
        $this->prix = $this->prix * 0.9; 
    }

    public function afficherProduit() {
        echo "Produit : $this->nom | Prix : $this->prix € | Catégorie : $this->categorie <br>";
    }
}
 
// Créer un produit original
$produitOriginal = new Produits("Laptop Gaming", 1200, "Informatique");
$produitOriginal->afficherProduit();

// Créer une copie du produit avec réduction
$produitPromo = clone $produitOriginal;
$produitPromo->afficherProduit();
