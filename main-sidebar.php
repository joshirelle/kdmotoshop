<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php if(isset($_SESSION["login_id"])){ echo $_SESSION["profile_image"];}else{ echo "dist/img/user.png";} ?>" class="img-circle" alt="User Image" />
      </div>
      <div class="pull-left info">
        <h5><?php echo $_SESSION["name"] ?? "Name not found"; ?></h5>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search..."/>
        <span class="input-group-btn">
          <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <li>
        <a href="index.php">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
        </a>
      </li>
      <li>
        <a href="product.php">
          <i class="fa fa-motorcycle"></i> <span>Products</span></i>
          <?php
            if(!empty($prodRowCount)) { 
              foreach($prodRowCount as $row) {
            ?>
              <small class="label pull-right bg-blue"><?php echo $row["total"]; ?></small>
              <?php
              }
            }
            ?>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-wrench"></i>
          <span>Maintenance</span>
          <!-- <span class="label label-primary pull-right">2</span> -->
        </a>
        <ul class="treeview-menu">
        <li><a href="category.php">
          <i class="fa fa-list-alt"></i> <span>Categories</span>
          <?php
            if(!empty($catRowCount)) { 
              foreach($catRowCount as $row) {
            ?>
              <small class="label pull-right bg-blue"><?php echo $row["total"]; ?></small>
              <?php
              }
            }
            ?>
            </a>
          </li>
        </ul>
        <ul class="treeview-menu">
          <li>  
            <a href="brand.php">
              <i class="fa fa-list-alt"></i> <span>Brands</span>
              <?php
                if(!empty($brandRowCount)) { 
                  foreach($brandRowCount as $row) {
                ?>
                  <small class="label pull-right bg-blue"><?php echo $row["total"]; ?></small>
                  <?php
                  }
                }
                ?>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>