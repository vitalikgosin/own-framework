<?php
/**
 * Created by PhpStorm.
 * User: vitaly
 * Date: 16/04/2019
 * Time: 15:42
 */

interface DatabaseInterface
{
    //public function db_connect();

    public function db_select(string $table_name,string $where, array $params = []);

    public function db_insert(string $table_name, array $params );

    public function db_update(string $table_name, string $where,array $update_params=[]);

}