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
       
            <?php flash('category_message');?>
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
          <!-- Go to categories controller and addCategory method-->
          <a href="<?php echo URLROOT; ?>/categories/addCategory" class="btn btn-primary pull-right float-right">
        <i class="fa fa-pencil"></i> Add a Category
      </a>
        </h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>name</th>
                  <th class="text-center">Operations</th>
                </tr>
              </thead>
              <?php foreach($data['categories']as $category):?>
              <tbody>
                <tr>
                  <td><?php echo $category->category_id?></td>
                  <td><?php echo $category->category_name?></td>
                  <td class="d-flex justify-content-around">
                    <a href="#"><img class="wt-25" src="<?php echo PUBLICROOT?>./img/icons/trash-alt-solid.svg" alt=""/></a>
                    <a href="#"><img class="wt-25" src="<?php echo PUBLICROOT?>./img/icons/edit-solid.svg" alt=""/></a>
                  </td>
                </tr>
                <tr>
              
              </tbody>
              <?php endforeach;?>
            </table>
          </div>
        </main>

<?php require APPROOT . '/views/inc/footer.php'; ?>