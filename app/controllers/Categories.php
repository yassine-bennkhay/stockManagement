<?php
class Categories extends Controller{

    public function __construct()
    {
        if(!isLoggedIn()){
            redirect('users/login');
        }
        //Load the Supplier Model
        $this->categoryModel=$this->model('Category');
    }
    public function categories(){
        $categories=$this->categoryModel->getCategory();
        $data=[
       
          'categories'=>$categories,
        ];
        $this->view('pages/add_product',$data);
      }
}