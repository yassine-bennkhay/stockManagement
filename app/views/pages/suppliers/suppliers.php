<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/aside.php'; ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <div class="
              d-flex
              justify-content-between
              flex-wrap flex-md-nowrap
              align-items-center
              pt-3
              pb-2
              mb-3
              border-bottom
            ">
    <h1 class="h2"><?= $data['title'] ?></h1>
    <?php flash('customer_message'); ?>
    <?php flash('delete_message'); ?>
    
  </div>

  <h2 class="d-flex justify-content-between"><?= $data['table'] ?>

  <form action="<?php echo URLROOT; ?>/suppliers/searchSupplier" method="get">
      <div class="input-group">
        <input type="search" name="category_id" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
        <button type="submit" name="search" class="btn btn-outline-primary">search</button>
      </div>
    </form>
    <a href="<?php echo URLROOT; ?>/suppliers/addSupplier" class="btn btn-primary pull-right float-right">
      <i class="fa fa-pencil"></i> Add a Supplier
    </a>
  </h2>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>Id</th>
          <th>name</th>
          <th>phone</th>
          <th>address</th>
          <th class="text-center">operations</th>
        </tr>
      </thead>
      <?php foreach ($data['suppliers'] as $supplier) : ?>
        <tbody>
          <tr>
            <td><?php echo $supplier->supplier_id ?></td>
            <td><?php echo $supplier->name ?></td>
            <td><?php echo $supplier->phone ?></td>
            <td><?php echo $supplier->address ?></td>

            <td class="d-flex justify-content-around">
              <form class="pull-right" action="<?php echo URLROOT; ?>/suppliers/deleteSupplier/<?php echo $supplier->supplier_id ?>" method="post">
                <input type="submit" value="Delete" class="btn btn-danger">
              </form>

              <a value="Edit" class="btn btn-primary" href="<?php echo URLROOT; ?>/suppliers/editSupplier/<?php echo $supplier->supplier_id ?>">Edit</a>
            </td>
          </tr>
          <tr>

        </tbody>
      <?php endforeach; ?>
    </table>
  </div>
</main>

<?php require APPROOT . '/views/inc/footer.php'; ?>