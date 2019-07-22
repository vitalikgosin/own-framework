<?php
/**
 * Created by PhpStorm.
 * User: vitaly
 * Date: 16/04/2019
 * Time: 15:40
 */

require 'DatabaseInterface.php';

class DatabaseClass2 implements DatabaseInterface
{


    private $host;
    private $username;
    private $password;
    private $db_name;
    private $db_connection;
    private $dbh;

    public function __construct(string $host, string $username, string $password, string $db_name)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->db_name = $db_name;
        //$this->db_connection = $db_connection;


        $dsn = 'mysql:dbname='.$db_name.';host='.$host;

        $this->dbh = new PDO($dsn, $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);




    }
    /*

    private function db_get_prepare_stmt($link, $sql, $data = []) {
        $stmt = mysqli_prepare($link, $sql);

        //dump(mysqli_error($this->db_connection));

        if (!$stmt) {                   //------ check results
            $error = mysqli_error($this->db_connection);
            print("Error MySQL: "
                . $error);
            die();
        }

        if ($data) {
            $types = '';
            $stmt_data = [];
            foreach ($data as $value) {
                $type = null;
                if (is_int($value)) {
                    $type = 'i';
                }
                else if (is_string($value)) {
                    $type = 's';
                }
                else if (is_double($value)) {
                    $type = 'd';
                }
                if ($type) {
                    $types .= $type;
                    $stmt_data[] = $value;
                }
            }
            $values = array_merge([$stmt, $types], $stmt_data);
            $func = 'mysqli_stmt_bind_param';
            $func(...$values);
        }
        return $stmt;
    }

*/

    public function db_select(string $table_name, string $where, array $params =[])
    {
        $rows_data = [];

        $stmt =  $this->dbh->prepare("SELECT * FROM `$table_name` WHERE $where ");
       $stmt->execute($params);
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $rows_data[] = $row;
            }



        return $rows_data;
    }



   //----------------------------------------------------------------------------------------------------iseart


    public function db_insert(string $table_name, array $params):int
    {

        $str1 ='';
        $str2 ='';
        $insert_params =[];


        foreach ( $params as $key => $param){
            $str1 .= '`'.$key.'`,';

            $str2 .= '?,';
            $insert_params [] = $param;

        }

       // $insert_params = substr($insert_params, 0, -1);


        $str1 = substr($str1, 0, -1);
        $str2 = substr($str2, 0, -1);




            $sql_qw_insert = "INSERT INTO $table_name ($str1 ) VALUES ($str2)";


        //dd( $sql_qw_insert);

            $sql_dt = $insert_params;




            $stmt = $this->db_get_prepare_stmt($this->db_connection, $sql_qw_insert, $sql_dt);



            $res_sql_qw = mysqli_stmt_execute($stmt);


            if (!$res_sql_qw) {                   //------ check results
                $error = mysqli_error($this->db_connection);
                print("Error MySQL: "
                    . $error);
                die();
            }

            return mysqli_insert_id($this->db_connection);


        }

//dodelat + update;



    //----------------------------------------------------------------------------------------------------update

    public function db_update(string $table_name, string $where, array $update_params =[])
    {
        //$stmt =  $this->dbh->prepare("update $table_name set $update_params where $where");


        $set_params='';
        $set_vals=[];


        foreach ($update_params as $key => $val){
        $set_params .= $key.'=?,';
        $set_vals[] = $val;

  } ;

        $set_params = substr($set_params, 0, -1);


        $sql = "UPDATE $table_name SET $set_params WHERE $where";

        $stmt= $this->dbh->prepare($sql);

        $stmt->execute($set_vals);


    }




}