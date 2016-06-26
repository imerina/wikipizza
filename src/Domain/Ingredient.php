<?php

namespace Wikipizza\Domain;

class Ingredient {

  /**
   * ID ingredient
   * @var integer
   */
  private $id_ingredient;

  /**
   * Libellé ingredient
   * @var string
   */
  private $libelle;

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
  function getId_ingredient() {
    return $this->id_ingredient;
  }

  function getLibelle() {
    return $this->libelle;
  }

  function setId_ingredient($id_ingredient) {
    $this->id_ingredient = $id_ingredient;
  }

  function setLibelle($libelle) {
    $this->libelle = $libelle;
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

}
