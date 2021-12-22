<?php

class Users extends Controller
{

    public function __construct()
    {
        //Load the model, check the user.php file
        $this->userModel = $this->model('User');
    }
    public function register()
    {
        //check for Post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Sanitize user input, which is removing ilegal character from the inputs
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            //Process Form

            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''

            ];
            //Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } else {
                //check email
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email is already taken';
                }
            }
            //Validate Name
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }
            //Validate password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must me at least 6 characters';
            }
            //Validate confirm password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm password';
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }
            //Make sure errors empty
            if (empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {


                //Hash the Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register User, Call the model to do that!
                if ($this->userModel->register($data)) {
                    flash('register_success', 'You are registered and you can now log in');
                    redirect('users/login');
                } else {
                    die('something went wrong!');
                }
            } else {
                //Load the view with errors
                $this->view('users/register', $data);
            }
        } else {
            //Init Data
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''

            ];
            //Load the view 
            $this->view('users/register', $data);
        }
    }

    public function login()
    {
        //check for Post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Process Form

            //Sanitize user input, which is removing ilegal character from the inputs
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            //Process Form

            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',

            ];
            //Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }
            //Validate password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must me at least 6 characters';
            }


            //Check for user/email
            if ($this->userModel->findUserByEmail($data['email'])) {
                //User found
            } else {
                //user not found
                $data['email_err'] = 'No user found';
            }

            //Make sure errors are empty
            if (empty($data['email_err']) && empty($data['password_err'])) {
                //Check and do logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);


                if ($loggedInUser) {
                    //Create User session
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_err'] = 'Password Incorrect';
                    $this->view('users/login', $data);
                }
            } else {
                //Load the view
                $this->view('users/login', $data);
            }
        } else {
            //Init Data
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];
            //Load the view 
            $this->view('users/login', $data);
        }
    }

    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        redirect('dashboard/index');
    }
    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }

   
}
