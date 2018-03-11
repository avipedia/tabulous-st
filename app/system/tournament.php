<?php

class Tournament
{

    private $db;

    public function __construct()
    {
        if (!($this->db instanceof PDO)) $this->db = Database::new()->connect();
        $q = $this->db->query('SELECT * FROM properties');
        $q->bindColumn('k', $k, PDO::PARAM_STR);
        $q->bindColumn('v', $v, PDO::PARAM_STR);
        $q->bindColumn('obj', $o, PDO::PARAM_BOOL);
        while ($r = $q->fetch(PDO::FETCH_BOUND)) {
            $this->$k = ($o) ? unserialize($v) : $v;
        }
    }
}