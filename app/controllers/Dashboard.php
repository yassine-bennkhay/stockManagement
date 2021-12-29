<?php
class Dashboard extends Controller
{
  public function __construct()
  {
    if (!isLoggedIn()) {
      redirect('users/login');
    }

    $this->dashboardModel = $this->model('Dashboards');
  }
  public function index()
  {
    $nbrProducts = $this->dashboardModel->productsCount();
    $nbrCustomers=$this->dashboardModel->customersCount();
    $nbrSuppliers=$this->dashboardModel->suppliersCount();
   $nbrOrders=$this->dashboardModel->ordersCount();
  
    $data = [
      'title' => 'Dashboard',
      'nbrProducts' => $nbrProducts,
      'nbrCustomers'=>$nbrCustomers,
      'nbrSuppliers'=>$nbrSuppliers,
      'nbrOrders'=>$nbrOrders,
    ];

    $this->view('pages/dashboard', $data);
  }
 
}
