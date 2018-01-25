<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <a href="data_customer.php">
        <div class="pull-left image">
            <img href="data_customer.php" src="../../dist/img/user2-160x160.png" width="50" class="img-circle" alt="User Image">
        </div>
        </a>
        <div class="pull-left info">
            <p><?php echo $objr_customer["name"];?>  <?php echo $objr_customer["lastname"];?></p><br>
        </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
    </form>
    <ul class="sidebar-menu" data-widget="tree">
        <li>
            <a href="pick_year.php">
                <i class="fa fa-bar-chart"></i> <span>ประวัติการใช้น้ำ</span>
                <span class="pull-right-container"></span>
            </a>
        </li>
    </ul>
</section>
