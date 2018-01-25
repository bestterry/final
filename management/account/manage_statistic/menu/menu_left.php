<div class="col-md-3">
    <div class="box box-solid">
        <div class="box-header with-border">
            <font size="3"><B>เมนูจัดการอุปกรณ์</B></font>
        </div>
        <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
                <!-- ถอนอุปกรณ์ -->
                <li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-minus-square"></i> ข้อมูลสถิติเเต่ล่ะหมู่บ้าน </a></li>
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <form action="manage_tool_withdraw.php" method="post" target="_blank">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <font size="3"><B><i class="fa fa-minus-square"></i> ข้อมูลสถิติเเต่ล่ะหมู่บ้าน </B></font>
                                </div>
                                <div class="modal-body col-md-12 table-responsive mailbox-messages">

                                    <div class="table-responsive mailbox-messages">
                                        <font size="2" color="red">*กรุณาเลือกรายการที่ต้องการถอน</font>
                                        <table class="table table-hover table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th class="text-center" width="20%">หมู่ที่</th>
                                                <th class="text-center" width="60%">ชื่อหมู่บ้าน</th>
                                                <th class="text-center" width="20%">รายละเอียด</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($objq_village as $village):?>
                                                <tr>
                                                    <td class="text-center" width="20%"><?php echo $village['village_no']?></td>
                                                    <td class="text-center" width="60%"><?php echo $village['name']?></td>
                                                    <td class="text-center" width="20%"><a href="st_month.php?village_no=<?php echo $village["village_no"]?>&month_before=<?php echo $month_before?>&year_before=<?php echo $year_before?>&month_after=<?php echo $month_after?>&year_after=<?php echo $year_after?>" target="_blank"><i class="fa fa-check-circle-o"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach;?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit"  class="btn btn-info pull-left">ตกลง</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- ถอนอุปกรณ์ -->
                <!--เพิ่มจำนวนอุปกรณ์ -->
                <li><a href="#" data-toggle="modal" data-target="#myModal1"><i class="fa fa-plus-square"></i> เพิ่มจำนวนอุปกรณ์</a></li>
                <div class="modal fade" id="myModal1" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <font size="3"><B><i class="fa fa-plus-square"></i> เพิ่มจำนวนอุปกรณ์ </B></font>
                            </div>
                            <div class="modal-body">
                                <table class="table table-hover table-striped table-bordered">
                                    <tbody>
                                    <tr>
                                        <th class="text-center" width="10%">ลำดับ</th>
                                        <th class="text-center" width="20%">รหัสอุปกรณ์</th>
                                        <th class="text-center" width="45%">ชื่ออุปกรณ์</th>
                                        <th class="text-center" width="15%">จำนวนที่มีอยู่</th>
                                        <th class="text-center" width="20%">เพิ่ม</th>
                                        <?php $num=1; foreach ($objq_tool as $tool):?>
                                    <tr>
                                        <td class="text-center" width="10%"><?php  echo $num;?></td>
                                        <td class="text-center" width="20%"><?php echo $tool['description_tool_id']?></td>
                                        <td class="text-center" width="45%"><?php echo $tool['name_tool']?></td>
                                        <td class="text-center" width="15%"><?php echo $tool['num_tool']?></td>
                                        <td class="text-center" ><a target="_blank" href="manage_tool_add_tool.php?description_tool_id=<?php echo $tool['description_tool_id']?>" class="btn btn-info"><span class="glyphicon glyphicon-plus" ></span></a></td>
                                    </tr>
                                    <?php $num+=1; endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--เพิ่มจำนวนอุปกรณ์ -->
                <!-- เเก้ไขอุปกรณ์  -->
                <li><a href="#" data-toggle="modal" data-target="#myModal2"><i class="fa fa-cogs"></i> เเก้ไขรายการอุปกรณ์</a></li>
                <div class="modal fade" id="myModal2" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <font size="3"><B><i class="fa fa-cogs"></i> เเก้ไขรายการอุปกรณ์ </B></font>
                            </div>
                            <div class="modal-body">
                                <table class="table table-hover table-striped table-bordered">
                                    <tbody>
                                    <tr>
                                        <th class="text-center" width="10%">ลำดับ</th>
                                        <th class="text-center" width="20%">รหัสอุปกรณ์</th>
                                        <th class="text-center" width="40%">ชื่ออุปกรณ์</th>
                                        <th class="text-center" width="10%">จำนวน</th>
                                        <th class="text-center" width="10%">ราคา(บาท)</th>
                                        <th class="text-center" width="10%">เเก้ไข</th>
                                        <?php $num=1; foreach ($objq_tool as $tool):?>
                                    <tr>
                                        <td class="text-center" width="10%"><?php  echo $num?></td>
                                        <td class="text-center" width="20%"><?php echo $tool['description_tool_id']?></td>
                                        <td class="text-center" width="40%"><?php echo $tool['name_tool']?></td>
                                        <td class="text-center" width="10%"><?php echo $tool['num_tool']?></td>
                                        <td class="text-center" width="10%"><?php echo $tool['price_tool']?></td>
                                        <td class="text-center"><a target="_blank" href="manage_tool_edit_tool.php?ID_Tool=<?php echo $tool['description_tool_id']?>" class="btn btn-info"><span class="glyphicon glyphicon-cog"></span></a></td>
                                    </tr>
                                    <?php $num+=1; endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //เเก้ไขอุปกรณ์  -->
                <!--เพิ่มรายการอุปกรณ์ -->
                <li><a href="#" data-toggle="modal" data-target="#myModal3"><i class="fa fa-filter"></i> เพิ่มรายการอุปกรณ์ </a></li>
                <div class="modal fade" id="myModal3" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <form action="algorithm/insert_tool.php" method="get">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <font size="3"><B><i class="fa fa-filter"></i> เพิ่มรายการอุปกรณ์ </B></font>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <?php

                                        $sql_max_Num = "SELECT MAX(description_tool_id) FROM description_tool";
                                        $objq_max_Num = mysqli_query($conn, $sql_max_Num);
                                        $objr_max_Num  = mysqli_fetch_array($objq_max_Num);
                                        $objr_max_Num['MAX(description_tool_id)'];
                                        $sql_id = "SELECT * FROM description_tool WHERE description_tool_id = '".$objr_max_Num['MAX(description_tool_id)']."'";
                                        $query = mysqli_query($conn, $sql_id);
                                        $result = mysqli_fetch_array($query);
                                        $str_num =  substr($result['description_tool_id'], 1);
                                        $str_num = (int)$str_num;
                                        $str_num +=1;
                                        $str_num_check = settype($str_num, "integer");
                                        if ($str_num_check ==1){
                                            $str_num_check= "T00".$str_num;
                                        }else if($str_num_check = 2){
                                            $str_num_check= "T0".$str_num;
                                        }else{
                                            $str_num_check= "T".$str_num;
                                        }
                                        ?>
                                        <label for="txttoolid">รหัสอุปกรณ์</label>
                                        <input type="text" name="txttoolid" class="form-control" id="txtuserid" value="<?=$str_num_check?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="txtname_tool">ชื่ออุปกรณ์</label>
                                        <input type="text" name="txtname_tool" class="form-control" id="txtuserid" >
                                    </div>
                                    <div class="form-group">
                                        <label for="txtnum">จำนวน</label>
                                        <input type="text" name="txtnum" class="form-control" id="txtname" >
                                    </div>
                                    <div class="form-group">
                                        <label for="txtprice">ราคา</label>
                                        <input type="text" name="txtprice" class="form-control" id="txtname" >
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-info pull-left" onclick="if(confirm('ยืนยันการบันทึก')) return true; else return false;">บันทึก</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--เพิ่มรายการอุปกรณ์ -->
                <!--ประวัติเพิ่ม-ถอน อุปกรณ์ -->
                <li><a target="_blank" href="manage_tool_record.php" ><i class="fa fa-exchange"></i> ประวัติเพิ่ม-ถอนอุปกรณ์ </a></li>
                <!--ประวัติเพิ่ม-ถอน อุปกรณ์ -->
            </ul>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /. box -->

    <!-- /.box -->
</div>
