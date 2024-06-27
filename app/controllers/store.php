<?php

require_once 'app/models/reminder.php';

class Store extends Controller {

    public function index() {
        $reminderModel = $this->model('reminder');
        $reminders = $reminderModel->get_all_reminders();

        $this->view('reminders/index', ['reminders' => $reminders]);
    }

    public function verify() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Validate and sanitize input
            $reminderText = trim($_POST['reminder']);

            // Example validation (you can add more complex validation as needed)
            if (empty($reminderText)) {
                echo "Reminder text is required.";
                exit;
            }

            // Save to database (assuming you have a model or function to handle this)
            $reminder = $this->model('reminder'); // Adjust to your model instantiation method
            $success = $reminder->create_reminder($reminderText);

            if ($success) {
                // Redirect or display success message
                header("Location: /store/index"); // Redirect to index page after successful save
                exit;
            } else {
                echo "Failed to create reminder. Please try again.";
            }
        }
    }
}
?>
