<?php

namespace Wikipizza\DAO;

use Doctrine\DBAL\Connection;
use Wikipizza\Domain\Ingredient;

class IngredientDAO {

  /**
   * Database connection
   *
   * @var \Doctrine\DBAL\Connection
   */
  private $db;

  /**
   * Constructor
   *
   * @param \Doctrine\DBAL\Connection The database connection object
   */
  public function __construct(Connection $db) {
    $this->db = $db;
  }

  /**
   * Retourne la liste de tous les ingrédients d'une pizza
   *
   * @return array tableau des pizzas
   */
  public function findAllByPizza($id_pizza) {
    $sql = "select * from ingredient where id_pizza=? order by id_ingredient";
    $rows = $this->db->fetchAll($sql,array($id_pizza));
    $ingredients = array();
    foreach ($rows as $row) {
      $id_ingredient = $row['id_ingredient'];
      $ingredients[$id_ingredient] = $this->populate($row);
    }
    return $ingredients;
  }

  /**
   * Transforme un enregistrement en objet métier
   *
   * @param array $row
   * @return Ingredient
   */
  private function populate($row) {
    $ingredient = new Ingredient();
    $ingredient->setId_ingredient($row['id_ingredient']);
    $ingredient->setLibelle($row['libelle']);
    return $ingredient;
  }

}
