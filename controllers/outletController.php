<br><br>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    /* Check posting data ------------------------------------------------------------ */
    include_once 'models/outletClass.php';
    include_once '../models/dbConfig.php';

    /* ------------------ Database INSERT -------------------- */
    if ($_POST['action'] == 'insert') {

        if (trim($_POST['me_id']) == null || trim($_POST['out_district']) == null || trim($_POST['me_city']) == null ||
            trim($_POST['out_email']) == null || trim($_POST['out_hotline']) == null || trim($_POST['out_address']) == null
            || trim($_POST['out_cont_prsn_title']) == null || trim($_POST['out_cont_prsn_desig']) == null
            || trim($_POST['out_cont_prsn']) == null || trim($_POST['out_cont_prsn_mobile']) == null || trim($_POST['out_cont_prsn_email']) == null
        ) {
            echo('<div class="alert alert-danger col-md-10" role="alert">  '
                . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                . '<span aria-hidden="true">&times;</span></button>Please enter required fields</div>');
        } else {

            $myCon = new dbConfig();

            $myCon->connect();
            $outObj = new outletClass();


            $outObj->setMeId($_POST['me_id']);
            $outObj->setOutDistrict($_POST['out_district']);
            $outObj->setOutCity($_POST['me_city']);
            $outObj->setOutEmail($_POST['out_email']);
            $outObj->setOutHotline($_POST['out_hotline']);
            $outObj->setOutAddress($_POST['out_address']);

            $outObj->setOutContPrsnTitle($_POST['out_cont_prsn_title']);
            $outObj->setOutContPrsnDesig($_POST['out_cont_prsn_desig']);
            $outObj->setOutContPrsn($_POST['out_cont_prsn']);
            $outObj->setOutContPrsnMobile($_POST['out_cont_prsn_mobile']);
            $outObj->setOutContPrsnEmail($_POST['out_cont_prsn_email']);

            if (!isset($_POST['out_log_lat'])) {
                $outObj->setOutLogLat('null');
            } else {
                $outObj->setOutLogLat($_POST['out_log_lat']);
            }
            $outObj->setOutStatus('active');

            try {

                if ($outObj->outletSave()) {


                    echo('<div class="alert alert-success col-md-10" role="alert">  '
                        . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                        . '<span aria-hidden="true">&times;</span></button>New Outlet has been Added!</div>');
                }

            } catch (Exception $ex) {
                echo('<div class="alert alert-danger " role="alert">  '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button>' . $ex->getMessage() . '</div>');
            }


        }
    }
    /* ------------------ Database Update -------------------- */
    if ($_POST['action'] == 'update') {

        if (trim($_POST['me_id']) == null || trim($_POST['out_district']) == null || trim($_POST['me_city']) == null ||
            trim($_POST['out_email']) == null || trim($_POST['out_hotline']) == null || trim($_POST['out_address']) == null
            || trim($_POST['out_cont_prsn_title']) == null || trim($_POST['out_cont_prsn_desig']) == null
            || trim($_POST['out_cont_prsn']) == null || trim($_POST['out_cont_prsn_mobile']) == null || trim($_POST['out_cont_prsn_email']) == null
        ) {
            echo('<div class="alert alert-danger col-md-10" role="alert">  '
                . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                . '<span aria-hidden="true">&times;</span></button>Please enter required fields</div>');
        } else {

            $myCon = new dbConfig();

            $myCon->connect();
            $outObj = new outletClass();

            $outObj->setOutId($_POST['out_id']);
            $outObj->setMeId($_POST['me_id']);
            $outObj->setOutDistrict($_POST['out_district']);
            $outObj->setOutCity($_POST['me_city']);
            $outObj->setOutEmail($_POST['out_email']);
            $outObj->setOutHotline($_POST['out_hotline']);
            $outObj->setOutAddress($_POST['out_address']);

            $outObj->setOutContPrsnTitle($_POST['out_cont_prsn_title']);
            $outObj->setOutContPrsnDesig($_POST['out_cont_prsn_desig']);
            $outObj->setOutContPrsn($_POST['out_cont_prsn']);
            $outObj->setOutContPrsnMobile($_POST['out_cont_prsn_mobile']);
            $outObj->setOutContPrsnEmail($_POST['out_cont_prsn_email']);

            if (!isset($_POST['out_log_lat'])) {
                $outObj->setOutLogLat('null');
            } else {
                $outObj->setOutLogLat($_POST['out_log_lat']);
            }

            try {

                if ($outObj->outletUpdate()) {

                    echo('<div class="alert alert-success col-md-10" role="alert">  '
                        . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                        . '<span aria-hidden="true">&times;</span></button>Outlet has been updated!</div>');
                }

            } catch (Exception $ex) {
                echo('<div class="alert alert-danger " role="alert">  '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button>' . $ex->getMessage() . '</div>');
            }


        }
    }
    /* ------------------ Database Delete -------------------- */
    if ($_POST['action'] == 'delete') {

        $myCon->connect();
        $outObj = new outletClass();


        $outObj->setOutId($_POST['out_id']);
        $outObj->setOutStatus('deactive');


        try {
            if ($outObj->outletDelete()) {

                echo('<div class="alert alert-success" role="alert">  '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button>Outlet has been Deleted!</div>');
            }

        } catch (Exception $ex) {
            echo('<div class="alert alert-danger" role="alert">  '
                . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                . '<span aria-hidden="true">&times;</span></button>' . $ex->getMessage() . '</div>');
        }


    }
}

?>