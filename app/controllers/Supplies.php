<?php
class Supplies extends Controller{

    public function __construct()
    {
        if(!isLoggedIn()){
            redirect('users/login');
        }
        //Load the Supplier Model
        $this->supplyModel=$this->model('Supply');
    }
    public function supplies(){
        $supplies=$this->supplyModel->getSupply();
        $data=[
          'title'=>'Suppliers',
          'table'=>'Supplieres Table',
          'supplies'=>$supplies,
        ];
        $this->view('pages/supplies',$data);
      }
}