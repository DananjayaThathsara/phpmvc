<br><br>
<?php
error_reporting(1);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    /* Check posting data ------------------------------------------------------------ */
    include_once 'models/memberClass.php';
    include_once 'models/imageClass.php';
    include_once '../models/dbConfig.php';
    include_once '../models/encryption.php';
    include_once '../models/fileUploadClass.php';

    /* ------------------ Database INSERT -------------------- */
    if ($_POST['action'] == 'insert') {

        if (trim($_POST['mem_f_name']) == null || trim($_POST['mem_l_name']) == null || trim($_POST['mem_living_district']) == null ||
            trim($_POST['mem_living_city']) == null || trim($_POST['mem_tel']) == null || trim($_POST['mem_designation']) == null ||
            trim($_POST['mem_email']) == null || trim($_POST['mem_gender']) == null || trim($_POST['mem_address']) == null ||
            trim($_POST['mem_bdate']) == null || trim($_POST['mem_nic']) == null || trim($_POST['mem_cmp_name']) == null ||
            trim($_POST['mem_cmp_loc_city']) == null || trim($_POST['mem_civil_status']) == null || trim($_POST['card_id_num']) == null ||
            trim($_POST['form_num']) == null) {
            echo('<div class="alert alert-danger col-md-10" role="alert">  '
                . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                . '<span aria-hidden="true">&times;</span></button>Please enter required fields</div>');
        } else {

            $myCon = new dbConfig();
            $myCon->connect();
            $memObj = new memberClass();

            /*Member Values*/
            $enObj = new encryption();
            $password = $myCon->escapeString($_POST['card_id_num']);
            $password = $enObj->encode($password);
            $memFname = $myCon->escapeString(trim($_POST['mem_f_name']));
            $memLname = $myCon->escapeString(trim($_POST['mem_l_name']));
            $address = $myCon->escapeString(trim($_POST['mem_address']));
            $cmpname = $myCon->escapeString(trim($_POST['mem_cmp_name']));
            $mememail = $myCon->escapeString(trim($_POST['mem_email']));
            $memtel = $myCon->escapeString(trim($_POST['mem_tel']));
            $memnic = $myCon->escapeString(trim($_POST['mem_nic']));
            $memBdateOject = date_create($_POST['mem_bdate']);
            $memBdate = date_format($memBdateOject, 'Y-m-d');

            /*Spouse Values*/
            $memSpBdateOject = date_create($_POST['mem_spo_bdate']);
            $memSpBdate = date_format($memSpBdateOject, 'Y-m-d');
            $memSpName = $myCon->escapeString(trim($_POST['mem_spo_name']));
            $memSpNic = $myCon->escapeString(trim($_POST['mem_spo_nic']));
            $memSpPhone = $myCon->escapeString(trim($_POST['mem_spo_tel']));
            $memSpDesig = $myCon->escapeString(trim($_POST['mem_spo_designation']));
            $memSpCmpName = $myCon->escapeString(trim($_POST['mem_spo_cmp_name']));


            /*Card values*/
            $cardNum = $myCon->escapeString(trim($_POST['card_id_num']));
            $formId = $myCon->escapeString(trim($_POST['form_num']));

            /*Card values Set*/
            $memObj->setFormId($formId);
            $memObj->setGenCardId($cardNum);

            /*Member Values Set*/
            $memObj->setMemFName($memFname);
            $memObj->setMemLName($memLname);
            $memObj->setMemDesignation($_POST['mem_designation']);
            $memObj->setMemLivingDistrict($_POST['mem_living_district']);
            $memObj->setMemLivingCity($_POST['mem_living_city']);
            $memObj->setMemAddress($address);
            $memObj->setMemTel($memtel);
            $memObj->setMemEmail($mememail);
            $memObj->setMemBdate($memBdate);
            $memObj->setMemCivilStatus($_POST['mem_civil_status']);
            $memObj->setMemNic($memnic);
            $memObj->setMemGender($_POST['mem_gender']);
            $memObj->setMemCmpName($cmpname);
            $memObj->setMemCmpLocCity($_POST['mem_cmp_loc_city']);
            $memObj->setMemPword($password);
            $memObj->setMemStatus('active');

            /*Spouse Values Set*/
            $memObj->setMemSpoCmpName($memSpCmpName);
            $memObj->setMemSpoBdate($memSpBdate);
            $memObj->setMemSpoName($memSpName);
            $memObj->setMemSpoNic($memSpNic);
            $memObj->setMemSpoDesignation($memSpDesig);
            $memObj->setMemSpoTel($memSpPhone);


            try {
                if ($memObj->addMember()) {
                    $memObj->addMemLogin();

                    $memObj->addToCardActive();
                    $memObj->setAvailableCardToIssued($memObj->getGenCardId());
                    if (isset($_POST['mem_ch1_name']) && isset($_POST['mem_ch1_gender']) && isset($_POST['mem_ch1_bdate'])) {
                        /*Children Values*/
                        $memChBdateOject = date_create($_POST['mem_ch1_bdate']);
                        $memChBdate = date_format($memChBdateOject, 'Y-m-d');
                        $memChName = $myCon->escapeString(trim($_POST['mem_ch1_name']));
                        $memChGender = $myCon->escapeString(trim($_POST['mem_ch1_gender']));

                        /*Children Values Set*/
                        $memObj->setMemChName($memChName);
                        $memObj->setMemChBdate($memChBdate);
                        $memObj->setMemChGender($memChGender);
                        $memObj->setMemChStatus('active');

                        $memObj->addChildren();
                    } else if (isset($_POST['mem_ch2_name']) && isset($_POST['mem_ch2_gender']) && isset($_POST['mem_ch2_bdate'])) {
                        /*Children Values*/
                        $memChBdateOject = date_create($_POST['mem_ch2_bdate']);
                        $memChBdate = date_format($memChBdateOject, 'Y-m-d');
                        $memChName = $myCon->escapeString(trim($_POST['mem_ch2_name']));
                        $memChGender = $myCon->escapeString(trim($_POST['mem_ch2_gender']));

                        /*Children Values Set*/
                        $memObj->setMemChName($memChName);
                        $memObj->setMemChBdate($memChBdate);
                        $memObj->setMemChGender($memChGender);
                        $memObj->setMemChStatus('active');

                        $memObj->addChildren();
                    } else if (isset($_POST['mem_ch3_name']) && isset($_POST['mem_ch3_gender']) && isset($_POST['mem_ch3_bdate'])) {
                        /*Children Values*/
                        $memChBdateOject = date_create($_POST['mem_ch3_bdate']);
                        $memChBdate = date_format($memChBdateOject, 'Y-m-d');
                        $memChName = $myCon->escapeString(trim($_POST['mem_ch3_name']));
                        $memChGender = $myCon->escapeString(trim($_POST['mem_ch3_gender']));

                        /*Children Values Set*/
                        $memObj->setMemChName($memChName);
                        $memObj->setMemChBdate($memChBdate);
                        $memObj->setMemChGender($memChGender);
                        $memObj->setMemChStatus('active');

                        $memObj->addChildren();
                    }
                    $fileObj = new fileUploadClass();
                    $imgObj = new imageClass();
                    if ($_FILES['mem_pic']['name'] == null) {
                        $imgObj->setImgPath('default.jpg');
                        $imgObj->setRefId($memObj->getMemId());
                        $imgObj->setImgTypeId(3);/*Member Pro pic*/
                        $imgObj->setRefSecId(0);
                        if ($imgObj->imgSave()) {

                        }
                        echo('<div class="alert alert-success col-md-10" role="alert">  '
                            . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                            . '<span aria-hidden="true">&times;</span></button>You have been registered successfully.More Card team will contact you soon.</div>');

                        unset($_POST['card_id_num']);
                        unset($_POST['form_num']);

                        unset($_POST['mem_f_name']);
                        unset($_POST['mem_l_name']);
                        unset($_POST['mem_address']);
                        unset($_POST['mem_cmp_name']);
                        unset($_POST['mem_email']);
                        unset($_POST['mem_tel']);
                        unset($_POST['mem_nic']);
                        unset($_POST['mem_bdate']);
                        unset($_POST['mem_designation']);
                        unset($_POST['mem_living_district']);
                        unset($_POST['mem_living_city']);
                        unset($_POST['mem_civil_status']);
                        unset($_POST['mem_gender']);
                        unset($_POST['mem_cmp_loc_city']);

                        unset($_POST['mem_spo_name']);
                        unset($_POST['mem_spo_nic']);
                        unset($_POST['mem_spo_tel']);
                        unset($_POST['mem_spo_bdate']);
                        unset($_POST['mem_spo_designation']);
                        unset($_POST['mem_spo_cmp_name']);

                        unset($_POST['mem_ch1_name']);
                        unset($_POST['mem_ch1_bdate']);
                        unset($_POST['mem_ch1_gender']);

                        unset($_POST['mem_ch2_name']);
                        unset($_POST['mem_ch2_bdate']);
                        unset($_POST['mem_ch2_gender']);

                        unset($_POST['mem_ch3_name']);
                        unset($_POST['mem_ch3_bdate']);
                        unset($_POST['mem_ch3_gender']);
                    } else {


                        $fileObj->singleImageUpload($_FILES['mem_pic']['name'], $_FILES['mem_pic']['tmp_name'], 'uploads/member/profile', 400, 230);
                        $imgObj->setImgPath($fileObj->getFilename());
                        $imgObj->setRefId($memObj->getMemId());
                        $imgObj->setImgTypeId(3);/*Member Pro pic*/
                        $imgObj->setRefSecId(0);

                        if ($imgObj->imgSave()) {

                        }
                        echo('<div class="alert alert-success col-md-10" role="alert">  '
                            . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                            . '<span aria-hidden="true">&times;</span></button>You have been registered successfully.More Card team will contact you soon.</div>');


                        unset($_POST['card_id_num']);
                        unset($_POST['form_num']);

                        unset($_POST['mem_f_name']);
                        unset($_POST['mem_l_name']);
                        unset($_POST['mem_address']);
                        unset($_POST['mem_cmp_name']);
                        unset($_POST['mem_email']);
                        unset($_POST['mem_tel']);
                        unset($_POST['mem_nic']);
                        unset($_POST['mem_bdate']);
                        unset($_POST['mem_designation']);
                        unset($_POST['mem_living_district']);
                        unset($_POST['mem_living_city']);
                        unset($_POST['mem_civil_status']);
                        unset($_POST['mem_gender']);
                        unset($_POST['mem_cmp_loc_city']);

                        unset($_POST['mem_spo_name']);
                        unset($_POST['mem_spo_nic']);
                        unset($_POST['mem_spo_tel']);
                        unset($_POST['mem_spo_bdate']);
                        unset($_POST['mem_spo_designation']);
                        unset($_POST['mem_spo_cmp_name']);

                        unset($_POST['mem_ch1_name']);
                        unset($_POST['mem_ch1_bdate']);
                        unset($_POST['mem_ch1_gender']);

                        unset($_POST['mem_ch2_name']);
                        unset($_POST['mem_ch2_bdate']);
                        unset($_POST['mem_ch2_gender']);

                        unset($_POST['mem_ch3_name']);
                        unset($_POST['mem_ch3_bdate']);
                        unset($_POST['mem_ch3_gender']);
                    }


                }

            } catch (Exception $ex) {
                echo('<div class="alert alert-danger " role="alert">  '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button>' . $ex->getMessage() . '</div>');
            }


        }
    }
    /* ------------------ Database INSERT -------------------- */
    if ($_POST['action'] == 'update') {


        if (trim($_POST['mem_f_name']) == null || trim($_POST['mem_l_name']) == null || trim($_POST['mem_living_district']) == null ||
            trim($_POST['mem_living_city']) == null || trim($_POST['mem_tel']) == null || trim($_POST['mem_designation']) == null ||
            trim($_POST['mem_email']) == null || trim($_POST['mem_gender']) == null || trim($_POST['mem_address']) == null ||
            trim($_POST['mem_bdate']) == null || trim($_POST['mem_nic']) == null || trim($_POST['mem_cmp_name']) == null ||
            trim($_POST['mem_cmp_loc_city']) == null || trim($_POST['mem_civil_status']) == null) {
            echo('<div class="alert alert-danger col-md-10" role="alert">  '
                . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                . '<span aria-hidden="true">&times;</span></button>Please enter required fields</div>');
        } else {

            $myCon = new dbConfig();
            $myCon->connect();
            $memObj = new memberClass();

            /*Member Values*/
            $enObj = new encryption();
            $password = $myCon->escapeString($_POST['card_id_num']);
            $password = $enObj->encode($password);
            $memFname = $myCon->escapeString(trim($_POST['mem_f_name']));
            $memLname = $myCon->escapeString(trim($_POST['mem_l_name']));
            $address = $myCon->escapeString(trim($_POST['mem_address']));
            $cmpname = $myCon->escapeString(trim($_POST['mem_cmp_name']));
            $mememail = $myCon->escapeString(trim($_POST['mem_email']));
            $memtel = $myCon->escapeString(trim($_POST['mem_tel']));
            $memnic = $myCon->escapeString(trim($_POST['mem_nic']));
            $memBdateOject = date_create($_POST['mem_bdate']);
            $memBdate = date_format($memBdateOject, 'Y-m-d');

            /*Spouse Values*/
            $memSpBdateOject = date_create($_POST['mem_spo_bdate']);
            $memSpBdate = date_format($memSpBdateOject, 'Y-m-d');
            $memSpName = $myCon->escapeString(trim($_POST['mem_spo_name']));
            $memSpNic = $myCon->escapeString(trim($_POST['mem_spo_nic']));
            $memSpPhone = $myCon->escapeString(trim($_POST['mem_spo_tel']));
            $memSpDesig = $myCon->escapeString(trim($_POST['mem_spo_designation']));
            $memSpCmpName = $myCon->escapeString(trim($_POST['mem_spo_cmp_name']));


            /*Card values*/
            $cardNum = $myCon->escapeString(trim($_POST['card_id_num']));
            $formId = $myCon->escapeString(trim($_POST['form_num']));

            /*Card values Set*/
            $memObj->setFormId($formId);
            $memObj->setGenCardId($cardNum);

            /*Member Values Set*/
            $memObj->setMemFName($memFname);
            $memObj->setMemLName($memLname);
            $memObj->setMemDesignation($_POST['mem_designation']);
            $memObj->setMemLivingDistrict($_POST['mem_living_district']);
            $memObj->setMemLivingCity($_POST['mem_living_city']);
            $memObj->setMemAddress($address);
            $memObj->setMemTel($memtel);
            $memObj->setMemEmail($mememail);
            $memObj->setMemBdate($memBdate);
            $memObj->setMemCivilStatus($_POST['mem_civil_status']);
            $memObj->setMemNic($memnic);
            $memObj->setMemGender($_POST['mem_gender']);
            $memObj->setMemCmpName($cmpname);
            $memObj->setMemCmpLocCity($_POST['mem_cmp_loc_city']);
            $memObj->setMemPword($password);
            $memObj->setMemId($_POST['mem_id']);
            $memObj->setMemStatus('active');

            /*Spouse Values Set*/
            $memObj->setMemSpoCmpName($memSpCmpName);
            $memObj->setMemSpoBdate($memSpBdate);
            $memObj->setMemSpoName($memSpName);
            $memObj->setMemSpoNic($memSpNic);
            $memObj->setMemSpoDesignation($memSpDesig);
            $memObj->setMemSpoTel($memSpPhone);
            try {
                if ($memObj->updateMember()) {
                    //$memObj->addMemLogin();

                    //$memObj->addToCardActive();
                    //$memObj->setAvailableCardToIssued($memObj->getGenCardId());

                    if (isset($_POST['mem_ch1_name']) && isset($_POST['mem_ch1_gender']) && isset($_POST['mem_ch1_bdate'])) {

                        /*Children Values*/
                        $memChBdateOject = date_create($_POST['mem_ch1_bdate']);
                        $memChBdate = date_format($memChBdateOject, 'Y-m-d');
                        $memChName = $myCon->escapeString(trim($_POST['mem_ch1_name']));
                        $memChGender = $myCon->escapeString(trim($_POST['mem_ch1_gender']));

                        /*Children Values Set*/
                        $memObj->setMemChName($memChName);
                        $memObj->setMemChBdate($memChBdate);
                        $memObj->setMemChGender($memChGender);
                        $memObj->setMemChStatus('active');


                        if ($memObj->checkChildren()) {

                            $memObj->updateChildren();
                        } else {

                            $memObj->addChildren();
                        }

                    } else if (isset($_POST['mem_ch2_name']) && isset($_POST['mem_ch2_gender']) && isset($_POST['mem_ch2_bdate'])) {
                        /*Children Values*/
                        $memChBdateOject = date_create($_POST['mem_ch2_bdate']);
                        $memChBdate = date_format($memChBdateOject, 'Y-m-d');
                        $memChName = $myCon->escapeString(trim($_POST['mem_ch2_name']));
                        $memChGender = $myCon->escapeString(trim($_POST['mem_ch2_gender']));

                        /*Children Values Set*/
                        $memObj->setMemChName($memChName);
                        $memObj->setMemChBdate($memChBdate);
                        $memObj->setMemChGender($memChGender);
                        $memObj->setMemChStatus('active');

                        if ($memObj->checkChildren()) {

                            $memObj->updateChildren();
                        } else {

                            $memObj->addChildren();
                        }

                    } else if (isset($_POST['mem_ch3_name']) && isset($_POST['mem_ch3_gender']) && isset($_POST['mem_ch3_bdate'])) {
                        /*Children Values*/
                        $memChBdateOject = date_create($_POST['mem_ch3_bdate']);
                        $memChBdate = date_format($memChBdateOject, 'Y-m-d');
                        $memChName = $myCon->escapeString(trim($_POST['mem_ch3_name']));
                        $memChGender = $myCon->escapeString(trim($_POST['mem_ch3_gender']));

                        /*Children Values Set*/
                        $memObj->setMemChName($memChName);
                        $memObj->setMemChBdate($memChBdate);
                        $memObj->setMemChGender($memChGender);
                        $memObj->setMemChStatus('active');

                        if ($memObj->checkChildren()) {

                            $memObj->updateChildren();
                        } else {

                            $memObj->addChildren();
                        }
                    }

                    $fileObj = new fileUploadClass();
                    $imgObj = new imageClass();

                    if ($_FILES['mem_pic']['name'] == null) {
                        $imgObj->setImgPath($_POST['img_path']);
                        $imgObj->setRefId($memObj->getMemId());
                        $imgObj->setImgTypeId(3);/*Member Pro pic*/
                        $imgObj->setRefSecId(0);
                        $imgObj->imgUpdate();

                    } else {
                        $fileObj->singleImageUpload($_FILES['mem_pic']['name'], $_FILES['mem_pic']['tmp_name'], '../uploads/member/profile/', 400, 230);
                        $imgObj->setImgPath($fileObj->getFilename());
                        $imgObj->setRefId($memObj->getMemId());
                        $imgObj->setImgTypeId(3);/*Member Pro pic*/
                        $imgObj->setRefSecId(0);
                        $imgObj->imgUpdate();
                    }

                    echo('<div class="alert alert-success col-md-10" role="alert">  '
                        . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                        . '<span aria-hidden="true">&times;</span></button>Member has been updated!</div>');

                }

            } catch (Exception $ex) {
                echo('<div class="alert alert-danger " role="alert">  '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button>' . $ex->getMessage() . '</div>');
            }


        }
    }
    /* ------------------ Database Update -------------------- */
//    if ($_POST['action'] == 'update') {
//
//
//        if (trim($_POST['mem_f_name']) == null || trim($_POST['mem_l_name']) == null || trim($_POST['mem_living_district']) == null || trim($_POST['mem_living_city']) == null ||
//            trim($_POST['mem_tel']) == null || trim($_POST['mem_designation']) == null ||
//            trim($_POST['mem_email']) == null || trim($_POST['mem_gender']) == null || trim($_POST['mem_address']) == null ||
//            trim($_POST['mem_bdate']) == null || trim($_POST['mem_nic']) == null || trim($_POST['mem_cmp_name']) == null ||
//            trim($_POST['mem_cmp_loc_city']) == null || trim($_POST['mem_civil_status']) == null) {
//            echo('<div class="alert alert-danger col-md-10" role="alert">  '
//                . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
//                . '<span aria-hidden="true">&times;</span></button>Please enter required fields</div>');
//        } else {
//
//            $myCon = new dbConfig();
//            $myCon->connect();
//            $memObj = new memberClass();
//            $enObj = new encryption();
//
//            $password = $enObj->encode($_POST['mem_pword']);
//            $password = $myCon->escapeString(trim($password));
//            $memname = $myCon->escapeString(trim($_POST['mem_name']));
//            $address = $myCon->escapeString(trim($_POST['mem_address']));
//            $cmpname = $myCon->escapeString(trim($_POST['mem_cmp_name']));
//            $mememail = $myCon->escapeString(trim($_POST['mem_email']));
//
//            $memtel = $myCon->escapeString(trim($_POST['mem_tel']));
//            $memnic = $myCon->escapeString(trim($_POST['mem_nic']));
//
//            $deteoject = date_create($_POST['mem_bdate']);
//            $date = date_format($deteoject, 'Y-m-d');
//
//            $memObj->setMemName($memname);
//            $memObj->setMemDesignation($_POST['mem_designation']);
//            $memObj->setMemLivingDistrict($_POST['mem_living_district']);
//            $memObj->setMemLivingCity($_POST['mem_living_city']);
//            $memObj->setMemAddress($address);
//            $memObj->setMemTel($memtel);
//            $memObj->setMemMobilePhone($memmobile);
//            $memObj->setMemEmail($mememail);
//            $memObj->setMemBdate($date);
//            $memObj->setMemCivilStatus($_POST['mem_civil_status']);
//            $memObj->setMemNic($memnic);
//            $memObj->setMemGender($_POST['mem_gender']);
//            $memObj->setMemCmpName($cmpname);
//            $memObj->setMemCmpLocCity($_POST['mem_cmp_loc_city']);
//            $memObj->setMemPword($password);
//            $memObj->setMemId($_POST['mem_id']);
//            $memObj->setMemSpoCmpName($_POST['mem_spo_cmp_name']);
//            $memObj->setMemSpoBdate($_POST['mem_spo_bdate']);
//            $memObj->setMemSpoName($_POST['mem_spo_name']);
//            $memObj->setMemSpoNic($_POST['mem_spo_nic']);
//            $memObj->setMemSpoDesignation($_POST['mem_spo_designation']);
//            $memObj->setFormId($_POST['form_num']);
//            $memObj->setGenCardId($_POST['card_id_num']);
//            $memObj->setMemChName($_POST['mem_ch_name']);
//            $memObj->setMemChBdate($_POST['mem_ch_bdate']);
//            $memObj->setMemChGender($_POST['mem_ch_gender']);
//            $memObj->setMemChStatus('active');
//            try {
//                if ($memObj->updateMember()) {
//
//                    $fileObj = new fileUploadClass();
//                    $imgObj = new imageClass();
//
//                    if ($_FILES['mem_pic']['name'] == null) {
//                        $imgObj->setImgPath($_POST['img_path']);
//                        $imgObj->setRefId($memObj->getMemId());
//                        $imgObj->setImgTypeId(3);/*Member Pro pic*/
//                        $imgObj->setRefSecId(0);
//                        $imgObj->imgUpdate();
//
//                    } else {
//                        $fileObj->singleImageUpload($_FILES['mem_pic']['name'], $_FILES['mem_pic']['tmp_name'], '../uploads/member/profile/', 400, 230);
//                        $imgObj->setImgPath($fileObj->getFilename());
//                        $imgObj->setRefId($memObj->getMemId());
//                        $imgObj->setImgTypeId(3);/*Member Pro pic*/
//                        $imgObj->setRefSecId(0);
//                        $imgObj->imgUpdate();
//                    }
//
//                    echo('<div class="alert alert-success col-md-10" role="alert">  '
//                        . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
//                        . '<span aria-hidden="true">&times;</span></button>Member has been updated!</div>');
//
//                }
//            } catch (Exception $ex) {
//                echo('<div class="alert alert-danger " role="alert">  '
//                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
//                    . '<span aria-hidden="true">&times;</span></button>' . $ex->getMessage() . '</div>');
//            }
//
//        }
//    }
    /* ------------------ Database Delete -------------------- */
    if ($_POST['action'] == 'delete') {

        $myCon->connect();
        $memObj = new memberClass();

        $memObj->setMemId($_POST['mem_id']);
        $memObj->setMemStatus('deactive');


        try {
            if ($memObj->deleteMember()) {

                echo('<div class="alert alert-success" role="alert">  '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button>Member has been Deleted!</div>');
            }

        } catch (Exception $ex) {
            echo('<div class="alert alert-danger" role="alert">  '
                . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                . '<span aria-hidden="true">&times;</span></button>' . $ex->getMessage() . '</div>');
        }


    }
}

?>