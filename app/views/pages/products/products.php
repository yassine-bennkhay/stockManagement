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
    <?php echo flash('product_message') ?>
    <?php echo flash('delete_product_message') ?>

  </div>

  <h2 class="d-flex justify-content-between"><?= $data['table'] ?>
  <form action="<?php echo URLROOT; ?>/products/searchProduct" method="get">
      <div class="input-group">
        <input type="search" name="product_id" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
        <button type="submit" name="search" class="btn btn-outline-primary">search</button>
      </div>
    </form>
    <a href="<?php echo URLROOT; ?>/products/addProduct" class="btn btn-primary pull-right float-right">
    
      <i class="fa fa-pencil"></i> Add a Product
    </a>
  </h2>

  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>Id</th>
          <th>name</th>
          <th>Buying price</th>
          <th>Selling price</th>
          <th>Category Id</th>

          <th>Image</th>
          <!-- <th>Admin name</th> -->
          <th class="text-center">Operations</th>
        </tr>
      </thead>
      <?php foreach ($data['products'] as $product) : ?>
        <?php if (!isset($product->product_id)) {

          flash('error', 'there is no product associated with this id', 'alert alert-danger');
          flash('error');
          return;
        } ?>
        <tbody>
          <tr>
            <td><?php echo $product->product_id ?></td>
            <td><?php echo $product->product_name ?></td>
            <td><?php echo $product->buying_price . '$' ?></td>
            <td><?php echo $product->selling_price . '$' ?></td>
            <td><?php echo $product->category_id ?></td>

            <td><img style="width: 50px;" src="<?= PUBLICROOT . '/img/' . $product->image_url ?>" alt="<?php echo $product->image_url ?>"></td>
            <!-- <td><?php echo $product->admin_id ?></td> -->
            <td class="d-flex justify-content-around">
              <form class="pull-right" action="<?php echo URLROOT; ?>/products/deleteProduct/<?php echo $product->product_id ?>" method="post">
                <input type="submit" value="Delete" class="btn btn-danger">
              </form>

              <a value="Edit" class="btn btn-primary" href="<?php echo URLROOT; ?>/products/editProduct/<?php echo $product->product_id ?>">Edit</a>
            </td>

          </tr>
          <tr>

        </tbody>
      <?php endforeach; ?>
    </table>
  </div>
</main>

<?php require APPROOT . '/views/inc/footer.php'; ?>