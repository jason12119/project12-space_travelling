<?php

class db_connect
{
    const host = 'localhost';
    const user = 'root';
    const pass = 'root';
    const db_name = '';
    var $prefix = '';

    function db()
    {
        ($connect = mysqli_connect(
            self::host,
            self::user,
            self::pass,
            self::db_name
        )) or die('Could not connect to database!');
        $connect->set_charset('utf8');
        $connect->query("SET SESSION sql_mode=''");
        return $connect;
    }

    // Ochrana proti sql injection
    function sqlInjection($string)
    {
        return mysqli_real_escape_string($this->db(), $string);
    }
}

?>
