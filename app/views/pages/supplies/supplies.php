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
                  <th>operations</th>
                </tr>
              </thead>
              <?php foreach($data['supplies']as $supply):?>
              <tbody>
                <tr>
                  <td><?php echo $supply->supply_id?></td>
                  <td><?php echo $supply->date?></td>
                  <td><?php echo $supply->supplier_id?></td>
                  <td><?php echo $supply->name?></td>
                
                  <td class="d-flex justify-content-around">
              <form class="pull-right" action="<?php echo URLROOT; ?>/supplies/deleteSupply/<?php echo $supply->supply_id ?>" method="post">
                <input type="submit" value="Delete" class="btn btn-danger">
              </form>

              <a value="Edit" class="btn btn-primary" href="<?php echo URLROOT; ?>/supplies/editSupply/<?php echo $supply->supply_id ?>">Edit</a>
            </td>
                </tr>
                <tr>
              
              </tbody>
              <?php endforeach;?>
            </table>
          </div>
        </main>

<?php require APPROOT . '/views/inc/footer.php'; ?>