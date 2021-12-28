<link href="<?= URLROOT . '/public/css/bootstrap.min.css' ?>" rel="stylesheet" />
<link href="<?= URLROOT . '/public/css/dashboard.css' ?>" rel="stylesheet" />

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-4 ">
            <div class="col-md-6 mx-auto text-center">
                <h2>Edit a Category </h2>
            </div>

            <!--it's going to the method addCustomer in the Customers Controller class-->
            <form action="<?php echo URLROOT ?>/categories/editCategory/<?php echo $data['category_id'] ?>" method="POST">
                <div class="form-group">
                    <label for="category_name">Name:<sup>*</sup></label>
                    <input type="text" name="category_name" class="form-control form-control-lg <?php echo (!empty($data['category_name_err'])) ? 'is-invalid' : ''; ?> " value=<?php echo $data['category_name'] ?>>
                    <span class="invalid-feedback"><?php echo $data['category_name_err'] ?></span>
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