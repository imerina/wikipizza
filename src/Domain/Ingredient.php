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

}