<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    error_reporting(0);
    /* Check posting data ------------------------------------------------------------ */
    include_once 'models/merchantClass.php';
    include_once '../models/imageClass.php';
    include_once '../models/fileUploadClass.php';
    include_once '../models/dbConfig.php';
    include_once '../models/encryption.php';
    include_once 'models/urlSlugClass.php';

    /* ------------------ Add Merchant-------------------- */
    if ($_POST['action'] == 'insert') {

        if (trim($_POST['me_name']) == null || trim($_POST['me_district']) == null || trim($_POST['me_city']) == null ||
            trim($_POST['me_email']) == null || trim($_POST['me_hotline']) == null || trim($_POST['me_website']) == null || trim($_POST['me_address']) == null
            || trim($_POST['me_no_outlets']) == null || trim($_POST['me_cont_prsn_title']) == null || trim($_POST['me_cont_prsn_desig']) == null
            || trim($_POST['me_cont_prsn']) == null || trim($_POST['me_cont_prsn_phone']) == null || trim($_POST['me_cont_prsn_email']) == null
        ) {
            echo('<div class="alert alert-danger col-md-10" role="alert">  '
                . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                . '<span aria-hidden="true">&times;</span></button>Please enter required fields</div>');
        } else {

            $myCon = new dbConfig();

            $myCon->connect();
            $merObj = new merchantClass();

            $me_name = $myCon->escapeString($_POST['me_name']);
            $me_email = $myCon->escapeString($_POST['me_email']);
            $me_hotline = $myCon->escapeString($_POST['me_hotline']);
            $me_website = $myCon->escapeString($_POST['me_website']);
            $me_address = $myCon->escapeString($_POST['me_address']);
            $me_no_outlets = $myCon->escapeString($_POST['me_no_outlets']);
            $me_cont_prsn = $myCon->escapeString($_POST['me_cont_prsn']);
            $me_cont_prsn_phone = $myCon->escapeString($_POST['me_cont_prsn_phone']);
            $me_cont_prsn_email = $myCon->escapeString($_POST['me_cont_prsn_email']);
            $me_se_cont_prsn = $myCon->escapeString($_POST['me_se_cont_prsn']);
            $me_se_cont_prsn_phone = $myCon->escapeString($_POST['me_se_cont_prsn_phone']);
            $me_se_cont_prsn_email = $myCon->escapeString($_POST['me_se_cont_prsn_email']);


            $merObj->setMeCatId($_POST['me_cat_id']);
            $merObj->setMeSubCatId($_POST['me_sub_cat_id']);
            $merObj->setMeName($me_name);
            $merObj->setMeDistrict($_POST['me_district']);
            $merObj->setMeCity($_POST['me_city']);
            $merObj->setMeEmail($me_email);
            $merObj->setMeHotline($me_hotline);
            $merObj->setMeWebsite($me_website);
            $merObj->setMeAddress($me_address);
            $merObj->setMeNoOutlets($me_no_outlets);


            $merObj->setMeContPrsnTitle($_POST['me_cont_prsn_title']);
            $merObj->setMeContPrsnDesig($_POST['me_cont_prsn_desig']);
            $merObj->setMeContPrsn($me_cont_prsn);
            $merObj->setMeContPrsnPhone($me_cont_prsn_phone);
            $merObj->setMeContPrsnEmail($me_cont_prsn_email);

            if (!isset($_POST['me_se_cont_prsn'])) {
                $merObj->setMeSeContPrsn('null');
            } else {
                $merObj->setMeSeContPrsn($me_se_cont_prsn);
            }
            if (!isset($_POST['me_se_cont_prsn_title'])) {
                $merObj->setMeSeContPrsnTitle('null');
            } else {
                $merObj->setMeSeContPrsnTitle($_POST['me_se_cont_prsn_title']);
            }
            if (!isset($_POST['me_se_cont_prsn_desig'])) {
                $merObj->setMeSeContPrsnDesig('null');
            } else {
                $merObj->setMeSeContPrsnDesig($_POST['me_se_cont_prsn_desig']);
            }
            if (!isset($_POST['me_se_cont_prsn_phone'])) {
                $merObj->setMeSeContPrsnPhone('null');
            } else {
                $merObj->setMeSeContPrsnPhone($me_se_cont_prsn_phone);
            }
            if (!isset($_POST['me_se_cont_prsn_email'])) {
                $merObj->setMeSeContPrsnEmail('null');
            } else {
                $merObj->setMeSeContPrsnEmail($me_se_cont_prsn_email);
            }

            $merObj->setMeStatus('active');
            $merObj->setMeOrder(0);
            $merObj->setMeFeatured(0);
            try {
                if ($merObj->merchantSave()) {
                    if ($_FILES['me_logo']['name'] == null) {
                        echo('<div class="alert alert-danger col-md-10" role="alert">  '
                            . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                            . '<span aria-hidden="true">&times;</span></button>Please set image fields</div>');
                    } else {
                        $fileObj = new fileUploadClass();
                        $imgObj = new imageClass ();
                        $fileObj->singleImageUpload($_FILES['me_logo']['name'], $_FILES['me_logo']['tmp_name'], '../uploads/merchants/', 400, 230);
                        $imgObj->setImgPath($fileObj->getFilename());
                        $imgObj->setRefId($merObj->getMeId());
                        $imgObj->setImgTypeId(1);/*Merchant Logo*/
                        $imgObj->setRefSecId(0);

                        if ($imgObj->imgSave()) {

                        }
                        echo('<div class="alert alert-success col-md-10" role="alert">  '
                            . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                            . '<span aria-hidden="true">&times;</span></button>New Merchant has been Added!</div>');
                    }


                }

            } catch (Exception $ex) {
                echo('<div class="alert alert-danger " role="alert">  '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button>' . $ex->getMessage() . '</div>');
            }


        }
    }
    /* ------------------ Update Merchant -------------------- */
    if ($_POST['action'] == 'update') {
        if (trim($_POST['me_name']) == null ||
            trim($_POST['me_email']) == null || trim($_POST['me_hotline']) == null || trim($_POST['me_website']) == null || trim($_POST['me_address']) == null
            || trim($_POST['me_no_outlets']) == null
            || trim($_POST['me_cont_prsn']) == null || trim($_POST['me_cont_prsn_phone']) == null || trim($_POST['me_cont_prsn_email']) == null
        ) {
            echo('<div class="alert alert-danger col-md-10" role="alert">  '
                . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                . '<span aria-hidden="true">&times;</span></button>Please enter required fields</div>');
        } else {

            $myCon = new dbConfig();


            $myCon->connect();
            $merObj = new merchantClass();
            $fileObj = new fileUploadClass();
            $imgObj = new imageClass ();

            $merObj->setMeId($_POST['me_id']);
            $merObj->setMeCatId($_POST['me_cat_id']);
            $merObj->setMeName($_POST['me_name']);
            $merObj->setMeDistrict($_POST['me_district']);
            $merObj->setMeCity($_POST['me_city']);
            $merObj->setMeEmail($_POST['me_email']);
            $merObj->setMeHotline($_POST['me_hotline']);
            $merObj->setMeWebsite($_POST['me_website']);
            $merObj->setMeAddress($_POST['me_address']);
            $merObj->setMeNoOutlets($_POST['me_no_outlets']);


            $merObj->setMeContPrsnTitle($_POST['me_cont_prsn_title']);
            $merObj->setMeContPrsnDesig($_POST['me_cont_prsn_desig']);
            $merObj->setMeContPrsn($_POST['me_cont_prsn']);
            $merObj->setMeContPrsnPhone($_POST['me_cont_prsn_phone']);
            $merObj->setMeContPrsnEmail($_POST['me_cont_prsn_email']);

            if (!isset($_POST['me_sub_cat_id'])) {
                $merObj->setMeSubCatId(0);
            } else {
                $merObj->setMeSubCatId($_POST['me_sub_cat_id']);
            }
            if (!isset($_POST['me_se_cont_prsn'])) {
                $merObj->setMeSeContPrsn('null');
            } else {
                $merObj->setMeSeContPrsn($_POST['me_se_cont_prsn']);
            }
            if (!isset($_POST['me_se_cont_prsn_title'])) {
                $merObj->setMeSeContPrsnTitle('null');
            } else {
                $merObj->setMeSeContPrsnTitle($_POST['me_se_cont_prsn_title']);
            }
            if (!isset($_POST['me_se_cont_prsn_desig'])) {
                $merObj->setMeSeContPrsnDesig('null');
            } else {
                $merObj->setMeSeContPrsnDesig($_POST['me_se_cont_prsn_desig']);
            }
            if (!isset($_POST['me_se_cont_prsn_phone'])) {
                $merObj->setMeSeContPrsnPhone('null');
            } else {
                $merObj->setMeSeContPrsnPhone($_POST['me_se_cont_prsn_phone']);
            }
            if (!isset($_POST['me_se_cont_prsn_email'])) {
                $merObj->setMeSeContPrsnEmail('null');
            } else {
                $merObj->setMeSeContPrsnEmail($_POST['me_se_cont_prsn_email']);
            }

            $merObj->setMeStatus('active');
            $merObj->setMeOrder(0);
            $merObj->setMeFeatured(0);


            try {

                if ($merObj->merchantUpdate()) {

                    if (isset($_FILES['me_logo']['name']) && $_FILES['me_logo']['name'] != null) {

                        $fileObj->singleImageUpload($_FILES['me_logo']['name'], $_FILES['me_logo']['tmp_name'], '../uploads/merchants/', 400, 230);
                        $imgObj->setImgPath($fileObj->getFilename());
                        $imgObj->setRefId($_POST['ref_id']);
                        $imgObj->setRefSecId(0);
                        $imgObj->setImgTypeId($_POST['img_type_id']);

                        if ($imgObj->checkImageExist()) {

                            $imgObj->imgUpdate();
                        } else {
                            $imgObj->imgSave();
                        }
                    } else {
                        $imgObj->setImgPath($_POST['img_path_up']);
                        $imgObj->setRefId($_POST['ref_id']);
                        $imgObj->setImgTypeId($_POST['img_type_id']);

                        if ($imgObj->imgUpdate()) {

                        }

                    }
                    echo('<div class="alert alert-success col-md-10" role="alert">  '
                        . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                        . '<span aria-hidden="true">&times;</span></button>Merchant has been Updated!</div>');
                }


            } catch (Exception $ex) {
                echo('<div class="alert alert-danger " role="alert">  '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button>' . $ex->getMessage() . '</div>');
            }


        }
    }
    /* ------------------ Delete Merchant-------------------- */
    if ($_POST['action'] == 'delete') {
        $myCon->connect();
        $merObj = new merchantClass();
        $merObj->setMeId($_POST['me_id']);
        $merObj->setMeStatus('deactive');
        try {
            if ($merObj->merchantDelete()) {

                echo('<div class="alert alert-success" role="alert">  '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button>Merchant has been Deleted!</div>');
            }

        } catch (Exception $ex) {
            echo('<div class="alert alert-danger" role="alert">  '
                . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                . '<span aria-hidden="true">&times;</span></button>' . $ex->getMessage() . '</div>');
        }
    }
    /* ------------------ Top Merchant -------------------- */
    if ($_POST['f_type'] == 't') {
        //$con = mysqli_connect("localhost", "root", "", "more");
        $con = mysqli_connect("localhost", "morecard_user", "more@2018", "morecard_dbv3");
        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        if ($_POST['checked'] == 'yes') {
            $query = "UPDATE merchant SET me_featured='1' WHERE me_id='" . $_POST['me_id'] . "'";
        } else {
            $query = "UPDATE merchant SET me_featured='0' WHERE me_id='" . $_POST['me_id'] . "'";
        }
        $result = mysqli_query($con, $query);
        if ($result) {
            echo('<div class="alert alert-success" role="alert">  '
                . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                . '<span aria-hidden="true">&times;</span></button>Merchant set as Top Merchant!</div>');
        } else {
            echo('<div class="alert alert-danger" role="alert">  '
                . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                . '<span aria-hidden="true">&times;</span></button>Error has occurred.Try again !</div>');
        }
    }
    /* ------------------ Second Top Merchant-------------------- */
    if ($_POST['f_type'] == 'st') {
        $con = mysqli_connect("localhost", "morecard_user", "more@2018", "morecard_dbv3");
        //$con = mysqli_connect("localhost", "root", "", "more");
        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        if ($_POST['checked'] == 'yes') {
            $query = "UPDATE merchant SET me_featured='2' WHERE me_id='" . $_POST['me_id'] . "'";
        } else {
            $query = "UPDATE merchant SET me_featured='0' WHERE me_id='" . $_POST['me_id'] . "'";
        }
        $result = mysqli_query($con, $query);
        if ($result) {
            echo('<div class="alert alert-success" role="alert">  '
                . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                . '<span aria-hidden="true">&times;</span></button>Merchant set as Top Merchant!</div>');
        } else {
            echo('<div class="alert alert-danger" role="alert">  '
                . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                . '<span aria-hidden="true">&times;</span></button>Error has occurred.Try again !</div>');
        }
    }


    /*------------------------------------Merchant Login Start-------------------------*/
    /* ------------------ Set Merchant Login-------------------- */
    if ($_POST['action'] == 'insert_login' && isset($_POST['ins_login'])) {

        if (trim($_POST['me_id']) == null || trim($_POST['out_id']) == null || trim($_POST['user_id']) == null ||
            trim($_POST['user_pword']) == null || trim($_POST['user_type']) == null
        ) {
            echo('<div class="alert alert-danger col-md-10" role="alert">  '
                . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                . '<span aria-hidden="true">&times;</span></button>Please enter required fields</div>');
        } else {

            $myCon = new dbConfig();
            $merObj = new merchantClass();
            $enObj = new encryption();
            $slug = new urlSlugClass();
            $myCon->connect();

            $user_id = $slug->urlSlug($_POST['user_id']);

            $user_password = $myCon->escapeString($_POST['user_pword']);
            $user_password = $enObj->encode($user_password);
            //$user_id = $myCon->escapeString($_POST['user_id']);

            $merObj->setMeId($_POST['me_id']);
            $merObj->setOutId($_POST['out_id']);
            $merObj->setUserId($user_id);
            $merObj->setUserPword($user_password);
            $merObj->setUserType($_POST['user_type']);
            $merObj->setUserStatus('active');

            try {
                if ($merObj->addMerchantLogin()) {
                    echo('<div class="alert alert-success col-md-10" role="alert">  '
                        . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                        . '<span aria-hidden="true">&times;</span></button>New Merchant login has been set!</div>');
                }
            } catch (Exception $ex) {
                echo('<div class="alert alert-danger " role="alert">  '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button>' . $ex->getMessage() . '</div>');
            }


        }
    }
    /* ------------------ Update Merchant Login- -------------------- */
    if ($_POST['action'] == 'update_login') {

        if (trim($_POST['me_id']) == null || trim($_POST['out_id']) == null || trim($_POST['user_id']) == null ||
            trim($_POST['user_pword']) == null || trim($_POST['user_type']) == null) {
            echo('<div class="alert alert-danger col-md-10" role="alert">  '
                . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                . '<span aria-hidden="true">&times;</span></button>Please enter required fields</div>');
        } else {

            $myCon = new dbConfig();
            $merObj = new merchantClass();
            $enObj = new encryption();
            $myCon->connect();

            $user_password = $myCon->escapeString($_POST['user_pword']);
            $user_password = $enObj->encode($user_password);
            $user_id = $myCon->escapeString($_POST['user_id']);

            $merObj->setMeId($_POST['me_id']);
            $merObj->setOutId($_POST['out_id']);
            $merObj->setUserId($user_id);
            $merObj->setUserPword($user_password);
            $merObj->setUserType($_POST['user_type']);
            $merObj->setMeLogId($_POST['me_log_id']);
            $merObj->setUserStatus('active');

            try {
                if ($merObj->updateMerchantLogin()) {

                    echo('<div class="alert alert-success col-md-10" role="alert">  '
                        . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                        . '<span aria-hidden="true">&times;</span></button>Merchant login has been updated!</div>');
                }
            } catch (Exception $ex) {
                echo('<div class="alert alert-danger " role="alert">  '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button>' . $ex->getMessage() . '</div>');
            }


        }
    }
    /* ------------------ Delete Merchant Login-------------------- */

    if ($_POST['actionDel'] == 'delete_login' && isset($_POST['del_login'])) {

        $myCon->connect();
        $merObj = new merchantClass();
        $merObj->setMeLogId($_POST['me_log_id']);
        $merObj->setUserStatus('deactive');
        try {
            if ($merObj->merchantLoginDelete()) {

                echo('<div class="alert alert-success" role="alert">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button>Merchant Login has been Deleted!</div>');
            }

        } catch (Exception $ex) {
            echo('<div class="alert alert-danger" role="alert">  '
                . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                . '<span aria-hidden="true">&times;</span></button>' . $ex->getMessage() . '</div>');
        }
    }
    /*------------------------------------Merchant Login end-------------------------*/
}

?>