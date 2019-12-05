<?php

/**
 * Created by PhpStorm.
 * User: Nethweb
 * Date: 9/10/2018
 * Time: 2:03 PM
 */
class merchantClass
{
    private $me_id;
    private $me_name;
    private $me_address;
    private $me_hotline;
    private $me_website;
    private $me_email;
    private $me_district;
    private $me_cont_prsn;
    private $me_cont_prsn_email;
    private $me_cont_prsn_desig;
    private $me_cont_prsn_title;
    private $me_city;
    private $me_no_outlets;
    private $me_cat_id;
    private $me_se_cont_prsn_title;
    private $me_se_cont_prsn;
    private $me_se_cont_prsn_desig;
    private $me_se_cont_prsn_phone;
    private $me_cont_prsn_phone;
    private $me_status;
    private $me_featured;
    private $me_order;
    private $me_se_cont_prsn_email;
    private $me_sub_cat_id;
    private $out_id;
    private $user_id;
    private $user_pword;
    private $me_log_id;
    private $user_status;
    private $user_type;

    /**
     * @return mixed
     */
    public function getOutId()
    {
        return $this->out_id;
    }

    /**
     * @param mixed $out_id
     */
    public function setOutId($out_id)
    {
        $this->out_id = $out_id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getUserPword()
    {
        return $this->user_pword;
    }

    /**
     * @param mixed $user_pword
     */
    public function setUserPword($user_pword)
    {
        $this->user_pword = $user_pword;
    }

    /**
     * @return mixed
     */
    public function getMeLogId()
    {
        return $this->me_log_id;
    }

    /**
     * @param mixed $me_log_id
     */
    public function setMeLogId($me_log_id)
    {
        $this->me_log_id = $me_log_id;
    }

    /**
     * @return mixed
     */
    public function getUserStatus()
    {
        return $this->user_status;
    }

    /**
     * @param mixed $user_status
     */
    public function setUserStatus($user_status)
    {
        $this->user_status = $user_status;
    }

    /**
     * @return mixed
     */
    public function getUserType()
    {
        return $this->user_type;
    }

    /**
     * @param mixed $user_type
     */
    public function setUserType($user_type)
    {
        $this->user_type = $user_type;
    }

    /**
     * @return mixed
     */
    public function getMeSubCatId()
    {
        return $this->me_sub_cat_id;
    }

    /**
     * @param mixed $me_sub_cat_id
     */
    public function setMeSubCatId($me_sub_cat_id)
    {
        $this->me_sub_cat_id = $me_sub_cat_id;
    }

    /**
     * @return mixed
     */
    public function getMeSeContPrsnEmail()
    {
        return $this->me_se_cont_prsn_email;
    }

    /**
     * @param mixed $me_se_cont_prsn_email
     */
    public function setMeSeContPrsnEmail($me_se_cont_prsn_email)
    {
        $this->me_se_cont_prsn_email = $me_se_cont_prsn_email;
    }

    /**
     * @return mixed
     */
    public function getMeId()
    {
        return $this->me_id;
    }

    /**
     * @param mixed $me_id
     */
    public function setMeId($me_id)
    {
        $this->me_id = $me_id;
    }

    /**
     * @return mixed
     */
    public function getMeName()
    {
        return $this->me_name;
    }

    /**
     * @param mixed $me_name
     */
    public function setMeName($me_name)
    {
        $this->me_name = $me_name;
    }

    /**
     * @return mixed
     */
    public function getMeAddress()
    {
        return $this->me_address;
    }

    /**
     * @param mixed $me_address
     */
    public function setMeAddress($me_address)
    {
        $this->me_address = $me_address;
    }

    /**
     * @return mixed
     */
    public function getMeHotline()
    {
        return $this->me_hotline;
    }

    /**
     * @param mixed $me_hotline
     */
    public function setMeHotline($me_hotline)
    {
        $this->me_hotline = $me_hotline;
    }

    /**
     * @return mixed
     */
    public function getMeWebsite()
    {
        return $this->me_website;
    }

    /**
     * @param mixed $me_website
     */
    public function setMeWebsite($me_website)
    {
        $this->me_website = $me_website;
    }

    /**
     * @return mixed
     */
    public function getMeEmail()
    {
        return $this->me_email;
    }

    /**
     * @param mixed $me_email
     */
    public function setMeEmail($me_email)
    {
        $this->me_email = $me_email;
    }

    /**
     * @return mixed
     */
    public function getMeDistrict()
    {
        return $this->me_district;
    }

    /**
     * @param mixed $me_district
     */
    public function setMeDistrict($me_district)
    {
        $this->me_district = $me_district;
    }

    /**
     * @return mixed
     */
    public function getMeContPrsn()
    {
        return $this->me_cont_prsn;
    }

    /**
     * @param mixed $me_cont_prsn
     */
    public function setMeContPrsn($me_cont_prsn)
    {
        $this->me_cont_prsn = $me_cont_prsn;
    }

    /**
     * @return mixed
     */
    public function getMeContPrsnEmail()
    {
        return $this->me_cont_prsn_email;
    }

    /**
     * @param mixed $me_cont_prsn_email
     */
    public function setMeContPrsnEmail($me_cont_prsn_email)
    {
        $this->me_cont_prsn_email = $me_cont_prsn_email;
    }

    /**
     * @return mixed
     */
    public function getMeContPrsnDesig()
    {
        return $this->me_cont_prsn_desig;
    }

    /**
     * @param mixed $me_cont_prsn_desig
     */
    public function setMeContPrsnDesig($me_cont_prsn_desig)
    {
        $this->me_cont_prsn_desig = $me_cont_prsn_desig;
    }

    /**
     * @return mixed
     */
    public function getMeContPrsnTitle()
    {
        return $this->me_cont_prsn_title;
    }

    /**
     * @param mixed $me_cont_prsn_title
     */
    public function setMeContPrsnTitle($me_cont_prsn_title)
    {
        $this->me_cont_prsn_title = $me_cont_prsn_title;
    }

    /**
     * @return mixed
     */
    public function getMeCity()
    {
        return $this->me_city;
    }

    /**
     * @param mixed $me_city
     */
    public function setMeCity($me_city)
    {
        $this->me_city = $me_city;
    }

    /**
     * @return mixed
     */
    public function getMeNoOutlets()
    {
        return $this->me_no_outlets;
    }

    /**
     * @param mixed $me_no_outlets
     */
    public function setMeNoOutlets($me_no_outlets)
    {
        $this->me_no_outlets = $me_no_outlets;
    }

    /**
     * @return mixed
     */
    public function getMeCatId()
    {
        return $this->me_cat_id;
    }

    /**
     * @param mixed $me_cat_id
     */
    public function setMeCatId($me_cat_id)
    {
        $this->me_cat_id = $me_cat_id;
    }

    /**
     * @return mixed
     */
    public function getMeSeContPrsnTitle()
    {
        return $this->me_se_cont_prsn_title;
    }

    /**
     * @param mixed $me_se_cont_prsn_title
     */
    public function setMeSeContPrsnTitle($me_se_cont_prsn_title)
    {
        $this->me_se_cont_prsn_title = $me_se_cont_prsn_title;
    }

    /**
     * @return mixed
     */
    public function getMeSeContPrsn()
    {
        return $this->me_se_cont_prsn;
    }

    /**
     * @param mixed $me_se_cont_prsn
     */
    public function setMeSeContPrsn($me_se_cont_prsn)
    {
        $this->me_se_cont_prsn = $me_se_cont_prsn;
    }

    /**
     * @return mixed
     */
    public function getMeSeContPrsnDesig()
    {
        return $this->me_se_cont_prsn_desig;
    }

    /**
     * @param mixed $me_se_cont_prsn_desig
     */
    public function setMeSeContPrsnDesig($me_se_cont_prsn_desig)
    {
        $this->me_se_cont_prsn_desig = $me_se_cont_prsn_desig;
    }

    /**
     * @return mixed
     */
    public function getMeSeContPrsnPhone()
    {
        return $this->me_se_cont_prsn_phone;
    }

    /**
     * @param mixed $me_se_cont_prsn_phone
     */
    public function setMeSeContPrsnPhone($me_se_cont_prsn_phone)
    {
        $this->me_se_cont_prsn_phone = $me_se_cont_prsn_phone;
    }

    /**
     * @return mixed
     */
    public function getMeContPrsnPhone()
    {
        return $this->me_cont_prsn_phone;
    }

    /**
     * @param mixed $me_cont_prsn_phone
     */
    public function setMeContPrsnPhone($me_cont_prsn_phone)
    {
        $this->me_cont_prsn_phone = $me_cont_prsn_phone;
    }

    /**
     * @return mixed
     */
    public function getMeStatus()
    {
        return $this->me_status;
    }

    /**
     * @param mixed $me_status
     */
    public function setMeStatus($me_status)
    {
        $this->me_status = $me_status;
    }

    /**
     * @return mixed
     */
    public function getMeFeatured()
    {
        return $this->me_featured;
    }

    /**
     * @param mixed $me_featured
     */
    public function setMeFeatured($me_featured)
    {
        $this->me_featured = $me_featured;
    }

    /**
     * @return mixed
     */
    public function getMeOrder()
    {
        return $this->me_order;
    }

    /**
     * @param mixed $me_order
     */
    public function setMeOrder($me_order)
    {
        $this->me_order = $me_order;
    }


    public function checkMecharntName()
    {
        $myCon = new dbConfig();
        $myCon->connect();
        $query = "SELECT me_name FROM merchant WHERE me_name='" . $this->getMeName() . "'";
        $result = $myCon->query($query);
        if (mysqli_num_rows($result) >= 1) {
            throw new Exception('Sorry, Marchant name "' . $this->getMeName() . '" already in the database');
        }
    }

    public function checkMecharntNameOnUpdate()
    {
        $myCon = new dbConfig();

        $myCon->connect();
        $query = "SELECT me_name FROM merchant WHERE me_name='" . $this->getMeCatName() . "' AND "
            . "me_cat_id!='" . $this->getMeId() . "'";
        $result = $myCon->query($query);
        if (mysqli_num_rows($result) >= 1) {
            throw new Exception('Sorry, Main entry name "' . $this->getMeCatName() . '" already in the database');
        }
    }

    public function merchantSave()
    {
        $myCon = new dbConfig();

        $myCon->connect();
        $query = "INSERT INTO merchant (me_cat_id,me_sub_cat_id,me_name ,me_district,me_city,me_email,me_hotline,me_website,me_no_outlets,me_address,
                                        me_cont_prsn_title,me_cont_prsn_desig,me_cont_prsn,me_cont_prsn_phone,me_cont_prsn_email,                             
                                        me_se_cont_prsn_title,me_se_cont_prsn_desig,me_se_cont_prsn,me_se_cont_prsn_phone,me_se_cont_prsn_email,
                                        me_status,me_featured,me_order)
                         VALUES ('" . $this->getMeCatId() . "','" . $this->getMeSubCatId() . "','" . $this->getMeName() . "','" . $this->getMeDistrict() . "','" . $this->getMeCity() . "'
                         ,'" . $this->getMeEmail() . "','" . $this->getMeHotline() . "','" . $this->getMeWebsite() . "','" . $this->getMeNoOutlets() . "'
                         ,'" . $this->getMeAddress() . "','" . $this->getMeContPrsnTitle() . "','" . $this->getMeContPrsnDesig() . "','" . $this->getMeContPrsn() . "','" . $this->getMeContPrsnPhone() . "'
                         ,'" . $this->getMeContPrsnEmail() . "','" . $this->getMeSeContPrsnTitle() . "','" . $this->getMeSeContPrsnDesig() . "','" . $this->getMeSeContPrsn() . "',
                         '" . $this->getMeSeContPrsnPhone() . "','" . $this->getMeSeContPrsnEmail() . "','" . $this->getMeStatus() . "','" . $this->getMeFeatured() . "',
                         '" . $this->getMeOrder() . "')";

        $result = $myCon->query($query);
        if ($result) {
            $this->setMeId($myCon->mysqliInsertId());
            $myCon->closeCon();
            return TRUE;
        } else {
            throw new Exception(mysqli_error());
        }
    }
    public function merchantUpdate()
    {
        $myCon = new dbConfig();
        $myCon->connect();
        $query = "UPDATE merchant SET me_cat_id='" . $this->getMeCatId() . "',me_sub_cat_id='" . $this->getMeSubCatId() . "',me_name='" . $this->getMeName() . "' ,me_district='" . $this->getMeDistrict() . "',
                                      me_city='" . $this->getMeCity() . "',me_email='" . $this->getMeEmail() . "',me_hotline='" . $this->getMeHotline() . "',
                                      me_website='" . $this->getMeWebsite() . "',me_no_outlets='" . $this->getMeNoOutlets() . "',me_address='" . $this->getMeAddress() . "',
                                      me_cont_prsn_title='" . $this->getMeContPrsnTitle() . "',me_cont_prsn_desig='" . $this->getMeContPrsnDesig() . "',
                                      me_cont_prsn='" . $this->getMeContPrsn() . "',me_cont_prsn_phone='" . $this->getMeContPrsnPhone() . "',
                                      me_cont_prsn_email='" . $this->getMeContPrsnEmail() . "',me_se_cont_prsn_title='" . $this->getMeSeContPrsnTitle() . "',
                                      me_se_cont_prsn_desig='" . $this->getMeSeContPrsnDesig() . "',me_se_cont_prsn='" . $this->getMeSeContPrsn() . "',
                                      me_se_cont_prsn_phone='" . $this->getMeSeContPrsnPhone() . "',me_se_cont_prsn_email='" . $this->getMeSeContPrsnEmail() . "'
                                      WHERE me_id='" . $this->getMeId() . "'";
        $result = $myCon->query($query);
        if ($result) {
            return true;
        } else {
            throw new Exception(mysqli_error());
        }
    }

