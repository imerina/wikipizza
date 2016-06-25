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

}