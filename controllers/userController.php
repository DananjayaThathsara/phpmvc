<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    /* Check posting data ------------------------------------------------------------ */
    include_once 'models/userClass.php';
    include_once '../models/dbConfig.php';
    include_once '../models/encryption.php';

    /* ------------------ Database INSERT -------------------- */
    if ($_POST['action'] == 'insert') {

        if (trim($_POST['user_name']) == null || trim($_POST['user_level']) == null || trim($_POST['user_email']) == null ||
            trim($_POST['user_pword']) == null
        ) {
            echo('<div class="alert alert-danger col-md-10" role="alert">  '
                . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                . '<span aria-hidden="true">&times;</span></button>Please enter required fields</div>');
        } else {

            $myCon = new dbConfig();
            $myCon->connect();
            $userObj = new userClass();
            $enObj = new encryption();

            $password = $myCon->escapeString($_POST['user_pword']);
            $password = $enObj->encode($password);
            $username = $myCon->escapeString(trim($_POST['user_name']));
            $useremail = $myCon->escapeString(trim($_POST['user_email']));
            $date = date('Y-m-d h:i:s');

            $userObj->setUserLevel($_POST['user_level']);
            $userObj->setUserName($username);
            $userObj->setUserPword($password);
            $userObj->setUserEmail($useremail);
            $userObj->setLastLogin($date);
            $userObj->setActive('active');
            $userObj->setVerifiedOnce(0);

            try {

                if ($userObj->addUser()) {

                    echo('<div class="alert alert-success col-md-10" role="alert">  '
                        . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                        . '<span aria-hidden="true">&times;</span></button>New User has been Added!</div>');

                }

            } catch (Exception $ex) {
                echo('<div class="alert alert-danger col-md-10" role="alert">  '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button>' . $ex->getMessage() . '</div>');
            }


        }
    }
    /* ------------------ Database Update -------------------- */
    if ($_POST['action'] == 'update') {

        if (trim($_POST['user_name']) == null || trim($_POST['user_level']) == null || trim($_POST['user_pword']) == null
        ) {
            echo('<div class="alert alert-danger col-md-10" role="alert">  '
                . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                . '<span aria-hidden="true">&times;</span></button>Please enter required fields</div>');
        } else {

            $myCon = new dbConfig();
            $myCon->connect();
            $userObj = new userClass();
            $enObj = new encryption();

            $password = $myCon->escapeString($_POST['user_pword']);
            $password = $enObj->encode($password);
            $username = $myCon->escapeString(trim($_POST['user_name']));


            $userObj->setUserLevel($_POST['user_level']);
            $userObj->setUserName($username);
            $userObj->setUserPword($password);
            $userObj->setUserId($_POST['user_id']);

            try {
                if ($userObj->updateUser()) {
                    echo('<div class="alert alert-success col-md-10" role="alert">  '
                        . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                        . '<span aria-hidden="true">&times;</span></button>New User has been updated!</div>');

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
        $userObj = new userClass();

        $userObj->setUserId($_POST['user_id']);
        $userObj->setActive('deactive');


        try {
            if ($userObj->deleteUser()) {

                echo('<div class="alert alert-success" role="alert">  '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button>User has been Deleted!</div>');
            }

        } catch (Exception $ex) {
            echo('<div class="alert alert-danger" role="alert">  '
                . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                . '<span aria-hidden="true">&times;</span></button>' . $ex->getMessage() . '</div>');
        }


    }
}

?>