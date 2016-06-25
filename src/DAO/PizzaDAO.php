<?php

namespace Wikipizza\DAO;

use Doctrine\DBAL\Connection;
use Wikipizza\Domain\Pizza;

class PizzaDAO
{
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
     * Retourne la liste de toutes les pizzas
     *
     * @return array tableau des pizzas
     */
    public function findAll() {
        $sql = "select * from pizza order by id_pizza";
        $rows = $this->db->fetchAll($sql);
        $articles = array();
        foreach ($rows as $row) {
            $id_pizza = $row['id_pizza'];
            $pizzas[$id_pizza] = $this->populate($row);
        }
        return $pizzas;
    }

    /**
     * Transforme un enregistrement en objet métier
     *
     * @param array $row
     * @return Pizza
     */
    private function populate($row) {
        $pizza = new Pizza();
        $pizza->setId_pizza($row['id_pizza']);
        $pizza->setLibelle($row['libelle']);
        $pizza->setPrix_petite($row['prix_petite']);
        $pizza->setPrix_grande($row['prix_grande']);
        $pizza->setPrix_plaque($row['prix_plaque']);
        return $pizza;
    }
}
