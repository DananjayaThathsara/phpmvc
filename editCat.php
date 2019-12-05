<?php include "modules/head.php"; ?>
<?php

include_once '../models/dbConfig.php';
$myCon = new dbConfig();
$myCon->connect();
?>
    <div class="container">
        <div class="row">
            <?php
            $query = "SELECT * FROM me_category WHERE me_cat_status='active' AND me_cat_id='" . $_GET['cat_id'] . "'";
            $result = $myCon->query($query);
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-md-8">
                    <?php include_once 'controllers/categoryController.php' ?>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class=" form-group">
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
                                <img src="../uploads/category/<?php echo $rowimage['img_path'] ?>" alt=""
                                     class="img-responsive" width="200">
                            <?php } ?>
                            <div class="form-group">
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
                </div>
                </form>
            <?php } ?>
        </div>
    </div>
<?php include_once 'modules/footer_js.php' ?>