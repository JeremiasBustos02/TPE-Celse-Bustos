<?php
class ModelConfig
{
    protected $db;

    public function __construct()
    {
        $this->db = new PDO(
            "mysql:host" . MYSQL_HOST .
            ";dbname=" . MYSQL_DB . ";charset=utf8",
            MYSQL_USER,
            MYSQL_PASS
        );
        $this->__deploy();
    }

    private function __deploy()
    {
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();
        if (count($tables) == 0)
        {
            $sql =<<<END
            END;
            $this->db->query($sql);
        }
    }
}