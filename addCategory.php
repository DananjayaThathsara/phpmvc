<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<?php include "modules/head.php"; ?>
<body class="animsition dashboard">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<?php include "modules/nav.php"; ?>
<?php include "modules/leftMenu.php";
include_once '../models/dbConfig.php';
$myCon = new dbConfig();
$myCon->connect();?>
<!-- Page -->
<div class="page">
    <div class="page-content container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Category</li>
            </ol>
            <div class="panel-body container-fluid" style="background: #fff">
                <div class="example-wrap">
                    <div class="example">
                        <div class="col-md-12" style="background: #fff;">
                            <div class="row">
                                <!--Add Category start-->
                                <div class="col-md-6">
                                    <?php include_once 'controllers/categoryController.php' ?>
                                    <form method="post" action="" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <lable>Category Name</lable>
                                            <input type="text" class="form-control" name="me_cat_name"
                                                   autocomplete="off" required>
                                            <input type="hidden" class="form-control" name="action"
                                                   autocomplete="off" value="insert">
                                            <input type="hidden" class="form-control" name="cat_type"
                                                   autocomplete="off" value="main_cat">
                                        </div>
                                        <div class="form-group">
                                            <lable>Cat Image (400 x 230 px)</lable>
                                            <input type="file" class="form-control" name="cat_pic">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary pull-right" style="float:right"
                                                   value="Add Category">
                                        </div>
                                    </form>
                                </div>
                                <!--Add Category End-->
                                <!--View & Edit Category start-->
                                <div class="col-md-6">
                                    <div class="example table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Category Name</th>
                                                <th class="text-nowrap">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $query = "SELECT * FROM me_category WHERE me_cat_status='active'";
                                            $result = $myCon->query($query);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['me_cat_name'] ?></td>
                                                    <td class="text-nowrap">
                                                        <a class="btn btn-sm btn-icon btn-flat btn-default" data-fancybox data-type="iframe"
                                                           data-src="editCat?cat_id=<?php echo $row['me_cat_id']; ?>" href="javascript:;"
                                                           title="Edit">
                                                            <i class="icon wb-wrench" aria-hidden="true"></i>
                                                        </a>
                                                        <button type="button"
                                                                class="btn btn-sm btn-icon btn-flat btn-default"
                                                                data-target="#del<?php
                                                                echo $row['me_cat_id'] ?>" data-toggle="modal"
                                                                data-original-title="Delete">
                                                            <i class="icon wb-close" aria-hidden="true"></i>
                                                        </button>
                                                    </td>
                                                    <!-- Modal Edit-->
                                                    <div class="modal fade" id="edit<?php echo $row['me_cat_id'] ?>"
                                                         aria-hidden="false"
                                                         aria-labelledby="exampleFillIn" role="dialog" tabindex="-1">
                                                        <div class="modal-dialog modal-simple">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                    <h4 class="modal-title"
                                                                        id="exampleFillInModalTitle">
                                                                        Edit Category</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="post" action="" enctype="multipart/form-data>
                                                                        <div class="form-group">
                                                                            <lable>Category Name</lable>
                                                                            <input type="text" class="form-control"
                                                                                   name="me_cat_name" autocomplete="off"
                                                                                   value="<?php echo $row['me_cat_name'] ?>">
                                                                            <input type="hidden" class="form-control"
                                                                                   name="action"
                                                                                   autocomplete="off" value="update">
                                                                            <input type="hidden" class="form-control"
                                                                                   name="cat_type"
                                                                                   autocomplete="off" value="main_cat">
                                                                            <input type="hidden" class="form-control"
                                                                                   name="me_cat_id"
                                                                                   autocomplete="off" value="<?php
                                                                            echo $row['me_cat_id'] ?>">
                                                                            <?php
                                                                            $queryimage = "SELECT img_path FROM images WHERE ref_id='" . $row['me_cat_id'] . "' AND img_type_id=4";
                                                                            $resultimage = $myCon->query($queryimage);
                                                                            while ($rowimage = mysqli_fetch_assoc($resultimage)) {
                                                                                ?>
                                                                                <input type="hidden" name="img_path"
                                                                                       value="<?php echo $rowimage['img_path'] ?>">
                                                                            <?php } ?>
                                                                    <div class="form-group">
                                                                        <img src="../uploads/category/<?php echo $rowimage['img_path'] ?>" alt="">
                                                                        <lable>Cat Image (400 x 230 px)</lable>
                                                                        <input type="file" class="form-control" name="cat_pic">
                                                                    </div>
                                                                </div>

                                                                        <div class="form-group">
                                                                            <input type="submit"
                                                                                   class="btn btn-primary pull-right"
                                                                                   style="float:right"
                                                                                   value="Update Category">
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /Modal Edit -->
                                                    <!-- Modal Del -->
                                                    <div class="modal fade" id="del<?php echo $row['me_cat_id'] ?>"
                                                         aria-hidden="false"
                                                         aria-labelledby="exampleFillIn" role="dialog" tabindex="-1">
                                                        <div class="modal-dialog modal-simple">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                    <h4 class="modal-title"
                                                                        id="exampleFillInModalTitle">
                                                                        Delete Category</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are You Sure to delete that Category ?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form method="post" action="">
                                                                        <div class="form-group">
                                                                            <input type="hidden" class="form-control"
                                                                                   name="action"
                                                                                   autocomplete="off" value="delete">
                                                                            <input type="hidden" class="form-control"
                                                                                   name="cat_type"
                                                                                   autocomplete="off" value="main_cat">
                                                                            <input type="hidden" class="form-control"
                                                                                   name="me_cat_id"
                                                                                   autocomplete="off" value="<?php
                                                                            echo $row['me_cat_id'] ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input type="submit"
                                                                                   class="btn btn-danger pull-right"
                                                                                   style="float:right"
                                                                                   value="Confirm">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <button data-bb-handler="main" type="button"
                                                                                    data-dismiss="modal"
                                                                                    class="btn btn-primary">
                                                                                Cancel
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /Modal Del -->
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--View & Edit Category end-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page -->
<!-- Footer -->
<?php include "modules/footer.php"; ?>
<?php include_once 'modules/footer_js.php' ?>
</body>
</html>
