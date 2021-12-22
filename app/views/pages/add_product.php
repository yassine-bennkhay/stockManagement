<link href="<?= URLROOT . '/public/css/bootstrap.min.css' ?>" rel="stylesheet" />
<link href="<?= URLROOT . '/public/css/dashboard.css' ?>" rel="stylesheet" />

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-4 ">
            <div class="col-md-6 mx-auto text-center">
                <h2>Add a Product </h2>
            </div>

            <!--it's going to the method addProduct in the Products Controller class-->
            <form action="<?php echo URLROOT ?>/products/addProduct" method="POST">
                <div class="form-group">
                    <label for="product_name">Name:<sup>*</sup></label>
                    <input type="text" name="product_name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?> " value=<?php echo $data['product_name'] ?>>
                    <span class="invalid-feedback"><?php echo $data['name_err'] ?></span>
                </div>
                <div class="form-group">
                    <label for="buying_price">Buying price:<sup>*</sup></label>
                    <input type="number" name="buying_price" class="form-control form-control-lg <?php echo (!empty($data['buying_price_err'])) ? 'is-invalid' : ''; ?> " value=<?php echo $data['buying_price'] ?>>
                    <span class="invalid-feedback"><?php echo $data['buying_price_err'] ?></span>
                </div>
                <div class="form-group">
                    <label for="selling_price">Selling price:<sup>*</sup></label>
                    <input type="number" name="selling_price" class="form-control form-control-lg <?php echo (!empty($data['selling_price_err'])) ? 'is-invalid' : ''; ?> " value=<?php echo $data['selling_price'] ?>>
                    <span class="invalid-feedback"><?php echo $data['selling_price_err'] ?></span>
                </div>

                <select class="custom-select" name="category_id">
                    <option selected>Select a Category</option>
                    <?php foreach ($data['categories'] as $category) : ?>
                        <option value="<?php echo $category->category_id  ?>"><?php echo $category->category_name ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Add" class="btn btn-success btn-block">
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>