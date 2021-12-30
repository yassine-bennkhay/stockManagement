
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/aside.php'; ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
          <div
            class="
              d-flex
              justify-content-between
              flex-wrap flex-md-nowrap
              align-items-center
              pt-3
              pb-2
              mb-3
              border-bottom
            "
          >
            <h1 class="h2"><?=$data['title']?></h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">
                  Share
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary">
                  Export
                </button>
              </div>
              <button
                type="button"
                class="btn btn-sm btn-outline-secondary dropdown-toggle"
              >
                <span data-feather="calendar"></span>
                This week
              </button>
            </div>
          </div>
          <h2><?=$data['table']?> 
          <a href="<?php echo URLROOT; ?>/orders/addOrder" class="btn btn-primary pull-right float-right">
        <i class="fa fa-pencil"></i> Add an Order
      </a>
        </h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>client Id</th>
                  <th>date</th>
                  <th>Client name</th>
                  <th>Product name</th>
                  <th>Quantity</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
            
              <?php foreach($data['orders']as $order):?>
              <tbody>
                <tr>
                  <td><?php echo $order['order_id']?></td>
                  <td><?php echo $order['client_id']?></td>
                  <td><?php echo $order['date']?></td>
                  <td><?php echo $order['name']?></td>
                  <td><?php echo $order['product_name']?></td>
                  <td><?php echo $order['quantity']?></td>
                  <td class="d-flex justify-content-around">
             

              <a  class="btn btn-primary" href="<?php echo URLROOT; ?>/orders/showOrder/<?=$order['order_id'] ?>">Print</a>
            </td>
                </tr>
                
              
              </tbody>
              <?php endforeach;?>
              
          
            </table>
          </div>
        </main>

<?php require APPROOT . '/views/inc/footer.php'; ?>