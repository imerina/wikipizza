<?php

/**
 * DAO ingrédient
 */

namespace Wikipizza\DAO;

use Wikipizza\Domain\Ingredient;

class IngredientDAO extends DAO {

  /**
   * Retourne la liste de tous les ingrédients d'une pizza
   *
   * @return array tableau des pizzas
   */
  public function findAllByPizza($id_pizza) {
    $sql = "SELECT i.id_ingredient,i.libelle FROM ingredient i, contient c WHERE c.id_ingredient = i.id_ingredient and c.id_pizza = ?";
    $rows = $this->getDbh()->fetchAll($sql, array($id_pizza));
    $ingredients = array();
    foreach ($rows as $row) {
      $ingredient = new Ingredient($row);
      $ingredients[$ingredient->getId_ingredient()] = $ingredient;
    }
    return $ingredients;
  }

}