<?php

class Products extends Controller
{

  public function __construct()
  {
    if (!isLoggedIn()) {
      redirect('users/login');
    }
    //Load the Product Model
    $this->productModel = $this->model('Product');
    $this->categoryModel=$this->model('Category');
  }

  public function products()
  {

    //get Products
    $products = $this->productModel->getProduct();
    $data = [
      'title' => 'Products',
      'table' => 'Products Table',
      'products' => $products,
    ];
    $this->view('pages/products', $data);
  }


  public function addProduct()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

//Upload the image
$target_dir = PUBLICROOT.'/img/products/';
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$isUploaded=move_uploaded_file($_FILES["fileToUpload"]["name"], $target_file);

      //Sanitize Customer Array=remove any illegal character

      $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $categories = $this->categoryModel->getCategory();
      $data = [
      'image_url'=>trim($_POST[$target_file]),
        'product_name' => trim($_POST['product_name']),
        'buying_price' => trim($_POST['buying_price']),
        'selling_price' => trim($_POST['selling_price']),
        'category_id' =>trim($_POST['category_id']),
        'admin_id' => trim($_SESSION['user_id']),
        //errors variables
        'image_err'=>'',
        'name_err' => '',
        'buying_price_err' => '',
        'selling_price_err' => '',
        'category_id_err' => '',

      ];

      //Validate name
      if (empty($data['product_name'])) {
        $data['name_err'] = 'Please enter name';
      }
      //Validate phone
      if (empty($data['buying_price'])) {
        $data['buying_price_err'] = 'Please enter a buying price';
      }
      //Validate address
      if (empty($data['selling_price'])) {
        $data['selling_price_err'] = 'Please enter a selling price';
      }
      if (empty($data['category_id'])) {
        $data['category_id_err'] = 'Please choose a category';
      }
      if (empty($isUploaded==true)) {
        flash('product_message', $isUploaded);
      }
      
   

      //Make sure there are no errors

      if (empty($data['buying_price_err']) && empty($data['selling_price_err']) && empty($data['name_err']) && empty($data['category_id_err'])) {
        //Validated
        if ($this->productModel->addAProduct($data)) {
          flash('product_message', $isUploaded);
          redirect('/products/products');
        } else {
          die('Something went wrong');
        }
      } else {
        //Load the view with errors
        $this->view('pages/add_product', $data);
      }
    } else {
      $categories = $this->categoryModel->getCategory();
      $data = [
      'image_url'=>'',
        'product_name' => '',
        'buying_price' => '',
        'selling_price' => '',
        'category_id' => '',
        'quantity' => '',
        'categories' => $categories
      ];
      $this->view('pages/add_product', $data);
    }
  }


  public function editProduct($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      //Sanitize Customer Array=remove any illegal character

      $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $categories = $this->categoryModel->getCategory();
      $products=$this->productModel->getProductById($id);
      $data = [
        'product_id'=>$id,
        'product_name' => trim($_POST['product_name']),
        'buying_price' => trim($_POST['buying_price']),
        'selling_price' => trim($_POST['selling_price']),
        'category_id' =>$products->category_id,
        'id' => trim($_SESSION['user_id']),
        //errors variables
        'name_err' => '',
        'buying_price_err' => '',
        'selling_price_err' => '',
        'category_id_err' => '',

      ];

      //Validate name
      if (empty($data['product_name'])) {
        $data['name_err'] = 'Please enter name';
      }
      //Validate phone
      if (empty($data['buying_price'])) {
        $data['buying_price_err'] = 'Please enter a buying price';
      }
      //Validate address
      if (empty($data['selling_price'])) {
        $data['selling_price_err'] = 'Please enter a selling price';
      }
      if (empty($data['category_id'])) {
        $data['category_id_err'] = 'Please choose a category';
      }

      //Make sure there are no errors

      if (empty($data['buying_price_err']) && empty($data['selling_price_err']) && empty($data['name_err']) && empty($data['category_id_err'])) {
        //Validated
        if ($this->productModel->editAProduct($data)) {
          flash('product_edit_message', 'The product has been added Successfully!');
          redirect('/products/products');
        } else {
          die('Something went wrong');
        }
      } else {
        //Load the view with errors
        $this->view('pages/edit_product', $data);
      }
    } else {
      $categories = $this->categoryModel->getCategory();
      $products=$this->productModel->getProductById($id);
      $data = [
        'product_id'=>$id,
        'product_name' => $products->product_name,
        'buying_price' => $products->buying_price,
        'selling_price' => $products->selling_price,
        'category_id' =>$products->category_id,
        //'quantity' => '',
        'categories' => $categories
      ];
      $this->view('pages/edit_product', $data);
    }
  }


  public function deleteProduct($id){
    if($_SERVER['REQUEST_METHOD']=='POST'){
    if($this->productModel->deleteAProduct($id)){
      flash('delete_product_message','Product has been removed successfully!');
      redirect('/products/products');
    }else{
      die('Something went wrong!');
    }
    }else{
      redirect('/products/products');
    }
      }
}
