<?php
/**
 * Classe mère DAO 
 */

namespace Wikipizza\DAO;

use Doctrine\DBAL\Connection;

class DAO 
{
    /**
     * Database connection
     *
     * @var \Doctrine\DBAL\Connection
     */
    private $dbh;

    /**
     * Constructor
     *
     * @param \Doctrine\DBAL\Connection The database connection object
     */
    public function __construct(Connection $dbh) {
        $this->dbh = $dbh;
    }

    /**
     * Grants access to the database connection object
     *
     * @return \Doctrine\DBAL\Connection The database connection object
     */
    protected function getDbh() {
        return $this->dbh;
    }

}