    public function merchantDelete()
    {
        $myCon = new dbConfig();
        $myCon->connect();

        $query = "UPDATE merchant SET me_status='" . $this->getMeStatus() . "' WHERE me_id='" . $this->getMeId() . "'";
        $result = $myCon->query($query);
        if ($result) {
            $querylogin = "UPDATE me_login SET user_status='" . $this->getMeStatus() . "' WHERE me_id='" . $this->getMeId() . "'";
            $resultlogin = $myCon->query($querylogin);
            if ($resultlogin) {
                return true;
            }
        } else {
            throw new Exception(mysqli_error());
        }
    }

    public function merchantTop()
    {
        $myCon = new dbConfig();
        $myCon->connect();

        $query = "UPDATE merchant SET me_featured='" . $this->getMeFeatured() . "' WHERE me_id='" . $this->getMeId() . "'";
        $result = $myCon->query($query);
        if ($result) {
            return true;
        } else {
            throw new Exception(mysqli_error());
        }
    }

    public function checkMerchantLogin()
    {
        $myCon = new dbConfig();
        $myCon->connect();
        $query = "SELECT user_id FROM me_login WHERE user_id='" . $this->getUserId() . "'";
        $result = $myCon->query($query);
        if (mysqli_num_rows($result) >= 1) {
            throw new Exception('Sorry, User ID "' . $this->getMeName() . '" already in the database');
        }
    }

