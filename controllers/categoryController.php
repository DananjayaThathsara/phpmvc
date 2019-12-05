<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    /* Check posting data ------------------------------------------------------------ */
    include_once 'models/categoryClass.php';
    include_once '../models/dbConfig.php';
    include_once '../models/fileUploadClass.php';
    include_once '../models/imageClass.php';

    /* ------------------ Database Insert -------------------- */
    if ($_POST['action'] == 'insert') {
        if ($_POST['cat_type'] == 'main_cat') {
            if (trim($_POST['me_cat_name']) == null) {
                echo('<div class="alert alert-danger" role="alert">  '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button>Please enter cagtegory name</div>');
            } else {

                $myCon = new dbConfig();
                $myCon->connect();
                $catObj = new categoryClass();
                $me_cat_name = $myCon->escapeString($_POST['me_cat_name']);
                $catObj->setMeCatName($me_cat_name);
                $catObj->setMeCatStatus('active');

                try {
                    if ($catObj->catSave()) {
                        $fileObj = new fileUploadClass();
                        $imgObj = new imageClass();
                        if ($_FILES['cat_pic']['name'] == null) {
                            $imgObj->setImgPath('default.jpg');
                            $imgObj->setRefId($catObj->getMeCatId());
                            $imgObj->setImgTypeId(4);/*Cat Image*/
                            $imgObj->setRefSecId(0);
                            if ($imgObj->imgSave()) {
                            }
                        } else {
                            $fileObj->singleImageUpload($_FILES['cat_pic']['name'], $_FILES['cat_pic']['tmp_name'], '../uploads/category/', 400, 230);
                            $imgObj->setImgPath($fileObj->getFilename());
                            $imgObj->setRefId($catObj->getMeCatId());
                            $imgObj->setImgTypeId(4);/*Cat Image*/
                            $imgObj->setRefSecId(0);
                            if ($imgObj->imgSave()) {
                            }
                        }
                        echo('<div class="alert alert-success" role="alert">  '
                            . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                            . '<span aria-hidden="true">&times;</span></button>New Category has been Added!</div>');

                    }
                } catch (Exception $ex) {
                    echo('<div class="alert alert-danger" role="alert">  '
                        . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                        . '<span aria-hidden="true">&times;</span></button>' . $ex->getMessage() . '</div>');
                }

            }
        }
        if ($_POST['cat_type'] == 'sub_cat') {
            if (trim($_POST['me_sub_cat_name']) == null || trim($_POST['me_cat_id']) == null) {
                echo('<div class="alert alert-danger" role="alert">  '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button>Please enter sub category name</div>');
            } else {

                $myCon = new dbConfig();

                $myCon->connect();
                $catObj = new categoryClass();

                $me_sub_cat_name = $myCon->escapeString($_POST['me_sub_cat_name']);


                $catObj->setMeSubCatName($me_sub_cat_name);

                $catObj->setMeCatId($_POST['me_cat_id']);
                $catObj->setMeSubCatStatus('active');

                try {
                    if ($catObj->saveSubCat()) {
                        echo('<div class="alert alert-success" role="alert">  '
                            . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                            . '<span aria-hidden="true">&times;</span></button>New Sub Category has been Added!</div>');
                    }

                } catch (Exception $ex) {
                    echo('<div class="alert alert-danger" role="alert">  '
                        . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                        . '<span aria-hidden="true">&times;</span></button>' . $ex->getMessage() . '</div>');
                }

            }
        }
    }
    /* ------------------ Database Update -------------------- */
    if ($_POST['action'] == 'update') {

        if ($_POST['cat_type'] == 'main_cat') {
            if (trim($_POST['me_cat_name']) == null) {

                echo('<div class="alert alert-danger" role="alert">  '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button>Please enter cagtegory name</div>');
            } else {

                $myCon = new dbConfig();

                $myCon->connect();
                $catObj = new categoryClass();

                $me_cat_name = $myCon->escapeString($_POST['me_cat_name']);

                $catObj->setMeCatName($_POST['me_cat_name']);
                $catObj->setMeCatId($_POST['me_cat_id']);


                try {
                    if ($catObj->catUpdate()) {
                        $fileObj = new fileUploadClass();
                        $imgObj = new imageClass();
                        if ($_FILES['cat_pic']['name'] == null) {
                            $imgObj->setImgPath($_POST['img_path']);
                            $imgObj->setRefId($catObj->getMeCatId());
                            $imgObj->setImgTypeId(4);/*cat pic*/
                            $imgObj->setRefSecId(0);

                            if ($imgObj->imgUpdate()) {
                            }
                        }
                        else{
                            $fileObj->singleImageUpload($_FILES['cat_pic']['name'], $_FILES['cat_pic']['tmp_name'], '../uploads/category/', 400, 230);
                            $imgObj->setImgPath($fileObj->getFilename());
                            $imgObj->setRefId($catObj->getMeCatId());
                            $imgObj->setImgTypeId(4);/*cat pic*/
                            $imgObj->setRefSecId(0);
                            if($imgObj->checkImageExist()){
                                $imgObj->imgUpdate();
                            }else{
                                $imgObj->imgSave();
                            }
                        }
                        echo('<div class="alert alert-success" role="alert">  '
                            . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                            . '<span aria-hidden="true">&times;</span></button>Category has been updated!</div>');
                    }

                } catch (Exception $ex) {
                    echo('<div class="alert alert-danger" role="alert">  '
                        . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                        . '<span aria-hidden="true">&times;</span></button>' . $ex->getMessage() . '</div>');
                }


            }
        }
        if ($_POST['cat_type'] == 'sub_cat') {
            if (trim($_POST['me_sub_cat_name']) == null || trim($_POST['me_cat_id']) == null) {

                echo('<div class="alert alert-danger" role="alert">  '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button>Please enter cagtegory name</div>');
            } else {

                $myCon = new dbConfig();

                $myCon->connect();
                $catObj = new categoryClass();

                $me_sub_cat_name = $myCon->escapeString($_POST['me_sub_cat_name']);

                $catObj->setMeSubCatName($me_sub_cat_name);
                $catObj->setMeCatId($_POST['me_cat_id']);
                $catObj->setMeSubCatId($_POST['me_sub_cat_id']);


                try {
                    if ($catObj->subCatUpdate()) {

                        echo('<div class="alert alert-success" role="alert">  '
                            . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                            . '<span aria-hidden="true">&times;</span></button>Sub Category has been updated!</div>');
                    }

                } catch (Exception $ex) {
                    echo('<div class="alert alert-danger" role="alert">  '
                        . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                        . '<span aria-hidden="true">&times;</span></button>' . $ex->getMessage() . '</div>');
                }


            }
        }

    }
    /* ------------------ Database Delete -------------------- */
    if ($_POST['action'] == 'delete') {
        if ($_POST['cat_type'] == 'main_cat') {
            $myCon = new dbConfig();

            $myCon->connect();
            $catObj = new categoryClass();
            $catObj->setMeCatStatus('deactive');
            $catObj->setMeCatId($_POST['me_cat_id']);

            try {
                if ($catObj->catDelete()) {

                    echo('<div class="alert alert-success" role="alert">  '
                        . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                        . '<span aria-hidden="true">&times;</span></button>Category has been Deleted!</div>');
                }

            } catch (Exception $ex) {
                echo('<div class="alert alert-danger" role="alert">  '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button>' . $ex->getMessage() . '</div>');
            }

        }
        if ($_POST['cat_type'] == 'sub_cat') {
            $myCon = new dbConfig();

            $myCon->connect();
            $catObj = new categoryClass();
            $catObj->setMeSubCatStatus('deactive');
            $catObj->setMeSubCatId($_POST['me_sub_cat_id']);

            try {
                if ($catObj->subCatDelete()) {

                    echo('<div class="alert alert-success" role="alert">  '
                        . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                        . '<span aria-hidden="true">&times;</span></button>Category has been Deleted!</div>');
                }

            } catch (Exception $ex) {
                echo('<div class="alert alert-danger" role="alert">  '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button>' . $ex->getMessage() . '</div>');
            }

        }


    }

}

?>