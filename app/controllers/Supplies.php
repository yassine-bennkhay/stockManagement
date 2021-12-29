<?php
class Supplies extends Controller{

    public function __construct()
    {
        if(!isLoggedIn()){
            redirect('users/login');
        }
        //Load the Supplier Model
        $this->supplyModel=$this->model('Supply');
        $this->supplierModel=$this->model('Supplier');
    }
    public function supplies(){
        $supplies=$this->supplyModel->getSupply();
        $data=[
          'title'=>'Supplies',
          'table'=>'Supplies Table',
          'supplies'=>$supplies,
        ];
        $this->view('pages/supplies/supplies',$data);
      }

      public function addSupply()
      {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          //Sanitize Customer Array=remove any illegal character
          $suppliers=$this->supplierModel->getSupplier();
          $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          $data = [
            'supplier_id'=>trim($_POST['supplier_id']),
            'product_id' => trim($_POST['product_id']),
            'quantity' => trim($_POST['quantity']),
            // 'address' => trim($_POST['address']),
            // 'id' => trim($_SESSION['user_id']),
            //errors variables
           'product_id_err' => '',
           'quantity_err' => '',
       
          ];
    
          //Validate name
          if (empty($data['product_id'])) {
            $data['product_id_err'] = 'Please enter a Product Id';
          }
          //Validate phone
          if (empty($data['quantity'])) {
            $data['quantity_err'] = 'Please enter a product quantity';
          }
          
         
          //Make sure there are no errors
    
          if (true) {
            //Validated
            if ($this->supplyModel->addASupply($data)) {
              flash('customer_message', 'The supply has been added Successfully!');
              redirect('/supplies/supplies');
            } else {
              die('Something went wrong');
            }
          } else {
            //Load the view with errors
            $this->view('pages/supplies/add_supply', $data);
          }
        } else {
          $suppliers=$this->supplierModel->getSupplier();
          $data = [
            'product_id' => '',
            'quantity' => '',
            'address' => '',
            'suppliers'=>$suppliers
          ];
          $this->view('pages/supplies/add_supply', $data);
        }
      }
}