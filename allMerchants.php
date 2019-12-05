<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<?php include "modules/head.php"; ?>
<?php include_once '../models/dbConfig.php';
$myCon = new dbConfig();
$myCon->connect(); ?>
<body class="animsition dashboard">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<?php include "modules/nav.php"; ?>
<?php include "modules/leftMenu.php"; ?>
<!-- Page -->
<style>

</style>
<div class="page">
    <div class="page-content container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">All Merchants</li>
            </ol>
            <a href="addMerchants.php" class="btn btn-primary" style="height:35px">
                Add New
            </a>

            <div class="form-group col-md-12">
                <div class="input-group">
                    <select class="form-control selectpicker" data-live-search="true" data-size="5"
                            onChange="filterPost(this.value)">
                        <option disabled selected>Search</option>
                        <?php
                        $query_mer = "SELECT me_id, me_name FROM merchant WHERE me_status='active'";
                        $result_mer = $myCon->query($query_mer);

                        while ($row_mer = mysqli_fetch_assoc($result_mer)) {


                            ?>
                            <option value="<?php echo($row_mer['me_id']); ?>"><?php echo($row_mer['me_name']); ?></option>
                            <?php

                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="panel-body container-fluid" style="background: #fff">

                <?php include_once 'controllers/merchantController.php' ?>
                <div class="example table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Merchant Name</th>
                            <th>Location</th>
                         <th>Phone</th>
                            <th>Email</th>
<!--                            <th>Contact Per Name</th>-->
<!--                            <th>Contact Per Phone</th>-->
<!--                            <th>Contact Per Email</th>-->
                            <th class="text-nowrap">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query = "SELECT c.*,d.*,m.*,i.*,cat.* ,subcat.me_sub_cat_name FROM merchant m LEFT JOIN sl_city c
                         ON m.me_city=c.c_id LEFT  JOIN sl_district d ON m.me_district=d.d_id LEFT JOIN images i 
                             ON m.me_id = i.ref_id AND i.img_type_id=1 LEFT JOIN me_category cat 
                             ON m.me_cat_id=cat.me_cat_id LEFT JOIN me_sub_category subcat ON m.me_sub_cat_id=subcat.me_sub_cat_id WHERE m.me_status='active'";

                        $result = $myCon->query($query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>

                            <tr>
                            <td><?php echo $row['me_name']; ?></td>
                            <td>
                                <?php echo $row['c_name']; ?>
                            </td>
                            <td><?php echo $row['me_hotline']; ?></td>
                            <td><?php echo $row['me_email']; ?></td>
<!--                            <td>--><?php //echo $row['me_cont_prsn']; ?><!--</td>-->
<!--                            <td>--><?php //echo $row['me_cont_prsn_phone']; ?><!--</td>-->
<!--                            <td>--><?php //echo $row['me_cont_prsn_email']; ?><!--</td>-->
                            <td class="text-nowrap">
                                <a class="btn btn-sm btn-icon btn-flat btn-default" data-fancybox data-type="iframe"
                                   data-src="editMerchants.php?me_id=<?php echo $row['me_id']; ?>" href="javascript:;"
                                   title="Edit">
                                    <i class="icon wb-wrench" aria-hidden="true"></i>
                                </a>
                                <span>T</span>
                                <?php if($row['me_featured']=='1'){?>
                                <label class="switch">
                                    <input type="checkbox" value="<?php echo $row['me_id'];?>" id="t<?php echo $row['me_id']; ?>" onchange="topMerchant(this.value)" checked>
                                    <span class="slider round"></span>
                                </label>
                                <?php }else{?>
                                <label class="switch">
                                    <input type="checkbox" value="<?php echo $row['me_id'];?>" id="t<?php echo $row['me_id']; ?>" onchange="topMerchant(this.value)">
                                    <span class="slider round"></span>
                                </label>
                                <?php }?>
                                <span>ST</span>
                                <?php if($row['me_featured']=='2'){?>
                                <label class="switch">
                                    <input type="checkbox" value="<?php echo $row['me_id'];?>" onchange="secondTopMerchant(this.value)" id="st<?php echo $row['me_id']; ?>" checked>
                                    <span class="slider round"></span>
                                </label>
                                <?php }else{?>
                                <label class="switch">
                                    <input type="checkbox" value="<?php echo $row['me_id'];?>" onchange="secondTopMerchant(this.value)" id="st<?php echo $row['me_id']; ?>">
                                    <span class="slider round"></span>
                                </label>
                                <?php }?>
                                <button type="button" class="btn btn-sm btn-icon btn-flat btn-default"
                                        data-target="#del<?php echo $row['me_id']; ?>" data-toggle="modal"
                                        title="Delete">
                                    <i class="icon wb-close" aria-hidden="true"></i>
                                </button>
                            </td>

                            <div class="modal fade" id="del<?php echo $row['me_id']; ?>" aria-hidden="false"
                                 aria-labelledby="exampleFillIn" role="dialog" tabindex="-1">
                                <div class="modal-dialog modal-simple">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <h4 class="modal-title" id="exampleFillInModalTitle">Delete Merchant</h4>
                                        </div>
                                        <div class="modal-body">
                                            Are You Sure to delete that Merchant ?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="" method="post">
                                                <input type="hidden" name="me_id" value="<?php echo $row['me_id']; ?>">
                                                <input type="hidden" name="action" value="delete">
                                                <input type="submit" data-bb-handler="danger" type="button"
                                                       class="btn btn-danger" value="Confirm">
                                            </form>
                                            <button data-bb-handler="main" type="button" data-dismiss="modal"
                                                    class="btn btn-primary">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="tf<?php echo $row['me_id']; ?>" aria-hidden="false"
                                 aria-labelledby="exampleFillIn" role="dialog" tabindex="-1">
                                <div class="modal-dialog modal-simple">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <h4 class="modal-title" id="exampleFillInModalTitle">Feature Merchant</h4>
                                        </div>
                                        <div class="modal-body">
                                            Are You Sure to get this Merchant to the top ?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="" method="post">
                                                <input type="hidden" name="me_id" value="<?php echo $row['me_id']; ?>">
                                                <input type="hidden" name="action" value="topFeature">
                                                <input type="submit" type="button"
                                                       class="btn btn-primary" value="Yes">
                                            </form>
                                            <button data-bb-handler="main" type="button" data-dismiss="modal"
                                                    class="btn btn-default">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="sf<?php echo $row['me_id']; ?>" aria-hidden="false"
                                 aria-labelledby="exampleFillIn" role="dialog" tabindex="-1">
                                <div class="modal-dialog modal-simple">
                                    <div class="modal-dialog modal-simple">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <h4 class="modal-title" id="exampleFillInModalTitle">Second Feature
                                                    Merchant</h4>
                                            </div>
                                            <div class="modal-body">
                                                Are You Sure to get this Merchant to the second top ?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="" method="post">
                                                    <input type="hidden" name="me_id"
                                                           value="<?php echo $row['me_id']; ?>">
                                                    <input type="hidden" name="action" value="topSecFeature">
                                                    <input type="submit" type="button"
                                                           class="btn btn-primary" value="Yes">
                                                </form>
                                                <button data-bb-handler="main" type="button" data-dismiss="modal"
                                                        class="btn btn-default">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- End Modal -->
                            </tr><?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page -->
<!-- Footer -->
<?php include "modules/footer.php"; ?>
<?php include_once 'modules/footer_js.php' ?>
<script>
    function secondTopMerchant(id)
    {
        var checked;
        if($('#st'+id).prop("checked") == true){
            var checked='yes';

        }
        $.ajax({
            type: "POST",
            url: "controllers/merchantController.php",
            data: {me_id:id,f_type:'st',checked:checked},
            dataType:"html",
            success: function(response)
            {

                $('#show_msg').html(response);
            }
        });
    }
    function topMerchant(id)
    {  var checked;
        if($('#t'+id).prop("checked") == true){
            var checked='yes';

        }
        $.ajax({
            type: "POST",
            url: "controllers/merchantController.php",
            data: {me_id:id,f_type:'t',checked:checked},
            dataType:"html",
            success: function(response)
            {

                $('#show_msg').html(response);
            }
        });
    }
</script>
</body>
</html>
