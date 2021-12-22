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
            'title' => 'Categories',
            'table' => 'Categories Table',
          'categories'=>$categories,
        ];
       // $this->view('pages/add_product',$data);
        $this->view('pages/categories',$data);
      }



      public function addCategory()
      {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          //Sanitize Customer Array=remove any illegal character
    
          $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          $data = [
            'category_name' => trim($_POST['category_name']),
    
            //errors variables
            'category_name_err' => '',
          
          ];
    
          //Validate name
          if (empty($data['category_name'])) {
            $data['category_name_err'] = 'Please enter a name';
          }
          
          //Make sure there are no errors
    
          if (empty($data['category_name_err']) ) {
            //Validated
            if ($this->categoryModel->addACategory($data)) {
              flash('category_message', 'The category has been added Successfully!');
              redirect('/categories/categories');
            } else {
              die('Something went wrong');
            }
          } else {
            //Load the view with errors
            $this->view('pages/add_category', $data);
          }
        } else {
          $data = [
            'category_name' => '',
            'category_name_err' => '',
          ];
          $this->view('pages/add_category', $data);
        }
      }
}