<?php
class Orders extends Controller{

    public function __construct()
    {
        if(!isLoggedIn()){
            redirect('users/login');
        }
        $this->orderModel=$this->model('Order');
        $this->clientModel=$this->model('Client');
    }
    public function orders(){
        //get Orders
        $orders=$this->orderModel->getOrder();

    $more = $this->orderModel->getinfo();
    $result = [];
    for ($i = 0; $i < count($more); $i++) {
      $result[$i] = array_merge($orders[$i], $more[$i]);
    }
        
        $data=[
          'title'=>'Orders',
          'table'=>'Orders Table',
      'orders' => $result,
        
        ];
        $this->view('pages/orders/orders',$data);
  
      }


      public function addOrder()
      {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          //Sanitize Customer Array=remove any illegal character
          $orders=$this->orderModel->getOrder();
          $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          $data = [
            'product_id'=>trim($_POST['product_id']),
            'client_id' => trim($_POST['client_id']),
            'quantity' => trim($_POST['quantity']),
            // 'address' => trim($_POST['address']),
            // 'id' => trim($_SESSION['user_id']),
            //errors variables
          // 'order_id_err' => '',
           'client_err' => '',
       
          ];
    
          //Validate name
          if (empty($data['client_id'])) {
            $data['client_err'] = 'Please enter a Client Id';
          }
          //Validate phone
          // if (empty($data['quantity'])) {
          //   $data['quantity_err'] = 'Please enter a product quantity';
          // }
          
         
          //Make sure there are no errors
    
          if (true) {
            //Validated
            if ($this->orderModel->addAnOrder($data)) {
              flash('order_message', 'The order has been added Successfully!');
              redirect('/orders/orders');
            } else {
              die('Something went wrong');
            }
          } else {
            //Load the view with errors
            $this->view('pages/orders/add_order', $data);
          }
        } else {
          $orders=$this->orderModel->getOrder();
          $clients=$this->clientModel->getClient();
      // echo "<pre>";
      // print_r($orders);
      // return;
          $data = [
            'client_id' => '',
            'quantity' => '',
            'product_id'=>'',
            'clients'=>$orders,
           // 'customer'=>$clients

          ];
          $this->view('pages/orders/add_order', $data);
        }
      }


      public function showOrder($id)
      {
       
          $orders=$this->orderModel->getOrder();
          $more = $this->orderModel->getinfo();
         
          $result = [];
       
            $result = array_merge($orders[0], $more[0]);
       
//           echo"<pre>";
//           print_r($result);
// return;
          $data = [
            // 'order_id'=>$id,
           'orders'=>$result,
          
          ];
          $this->view('pages/orders/show_order', $data);
        
      }

}