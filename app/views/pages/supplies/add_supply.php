<link href="<?= URLROOT . '/public/css/bootstrap.min.css' ?>" rel="stylesheet" />
<link href="<?= URLROOT . '/public/css/dashboard.css' ?>" rel="stylesheet" />

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-4 ">
            <div class="col-md-6 mx-auto text-center">
                <h2>Add a Supply </h2>
            </div>

            <!--it's going to the method addSupplier in the Supplier Controller class-->
            <form action="<?php echo URLROOT ?>/supplies/addSupply" method="POST">
            <select class="custom-select" name="supplier_id">
                    <option selected>Select a Supplier by his ID</option>
                    <?php foreach ($data['suppliers'] as $supplier) : ?>
                        <option value="<?php echo $supplier->supplier_id ?>"><?php echo $supplier->supplier_id ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="form-group">
                    <label for="phone">Quantity:<sup>*</sup></label>
                    <input type="number" name="quantity" class="form-control form-control-lg <?php echo (!empty($data['quantity_err'])) ? 'is-invalid' : ''; ?> " value=<?php echo $data['quantity'] ?>>
                    <span class="invalid-feedback"><?php echo $data['quantity_err'] ?></span>
                </div>
                <div class="form-group">
                    <label for="product_id">Product Id:<sup>*</sup></label>
                    <input type="text" name="product_id" class="form-control form-control-lg <?php echo (!empty($data['product_id_err'])) ? 'is-invalid' : ''; ?> " value=<?php echo $data['product_id'] ?>>
                    <span class="invalid-feedback"><?php echo $data['product_id_err'] ?></span>
                </div>
             
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Add" class="btn btn-success btn-block">
                    </div>
   
                </div>
            </form>
        </div>
    </div>
</div>