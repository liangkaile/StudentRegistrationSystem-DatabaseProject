<?php
// configuration for the website
include_once("constants.php");

class Database
{
  var $con;
  var $db_name = DATABASE_NAME;
  var $db_user = DB_USER;
  var $password = PASSWORD;
  var $domain = DOMAIN;
  
  public function __construct()
  {
    $this->con=mysql_connect(DOMAIN, DB_USER, PASSWORD);
    mysql_select_db(DATABASE_NAME, $this->con);
  }

  public function __destruct()
  {
    mysql_close($this->con);
  }
  
  public function insert($table, $record)
  {
    // excute ...
    
  }
  
  public function escape($arg)
  {
    return mysql_real_escape_string($arg);
  }

  public function query($sql)
  {
    $r = mysql_query($sql);
    return $r;
  }


  /** 
   * SELECT * from @param table
   * 
   * @param table 
   * 
   * @return false if error occur
   */  
  public function get($table)
  {
    $r = mysql_query('select * from '. $this->escape('table'));
    return $r;
  }

  // Testing function, ignore it.
  public function add()
  {
    return 'add';
  }
  public function del()
  {
    return 'delete';
  }
}//
?>