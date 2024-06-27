<?php
require_once ('app/database.php');

class Reminder{
public function __construct(){
}

    public function get_all_reminders() {
        try {
            $db = db_connect();
            $statement = $db->prepare("SELECT * FROM notes");
            $statement->execute();
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        } catch (PDOException $e) {
            // Handle database errors here
            echo "Error fetching reminders: " . $e->getMessage();
            return [];
        }
    }


    public function update_reminders($reminderId, $updatedReminderText) {
        try {
            $db = db_connect();

            // Prepare the SQL statement for update
            $statement = $db->prepare("UPDATE notes SET reminders = :updatedReminderText WHERE id = :reminderId");

            // Bind parameters
            $statement->bindParam(':updatedReminderText', $updatedReminderText);
            $statement->bindParam(':reminderId', $reminderId);

            // Execute the statement
            $statement->execute();

            // Optionally, you can check if any rows were affected
            return $statement->rowCount() > 0;

        } catch (PDOException $e) {
            // Handle database errors here
            echo "Error updating reminder: " . $e->getMessage();
            return false;
        }
    }


  public function create_reminder($reminderText) {
      try {
          $db = db_connect();
          $statement = $db->prepare("INSERT INTO notes (reminders, created_at) VALUES (:reminders, current_timestamp())");
          $statement->bindParam(':reminders', $reminderText);
          $statement->execute();

          // Optionally, you can return the ID of the newly inserted reminder
          return $db->lastInsertId();
      } catch (PDOException $e) {
          // Handle database errors here
          echo "Error creating reminder: " . $e->getMessage();
          return false;
      }
  }

 public function delete_reminder($reminderId) {
        try {
            $db = db_connect();
            $statement = $db->prepare("DELETE FROM notes WHERE id = :id");
            $statement->bindParam(':id', $reminderId);
            $statement->execute();

            // Optionally, you can check if any rows were affected
            return $statement->rowCount() > 0;
        } catch (PDOException $e) {
            // Handle database errors here
            echo "Error deleting reminder: " . $e->getMessage();
            return false;
        }
  
  
}
}
?>