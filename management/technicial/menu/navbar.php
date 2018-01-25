<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="../../dist/img/user2-160x160.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p><?php echo $obj_employee["name"];?>  <?php echo $obj_employee["lastname"];?></p><br>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
    </form>

    <ul class="sidebar-menu" data-widget="tree">
        <!-- ระบบจัดการอุปกรณ์  -->
        <li class="treeview">
            <a href="#">
                <i class="fa fa-wrench"></i> <span>ระบบจัดการอุปกรณ์</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="manage_tool/manage_tool.php"><i class="fa fa-circle-o"></i>จัดการอุปกรณ์</a></li> <li>
            </ul>
        </li>

        <!-- ติดตั้งน้ำประปา  -->
        <li class="treeview">
            <a href="#">
                <i class="fa fa-gears"></i> <span>ระบบขอติดตั้งน้ำประปา</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="install_water/list_customer.php"><i class="fa fa-circle-o"></i>สถานะติดตั้งน้ำประปา</a></li>
            </ul>
        </li>
    </ul>

    <form action="#" method="get" class="sidebar-form">
    </form>

    <ul class="sidebar-menu" data-widget="tree">
        <!-- ข้อมูลสถิติ  -->
        <li class="treeview">
            <a href="#">
                <i class="fa fa-bar-chart"></i> <span>ข้อมูลสถิติ</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="manage_statistic/statistic_use_water.php"><i class="fa fa-circle-o"></i>สถิติใช้น้ำ</a></li>
            </ul>
        </li>
    </ul>

</section>
