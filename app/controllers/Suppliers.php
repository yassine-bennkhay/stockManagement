<?php
class Suppliers extends Controller{

    public function __construct()
    {
        if(!isLoggedIn()){
            redirect('users/login');
        }
        //Load the Supplier Model
        $this->supplierModel=$this->model('Supplier');
    }
    public function suppliers(){
        $suppliers=$this->supplierModel->getSupplier();
        $data=[
          'title'=>'Suppliers',
          'table'=>'Supplieres Table',
          'suppliers'=>$suppliers,
        ];
        $this->view('pages/suppliers',$data);
      }


      public function addSupplier()
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
            if ($this->supplierModel->addASupplier($data)) {
              flash('customer_message', 'The supplier has been added Successfully!');
              redirect('/suppliers/suppliers');
            } else {
              die('Something went wrong');
            }
          } else {
            //Load the view with errors
            $this->view('pages/add_supplier', $data);
          }
        } else {
          $data = [
            'name' => '',
            'phone' => '',
            'address' => '',
          ];
          $this->view('pages/add_supplier', $data);
        }
      }
}