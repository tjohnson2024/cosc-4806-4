<?php

require_once 'app/models/reminder.php'; // Adjust the path as per your application's structure

class Delete_and_update extends Controller {

    public function index() {
        $reminderModel = $this->model('reminder');
        $reminders = $reminderModel->get_all_reminders();

        $this->view('reminders/index', ['reminders' => $reminders]);
    }

    public function update() {
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
            $reminderId = $_GET['id'];
            $reminderModel = $this->model('reminder');
            $reminder = $reminderModel->get_reminder_by_id($reminderId);

            if ($reminder) {
                // Render update form
                $this->view('reminders/update', ['reminder' => $reminder]);
            } else {
                // Handle error - reminder not found
                echo "Reminder not found.";
            }
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Process update form submission
            $reminderId = $_POST['id'];
            $newReminderText = trim($_POST['reminders']);

            // Example validation (add more as needed)
            if (empty($newReminderText)) {
                echo "Reminder text is required.";
                exit;
            }

            $reminderModel = $this->model('reminder');
            $success = $reminderModel->update_reminders($reminderId, $newReminderText);

            if ($success) {
                // Redirect after successful update
                header("Location: /reminders/index");
                exit;
            } else {
                echo "Failed to update reminder. Please try again.";
            }
        } else {
            // Invalid request method or missing ID
            echo "Invalid request.";
        }
    }

    public function delete() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
            $reminderId = $_POST['id'];

            $reminderModel = $this->model('reminder');
            $success = $reminderModel->delete_reminder($reminderId);

            if ($success) {
                // Redirect or display success message
                header("Location: /reminders/index");
                exit;
            } else {
                echo "Failed to delete reminder. Please try again.";
            }
        } else {
            // Invalid request method or missing ID
            echo "Invalid request.";
        }
    }
}

?>
