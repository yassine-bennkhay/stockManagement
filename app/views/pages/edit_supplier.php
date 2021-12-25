<link href="<?= URLROOT . '/public/css/bootstrap.min.css' ?>" rel="stylesheet" />
<link href="<?= URLROOT . '/public/css/dashboard.css' ?>" rel="stylesheet" />

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-4 ">
            <div class="col-md-6 mx-auto text-center">
                <h2>edit a Supplier </h2>
            </div>

            <!--it's going to the method editSupplier in the Supplier Controller class-->
            <form action="<?php echo URLROOT ?>/suppliers/editSupplier/<?php echo $data['supplier_id'] ?>" method="POST">
                <div class="form-group">
                    <label for="name">Name:<sup>*</sup></label>
                    <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?> " value=<?php echo $data['name'] ?>>
                    <span class="invalid-feedback"><?php echo $data['name_err'] ?></span>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:<sup>*</sup></label>
                    <input type="number" name="phone" class="form-control form-control-lg <?php echo (!empty($data['phone_err'])) ? 'is-invalid' : ''; ?> " value=<?php echo $data['phone'] ?>>
                    <span class="invalid-feedback"><?php echo $data['phone_err'] ?></span>
                </div>
                <div class="form-group">
                    <label for="address">Address:<sup>*</sup></label>
                    <input type="text" name="address" class="form-control form-control-lg <?php echo (!empty($data['address_err'])) ? 'is-invalid' : ''; ?> " value=<?php echo $data['address'] ?>>
                    <span class="invalid-feedback"><?php echo $data['address_err'] ?></span>
                </div>
                
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Edit" class="btn btn-success btn-block">
                    </div>
   
                </div>
            </form>
        </div>
    </div>
</div>