<?php
class Shop extends Controller{

    public function __construct()
    {
      
        //Load the Product Model
     $this->productModel=$this->model('Product');
    }

    public function shop(){

        //get Products
        $products=$this->productModel->getProduct();
      //   echo "<pre>";
      //  print_r($products); 
      //   return;
        $data=[
          
         'products'=>$products,
        ];
        $this->view('shop/shop',$data);
      }

}
?>