<?php require APPROOT.'/views/inc/header.php';?>
<?php require APPROOT.'/views/inc/aside.php';?>
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
           
          </div>

          <h2 class="d-flex justify-content-between"><?=$data['table']?> 

          <form action="<?php echo URLROOT; ?>/categories/searchCategory" method="get">
      <div class="input-group">
        <input type="search" name="category_id" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
        <button type="submit" name="search" class="btn btn-outline-primary">search</button>
      </div>
    </form>
          <a href="<?php echo URLROOT; ?>/supplies/addSupply" class="btn btn-primary pull-right float-right">
        <i class="fa fa-pencil"></i> Add a Supply
      </a>
        </h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>date</th>
                  <th>supplier Id</th>
                  <th>supplier name</th>
                  <th>Product name</th>
                  <th>quantity</th>
                </tr>
              </thead>
              <?php foreach($data['supplies']as $supply):?>
              <tbody>
                <tr>
                  <td><?php echo $supply['supply_id']?></td>
                  <td><?php echo $supply['date']?></td>
                  <td><?php echo $supply['supplier_id']?></td>
                  <td><?php echo $supply['name']?></td>
                  <td><?php echo $supply['product_name']?></td>
                  <td><?php echo $supply['quantity']?></td>
                
                  <!-- <td class="d-flex justify-content-around">
              <form class="pull-right" action="<?php echo URLROOT; ?>/supplies/deleteSupply/<?php echo $supply->supply_id ?>" method="post">
                <input type="submit" value="Delete" class="btn btn-danger">
              </form>

              <a value="Edit" class="btn btn-primary" href="<?php echo URLROOT; ?>/supplies/editSupply/<?php echo $supply->supply_id ?>">Edit</a>
            </td> -->
                </tr>
                <tr>
              
              </tbody>
              <?php endforeach;?>
            </table>
          </div>
        </main>

<?php require APPROOT . '/views/inc/footer.php'; ?>