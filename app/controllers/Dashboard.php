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
    $count = $this->dashboardModel->tableCount();
    $data = [
      'title' => 'Dashboard',
      'count' => $count,
    ];

    $this->view('pages/dashboard', $data);
  }
 
}
