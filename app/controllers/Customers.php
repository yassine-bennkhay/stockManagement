<?php
class Customers extends Controller
{
  public function __construct()
  {
    if (!isLoggedIn()) {
      redirect('users/login');
    }
    $this->clientModel = $this->model('Client');
  }
  public function customers()
  {
    //get Custommer
    $clients = $this->clientModel->getClient();
    $data = [
      'title' => 'Customers',
      'table' => 'Customers Table',
      'clients' => $clients,
    ];
    $this->view('pages/customers', $data);
  }


  public function addCustomer()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      //Sanitize Customer Array=remove any illegal character

      $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        'name' => trim($_POST['name']),
        'phone' => trim($_POST['phone']),
        'address' => trim($_POST['address']),
        'id'=>trim($_SESSION['user_id']),
        //errors variables
        'name_err' => '',
        'phone_err' => '',
        'address_err' => ''
      ];

      //Validate name
      if (empty($data['name'])) {
        $data['name_err'] = 'Please enter name';
      }
      //Validate phone
      if (empty($data['phone'])) {
        $data['phone_err'] = 'Please enter phone number';
      }
      //Validate address
      if (empty($data['address'])) {
        $data['address_err'] = 'Please enter address';
      }
      //Make sure there are no errors

      if (empty($data['name_err']) && empty($data['phone_err']) && empty($data['address_err'])) {
        //Validated
        if ($this->clientModel->addACustomer($data)) {
          flash('customer_message', 'The customer has been added Successfully!');
          redirect('/customers/customers');
        } else {
          die('Something went wrong');
        }
      } else {
        //Load the view with errors
        $this->view('pages/add_customer', $data);
      }
    } else {
      $data = [
        'name' => '',
        'phone' => '',
        'address' => '',
      ];
      $this->view('pages/add_customer', $data);
    }
  }
}
