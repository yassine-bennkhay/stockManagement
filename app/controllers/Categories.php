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
        $this->view('pages/categories/categories',$data);
      }

  public function searchCategory()
  {
    if (isset($_GET['category_id'])) {
      $aCategory = [];
      $aCategory[0] = $this->categoryModel->getCategoryById($_GET['category_id']);
      // echo "<pre>";
      // print_r($aCategory);
      // return;

      $data = [
        'title' => 'Categories',
        'table' => 'Categories Table',
        'categories' => $aCategory,
      ];

      $this->view('pages/categories/categories', $data);
    }
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
            $this->view('pages/categories/add_category', $data);
          }
        } else {
          $data = [
            'category_name' => '',
            'category_name_err' => '',
          ];
          $this->view('pages/categories/add_category', $data);
        }
      }


      public function editCategory($id)
      {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          //Sanitize Customer Array=remove any illegal character
    
          $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          $data = [
            'category_id'=>$id,
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
            if ($this->categoryModel->editACategory($data)) {
              flash('category_edit_message', 'The category has been edited Successfully!');
              redirect('/categories/categories');
            } else {
              die('Something went wrong');
            }
          } else {
            //Load the view with errors
            $this->view('pages/categories/edit_category', $data);
          }
        } else {
          $category = $this->categoryModel->getCategoryById($id);
          $data = [
            'category'=>$category,
            'category_id' => $id,
            'category_name' => $category->category_name,
           
          ];
          $this->view('pages/categories/edit_category', $data);
        }
      }

      public function deleteCategory($id){
        if($_SERVER['REQUEST_METHOD']=='POST'){
        if($this->categoryModel->deleteACategory($id)){
          flash('delete_category_message','The Category has been removed successfully!');
          redirect('/categories/categories');
        }else{
          die('Something went wrong!');
        }
        }else{
          redirect('/categories/categories');
        }
          }
}