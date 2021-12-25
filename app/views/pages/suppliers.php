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
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <button type="button" class="btn btn-sm btn-outline-secondary">
          Share
        </button>
        <button type="button" class="btn btn-sm btn-outline-secondary">
          Export
        </button>
      </div>
      <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
        <span data-feather="calendar"></span>
        This week
      </button>
    </div>
  </div>

  <h2><?= $data['table'] ?>
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
          <th>operations</th>
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
                <a href="<?php echo URLROOT; ?>/suppliers/deleteSupplier/<?php echo $supplier->supplier_id ?>"><img class="wt-25" src="<?php echo PUBLICROOT ?>./img/icons/trash-alt-solid.svg" alt="" /></a>
              </form>
              <a href="<?php echo URLROOT; ?>/suppliers/editSupplier/<?php echo $supplier->supplier_id ?>"><img class="wt-25" src="<?php echo PUBLICROOT ?>./img/icons/edit-solid.svg" alt="" /></a>
            </td>
          </tr>
          <tr>

        </tbody>
      <?php endforeach; ?>
    </table>
  </div>
</main>

<?php require APPROOT . '/views/inc/footer.php'; ?>