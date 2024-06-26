<?php

class Reminder{
public function __construct(){
}

  public function get_all_reminders() {
   $db = db_connect();
    $statement = $db->prepare("SELECT * FROM notes");
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }

  public function update_reminders() {
   $db = db_connect();
    $statement = $db->prepare("select * FROM notes");
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }  
}
?>