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
    $this->view('pages/customers/customers', $data);
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
        $this->view('pages/customers/add_customer', $data);
      }
    } else {
      $clients=$this->clientModel->getClient();
      $data = [
        'name' => '',
        'phone' => '',
        'address' => '',
        'clients'=>$clients,
      ];
      $this->view('pages/customers/add_customer', $data);
    }
  }



  public function editCustomer($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      //Sanitize Customer Array=remove any illegal character

      $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        'client_id'=>$id,
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
        if ($this->clientModel->editACustomer($data)) {
          flash('customer_message', 'The customer has been edited Successfully!');
          redirect('/customers/customers');
        } else {
          die('Something went wrong');
        }
      } else {
        //Load the view with errors
        $this->view('pages/edit_customer', $data);
      }
    } else {
      $customer=$this->clientModel->getCustomerById($id);
      $data = [
        'client_id'=>$id,
        'name' =>  $customer->name,
        'phone' =>  $customer->phone,
        'address' =>  $customer->address,
      ];
      $this->view('pages/customers/edit_customer', $data);
    }
  }


  public function deleteCustomer($id){
    if($_SERVER['REQUEST_METHOD']=='POST'){
    if($this->clientModel->deleteACustomer($id)){
      flash('delete_message','Customer has been removed successfully!');
      redirect('/customers/customers');
    }else{
      die('Something went wrong!');
    }
    }else{
      redirect('/customers/customers');
    }
      }
}
