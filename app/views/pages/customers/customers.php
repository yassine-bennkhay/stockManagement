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

  <h2><?= $data['table'] ?>
    <!-- Go to customers controller and addCustomer method-->
    <a href="<?php echo URLROOT; ?>/customers/addCustomer" class="btn btn-primary pull-right float-right">
      <i class="fa fa-pencil"></i> Add a Customer
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
          <th>Operations</th>
        </tr>
      </thead>
      <?php foreach ($data['clients'] as $client) : ?>
        <tbody>
          <tr>
            <td><?php echo $client->client_id ?></td>
            <td><?php echo $client->name ?></td>
            <td><?php echo $client->phone ?></td>
            <td><?php echo $client->address ?></td>
            <td class="d-flex justify-content-around">
              <form class="pull-right" action="<?php echo URLROOT; ?>/customers/deleteCustomer/<?php echo $client->client_id ?>" method="post">
                <input type="submit" value="Delete" class="btn btn-danger">
              </form>

              <a value="Edit" class="btn btn-primary" href="<?php echo URLROOT; ?>/customers/editCustomer/<?php echo $client->client_id ?>">Edit</a>
            </td>
   
          </tr>
          <tr>

        </tbody>
      <?php endforeach; ?>
    </table>
  </div>
</main>

<?php require APPROOT . '/views/inc/footer.php'; ?>