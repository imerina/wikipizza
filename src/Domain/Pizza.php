<?php

namespace Wikipizza\Domain;

class Pizza {

  /**
   * ID pizza
   * @var integer
   */
  private $id_pizza;

  /**
   * Libellé pizza
   * @var string
   */
  private $libelle;

  /**
   * Prix petite pizza
   * @var float
   */
  private $prix_petite;

  /**
   * Prix grande pizza
   * @var float
   */
  private $prix_grande;

  /**
   * Prix plaque pizza
   * @var float
   */
  private $prix_plaque;

  /**
   * Ingrédients de la pizza
   * @var array
   */
  private $ingredients;

  /**
   * Constructor
   * @param array The data to populate
   */
  function __construct($array = array()) {
    $this->populate($array);
  }

  /**
   * Getter/Setter
   * 
   */
  function getId_pizza() {
    return $this->id_pizza;
  }

  function getLibelle() {
    return $this->libelle;
  }

  function getPrix_petite() {
    return $this->prix_petite;
  }

  function getPrix_grande() {
    return $this->prix_grande;
  }

  function getPrix_plaque() {
    return $this->prix_plaque;
  }

  function getIngredients() {
    return $this->ingredients;
  }

  function setId_pizza($id_pizza) {
    $this->id_pizza = $id_pizza;
  }

  function setLibelle($libelle) {
    $this->libelle = $libelle;
  }

  function setPrix_petite($prix_petite) {
    $this->prix_petite = $prix_petite;
  }

  function setPrix_grande($prix_grande) {
    $this->prix_grande = $prix_grande;
  }

  function setPrix_plaque($prix_plaque) {
    $this->prix_plaque = $prix_plaque;
  }

  function setIngredients($ingredients) {
    $this->ingredients = $ingredients;
  }

  /**
   * Populate object properties with array
   * @param array the array containing data
   */
  function populate(array $array) {
    foreach ($array as $key => $value) {
      $method = 'set' . ucfirst($key);
      if (method_exists($this, $method)) {
        $this->$method($value);
      }
    }
  }

  /**
   * Génère la liste des ingrédients dans un format lisible
   * Make a comma separated list of ingredients
   * @return string la liste des ingredients séparés par une virgule
   */
  function afficherIngredients() {
    $chaine="";
    $separator = ', ';
    foreach ($this->ingredients as $ingredient) {
      $chaine .= $ingredient->getLibelle() . $separator;
    }
    // Remove last comma
    $chaine = ucfirst(rtrim($chaine, $separator));
    return $chaine;
  }

}
