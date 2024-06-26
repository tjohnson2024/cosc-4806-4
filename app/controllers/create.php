<?php
require_once 'app/models/User.php';

class Create extends Controller {

    public function index() {		
	    $this->view('create/index');
    }

     public function verify() {
         // Check if the request method is POST
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
             $username = $_POST['username'];
             $password = $_POST['password'];

             // Instantiate User model
             $user = $this->model('User');

             // Check if the action is for creating a new user
             if (isset($_POST['action']) && $_POST['action'] == 'create') {
                 // Call the create method for user creation
                 $create_result = $user->create_user($username, $password);

                 // Check if user creation was successful
                 if ($create_result === "User created successfully") {
                     // Redirect to login page with a success message
                     header("Location: /login/index?success=true");
                     exit();
                 } else {
                     // Redirect to login page with an error message
                     header("Location: /login/index?error=true&message=$create_result");
                     exit();
                 }
             }
         }
     }
}
