<?php
require_once 'app/core/Controller.php';


class Reminders extends Controller {

  
  public function index() {
  $reminder = $this->model('reminder');

  try {
      $reminders = $reminder->get_all_reminders();

      // Debugging output to check $reminders
     //var_dump($reminders); // Check what data is retrieved

      $this->view('reminders/index', ['reminders' => $reminders]);
  } catch (Exception $e) {
      // Handle and log the exception
      error_log('Error fetching reminders: ' . $e->getMessage());
      // Optionally, redirect to an error page or display a user-friendly message
      // Example: $this->view('error', ['message' => 'Error fetching reminders.']);
  }

  }

  
public function create(){
  $R = $this->model('reminder');
$this->view('/reminders/create');
}  
}
?>