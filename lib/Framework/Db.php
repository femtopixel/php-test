<?php
namespace Framework;


final class Db
{
    private $pdo;

    public function execute($sql)
    {
        $statement = $this->getPdo()->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    private function getPdo()
    {
        if (!$this->pdo) {
            $this->pdo = new \Pdo('mysql:host=localhost;dbname=exam', 'exam', 'exam');
            $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \Pdo::FETCH_ASSOC);
        }
        return $this->pdo;
    }
}
