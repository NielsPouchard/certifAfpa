<?php
namespace App\Repository;

use App\Database\DB;

abstract class AbstractRepository
{
    protected \PDO $db;

    public function __construct()
    {
        $this->db = DB::getDb();
    }

    public function getDb(): \PDO
    {
        return $this->db;
    }
}
