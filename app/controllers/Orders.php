<?php
class Orders extends Controller{

    public function __construct()
    {
        if(!isLoggedIn()){
            redirect('users/login');
        }
        $this->orderModel=$this->model('Order');
    }
    public function orders(){
        //get Orders
        $orders=$this->orderModel->getOrder();
        $data=[
          'title'=>'Orders',
          'table'=>'Orders Table',
          'orders'=>$orders,
        
        ];
        $this->view('pages/orders/orders',$data);
  
      }

}