<?php

/**
 * DAO pizza
 */

namespace Wikipizza\DAO;

use Wikipizza\Domain\Pizza;

class PizzaDAO extends DAO {

  /**
   * DAO ingrédient
   * @var IngredientDAO
   */
  private $ingredientDAO;
  
  /**
   * 
   * @param \Wikipizza\DAO\IngredientDAO $ingredientDAO
   */
  function setIngredientDAO(IngredientDAO $ingredientDAO) {
    $this->ingredientDAO = $ingredientDAO;
  }
  
  /**
   * Retourne la liste de toutes les pizzas
   *
   * @return array tableau des pizzas
   */
  public function findAll() {
    $sql = "select * from pizza order by id_pizza";
    $rows = $this->getDbh()->fetchAll($sql);
    $pizzas = array();
    foreach ($rows as $row) {
      $ingredients = $this->ingredientDAO->findAllByPizza($row['id_pizza']);
      $pizza = new Pizza($row);
      $pizza->setIngredients($ingredients);
      $pizzas[$pizza->getId_pizza()] = $pizza;
    }
    return $pizzas;
  }

}