    public function addMerchantLogin()
    {
        $myCon = new dbConfig();
        $myCon->connect();
        $query = "INSERT INTO me_login(me_id,out_id,user_id,user_pword,user_status,user_type) 
                VALUES('" . $this->getMeId() . "','" . $this->getOutId() . "','" . $this->getUserId() . "','" . $this->getUserPword() . "',
                       '" . $this->getUserStatus() . "','" . $this->getUserType() . "')";
        $result = $myCon->query($query);
        if ($result) {
            return true;
        } else {
            throw new Exception(mysqli_error());
        }

    }

    public function updateMerchantLogin()
    {
        $myCon = new dbConfig();
        $myCon->connect();
        $query = "UPDATE me_login
                  SET me_id='" . $this->getMeId() . "',out_id='" . $this->getOutId() . "',
                      user_id='" . $this->getUserId() . "',user_pword='" . $this->getUserPword() . "',
                      user_type='" . $this->getUserType() . "' WHERE me_log_id='" . $this->getMeLogId() . "'";
        $result = $myCon->query($query);
        if ($result) {
            return true;
        } else {
            throw new Exception(mysqli_error());
        }
    }

    public function merchantLoginDelete()
    {
        $myCon = new dbConfig();
        $myCon->connect();

        $query = "UPDATE me_login SET user_status='" . $this->getUserStatus() . "' WHERE me_log_id='" . $this->getMeLogId() . "'";

        $result = $myCon->query($query);
        if ($result) {
            return true;
        } else {
            throw new Exception(mysqli_error());
        }
    }
}