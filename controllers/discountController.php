<br><br>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    /* Check posting data ------------------------------------------------------------ */
    include_once 'models/discountClass.php';
    include_once '../models/dbConfig.php';

    /* ------------------ Database INSERT -------------------- */
    if ($_POST['action'] == 'insert') {

        if (trim($_POST['me_id']) == null || trim($_POST['me_dis_rate']) == null) {
            echo('<div class="alert alert-danger col-md-10" role="alert">  '
                . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                . '<span aria-hidden="true">&times;</span></button>Please enter required fields</div>');
        } else {

            $myCon = new dbConfig();

            $myCon->connect();
            $disObj = new discountClass();

            $disObj->setMeId($_POST['me_id']);
            $disObj->setMeDisRate($_POST['me_dis_rate']);

            if (!isset($_POST['me_dis_dsp'])) {
                $disObj->setMeDisDsp('null');
            } else {
                $disObj->setMeDisDsp($_POST['me_dis_dsp']);
            }
            $disObj->setDisStatus('active');

           try {

                if ($disObj->disSave()) {
                    echo('<div class="alert alert-success col-md-10" role="alert">  '
                        . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                        . '<span aria-hidden="true">&times;</span></button>New Discount has been Added!</div>');
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
        if (trim($_POST['me_id']) == null || trim($_POST['me_dis_rate']) == null) {
            echo('<div class="alert alert-danger col-md-10" role="alert">  '
                . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                . '<span aria-hidden="true">&times;</span></button>Please enter required fields</div>');
        } else {

            $myCon = new dbConfig();

            $myCon->connect();
            $disObj = new discountClass();

            $disObj->setMeId($_POST['me_id']);
            $disObj->setMeDisId($_POST['me_dis_id']);
            $disObj->setMeDisRate($_POST['me_dis_rate']);

            if (!isset($_POST['me_dis_dsp'])) {
                $disObj->setMeDisDsp('null');
            } else {
                $disObj->setMeDisDsp($_POST['me_dis_dsp']);
            }
            $disObj->setDisStatus('active');

            try {

                if ($disObj->disUpdate()) {
                    echo('<div class="alert alert-success col-md-10" role="alert">  '
                        . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                        . '<span aria-hidden="true">&times;</span></button>New Discount has been Updated!</div>');
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
        $disObj = new discountClass();


        $disObj->setMeDisId($_POST['me_dis_id']);
        $disObj->setDisStatus('deactive');


        try {
            if ($disObj->disDelete()) {

                echo('<div class="alert alert-success" role="alert">  '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button>Discount has been Deleted!</div>');
            }

        } catch (Exception $ex) {
            echo('<div class="alert alert-danger" role="alert">  '
                . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                . '<span aria-hidden="true">&times;</span></button>' . $ex->getMessage() . '</div>');
        }


    }
}

?>