<?php

/**
 * Created by PhpStorm.
 * User: Nethweb
 * Date: 9/16/2018
 * Time: 7:49 PM
 */
include_once '../models/emailTemplates.php';

class memberClass
{
    private $mem_id;
    private $mem_name;
    private $mem_cmp_name;
    private $mem_cmp_loc_city;
    private $mem_living_city;
    private $mem_living_district;
    private $mem_tel;
    private $mem_mobile_phone;
    private $mem_designation;
    private $mem_email;
    private $mem_address;
    private $mem_gender;
    private $mem_bdate;
    private $mem_nic;
    private $mem_civil_status;
    private $gen_card_id;
    private $gen_card_status;
    private $mem_pword;
    private $mem_status;
    private $mem_user_name;
    private $mem_login_status;
    private $mem_type;
    private $mem_spo_name;
    private $mem_spo_bdate;
    private $mem_spo_nic;
    private $mem_spo_designation;
    private $mem_spo_cmp_name;
    private $mem_ch_name;
    private $mem_ch_gender;
    private $mem_ch_bdate;
    private $mem_ch_status;
    private $form_id;
    private $mem_f_name;
    private $mem_l_name;
    private $mem_spo_tel;

    /**
     * @return mixed
     */
    public function getMemSpoTel()
    {
        return $this->mem_spo_tel;
    }

    /**
     * @param mixed $mem_spo_tel
     */
    public function setMemSpoTel($mem_spo_tel)
    {
        $this->mem_spo_tel = $mem_spo_tel;
    }


    /**
     * @return mixed
     */
    public function getMemFName()
    {
        return $this->mem_f_name;
    }

    /**
     * @param mixed $mem_f_name
     */
    public function setMemFName($mem_f_name)
    {
        $this->mem_f_name = $mem_f_name;
    }

    /**
     * @return mixed
     */
    public function getMemLName()
    {
        return $this->mem_l_name;
    }

    /**
     * @param mixed $mem_l_name
     */
    public function setMemLName($mem_l_name)
    {
        $this->mem_l_name = $mem_l_name;
    }


    /**
     * @return mixed
     */
    public function getFormId()
    {
        return $this->form_id;
    }

    /**
     * @param mixed $form_id
     */
    public function setFormId($form_id)
    {
        $this->form_id = $form_id;
    }


    /**
     * @return mixed
     */
    public function getMemSpoName()
    {
        return $this->mem_spo_name;
    }

    /**
     * @param mixed $mem_spo_name
     */
    public function setMemSpoName($mem_spo_name)
    {
        $this->mem_spo_name = $mem_spo_name;
    }

    /**
     * @return mixed
     */
    public function getMemSpoBdate()
    {
        return $this->mem_spo_bdate;
    }

    /**
     * @param mixed $mem_spo_bdate
     */
    public function setMemSpoBdate($mem_spo_bdate)
    {
        $this->mem_spo_bdate = $mem_spo_bdate;
    }

    /**
     * @return mixed
     */
    public function getMemSpoNic()
    {
        return $this->mem_spo_nic;
    }

    /**
     * @param mixed $mem_spo_nic
     */
    public function setMemSpoNic($mem_spo_nic)
    {
        $this->mem_spo_nic = $mem_spo_nic;
    }

    /**
     * @return mixed
     */
    public function getMemSpoDesignation()
    {
        return $this->mem_spo_designation;
    }

    /**
     * @param mixed $mem_spo_designation
     */
    public function setMemSpoDesignation($mem_spo_designation)
    {
        $this->mem_spo_designation = $mem_spo_designation;
    }

    /**
     * @return mixed
     */
    public function getMemSpoCmpName()
    {
        return $this->mem_spo_cmp_name;
    }

    /**
     * @param mixed $mem_spo_cmp_name
     */
    public function setMemSpoCmpName($mem_spo_cmp_name)
    {
        $this->mem_spo_cmp_name = $mem_spo_cmp_name;
    }

    /**
     * @return mixed
     */
    public function getMemChName()
    {
        return $this->mem_ch_name;
    }

    /**
     * @param mixed $mem_ch_name
     */
    public function setMemChName($mem_ch_name)
    {
        $this->mem_ch_name = $mem_ch_name;
    }

    /**
     * @return mixed
     */
    public function getMemChGender()
    {
        return $this->mem_ch_gender;
    }

    /**
     * @param mixed $mem_ch_gender
     */
    public function setMemChGender($mem_ch_gender)
    {
        $this->mem_ch_gender = $mem_ch_gender;
    }

    /**
     * @return mixed
     */
    public function getMemChBdate()
    {
        return $this->mem_ch_bdate;
    }

    /**
     * @param mixed $mem_ch_bdate
     */
    public function setMemChBdate($mem_ch_bdate)
    {
        $this->mem_ch_bdate = $mem_ch_bdate;
    }

    /**
     * @return mixed
     */
    public function getMemChStatus()
    {
        return $this->mem_ch_status;
    }

    /**
     * @param mixed $mem_ch_status
     */
    public function setMemChStatus($mem_ch_status)
    {
        $this->mem_ch_status = $mem_ch_status;
    }


    /**
     * @return mixed
     */
    public function getMemUserName()
    {
        return $this->mem_user_name;
    }

    /**
     * @param mixed $mem_user_name
     */
    public function setMemUserName($mem_user_name)
    {
        $this->mem_user_name = $mem_user_name;
    }

    /**
     * @return mixed
     */
    public function getMemLoginStatus()
    {
        return $this->mem_login_status;
    }

    /**
     * @param mixed $mem_login_status
     */
    public function setMemLoginStatus($mem_login_status)
    {
        $this->mem_login_status = $mem_login_status;
    }

    /**
     * @return mixed
     */
    public function getMemType()
    {
        return $this->mem_type;
    }

    /**
     * @param mixed $mem_type
     */
    public function setMemType($mem_type)
    {
        $this->mem_type = $mem_type;
    }

    /**
     * @return mixed
     */
    public function getMemStatus()
    {
        return $this->mem_status;
    }

    /**
     * @param mixed $mem_status
     */
    public function setMemStatus($mem_status)
    {
        $this->mem_status = $mem_status;
    }

    /**
     * @return mixed
     */
    public function getMemPword()
    {
        return $this->mem_pword;
    }

    /**
     * @param mixed $mem_pword
     */
    public function setMemPword($mem_pword)
    {
        $this->mem_pword = $mem_pword;
    }

    /**
     * @return mixed
     */
    public function getMemId()
    {
        return $this->mem_id;
    }

    /**
     * @param mixed $mem_id
     */
    public function setMemId($mem_id)
    {
        $this->mem_id = $mem_id;
    }

    /**
     * @return mixed
     */
    public function getMemName()
    {
        return $this->mem_name;
    }

    /**
     * @param mixed $mem_name
     */
    public function setMemName($mem_name)
    {
        $this->mem_name = $mem_name;
    }

    /**
     * @return mixed
     */
    public function getMemCmpName()
    {
        return $this->mem_cmp_name;
    }

    /**
     * @param mixed $mem_cmp_name
     */
    public function setMemCmpName($mem_cmp_name)
    {
        $this->mem_cmp_name = $mem_cmp_name;
    }

    /**
     * @return mixed
     */
    public function getMemCmpLocCity()
    {
        return $this->mem_cmp_loc_city;
    }

    /**
     * @param mixed $mem_cmp_loc_city
     */
    public function setMemCmpLocCity($mem_cmp_loc_city)
    {
        $this->mem_cmp_loc_city = $mem_cmp_loc_city;
    }

    /**
     * @return mixed
     */
    public function getMemLivingCity()
    {
        return $this->mem_living_city;
    }

    /**
     * @param mixed $mem_living_city
     */
    public function setMemLivingCity($mem_living_city)
    {
        $this->mem_living_city = $mem_living_city;
    }

    /**
     * @return mixed
     */
    public function getMemLivingDistrict()
    {
        return $this->mem_living_district;
    }

    /**
     * @param mixed $mem_living_district
     */
    public function setMemLivingDistrict($mem_living_district)
    {
        $this->mem_living_district = $mem_living_district;
    }

    /**
     * @return mixed
     */
    public function getMemTel()
    {
        return $this->mem_tel;
    }

    /**
     * @param mixed $mem_tel
     */
    public function setMemTel($mem_tel)
    {
        $this->mem_tel = $mem_tel;
    }

    /**
     * @return mixed
     */
    public function getMemMobilePhone()
    {
        return $this->mem_mobile_phone;
    }

    /**
     * @param mixed $mem_mobile_phone
     */
    public function setMemMobilePhone($mem_mobile_phone)
    {
        $this->mem_mobile_phone = $mem_mobile_phone;
    }

    /**
     * @return mixed
     */
    public function getMemDesignation()
    {
        return $this->mem_designation;
    }

    /**
     * @param mixed $mem_designation
     */
    public function setMemDesignation($mem_designation)
    {
        $this->mem_designation = $mem_designation;
    }

    /**
     * @return mixed
     */
    public function getMemEmail()
    {
        return $this->mem_email;
    }

    /**
     * @param mixed $mem_email
     */
    public function setMemEmail($mem_email)
    {
        $this->mem_email = $mem_email;
    }

    /**
     * @return mixed
     */
    public function getMemAddress()
    {
        return $this->mem_address;
    }

    /**
     * @param mixed $mem_address
     */
    public function setMemAddress($mem_address)
    {
        $this->mem_address = $mem_address;
    }

    /**
     * @return mixed
     */
    public function getMemGender()
    {
        return $this->mem_gender;
    }

    /**
     * @param mixed $mem_gender
     */
    public function setMemGender($mem_gender)
    {
        $this->mem_gender = $mem_gender;
    }

    /**
     * @return mixed
     */
    public function getMemBdate()
    {
        return $this->mem_bdate;
    }

    /**
     * @param mixed $mem_bdate
     */
    public function setMemBdate($mem_bdate)
    {
        $this->mem_bdate = $mem_bdate;
    }

    /**
     * @return mixed
     */
    public function getMemNic()
    {
        return $this->mem_nic;
    }

    /**
     * @param mixed $mem_nic
     */
    public function setMemNic($mem_nic)
    {
        $this->mem_nic = $mem_nic;
    }

    /**
     * @return mixed
     */
    public function getMemCivilStatus()
    {
        return $this->mem_civil_status;
    }

    /**
     * @param mixed $mem_civil_status
     */
    public function setMemCivilStatus($mem_civil_status)
    {
        $this->mem_civil_status = $mem_civil_status;
    }

    /**
     * @return mixed
     */
    public function getGenCardId()
    {
        return $this->gen_card_id;
    }

    /**
     * @param mixed $gen_card_id
     */
    public function setGenCardId($gen_card_id)
    {
        $this->gen_card_id = $gen_card_id;
    }

    /**
     * @return mixed
     */
    public function getGenCardStatus()
    {
        return $this->gen_card_status;
    }

    /**
     * @param mixed $gen_card_status
     */
    public function setGenCardStatus($gen_card_status)
    {
        $this->gen_card_status = $gen_card_status;
    }

    public function checkUser()
    {
        $myCon = new dbConfig();
        $myCon->connect();
        $query = "SELECT mem_email FROM member WHERE  mem_nic='" . $this->getMemNic() . "'";
        $result = $myCon->query($query);
        if (mysqli_num_rows($result) >= 1) {
            throw new Exception('Sorry, you are already in the database');
        }
    }

    public function getAvailableCardNumber()
    {
        $myCon = new dbConfig();
        $myCon->connect();
        $query = "SELECT gen_card_id  FROM cards WHERE  gen_card_status='INACTIVE' order by gen_card_id limit 1";
        $result = $myCon->query($query);
        while ($row = mysqli_fetch_assoc($result)) {
            return $row['gen_card_id'];
        }
    }
    public function setAvailableCardToIssued($card_id)
    {
        $myCon = new dbConfig();
        $myCon->connect();
        $gen_card_id = $card_id;
        $query = "UPDATE cards SET  gen_card_status ='issued' WHERE gen_card_id='" . $gen_card_id . "' ";
        $result = $myCon->query($query);
        if ($result) {
            return true;
        } else {
            throw new Exception(mysqli_error());
        }

    }
    public function addMemLogin(){
        $myCon = new dbConfig();
        $myCon->connect();
        $queryMemLogin = "INSERT INTO mem_login (mem_user_name,mem_id,mem_pword,mem_login_status,mem_type)
                              VALUES ('" . $this->getGenCardId() . "','" . $this->getMemId() . "','" . $this->getMemPword() . "','active','user')";
        $resultMemLogin = $myCon->query($queryMemLogin);
        if ($resultMemLogin) {
        } else {
            throw new Exception(mysqli_error());
        }
    }
    public function addToCardActive(){
        $myCon = new dbConfig();
        $myCon->connect();
        $issue_date = '2018-12-01';
        $ex_date = '2021-04-30';
        $queryCard = "INSERT INTO card_active (card_id,issue_date,ex_date,mem_id,card_status)
                       VALUES ('" . $this->getGenCardId() . "','" . $issue_date . "','" . $ex_date . "','" . $this->getMemId() . "','active')";

        $resultCard = $myCon->query($queryCard);
        if ($resultCard) {
        } else {
            throw new Exception(mysqli_error());
        }
    }
    public function addChildren(){
        $myCon = new dbConfig();
        $myCon->connect();
        $queryCh = "INSERT INTO mem_children (mem_ch_name,mem_ch_gender,mem_ch_bdate,mem_id,mem_ch_status)
                       VALUES ('" . $this->getMemChName() . "','" . $this->getMemChGender() . "','" . $this->getMemChBdate() . "','" . $this->getMemId() . "','active')";

        $resultCh = $myCon->query($queryCh);
        if ($resultCh) {
        } else {
            throw new Exception(mysqli_error());
        }
    }
    public function updateChildren(){
        $myCon = new dbConfig();
        $myCon->connect();
        $queryCh = "UPDATE  mem_children 
                    SET  mem_ch_name='" . $this->getMemChName() . "',
                    mem_ch_gender='" . $this->getMemChGender() . "',
                    mem_ch_bdate='" . $this->getMemChBdate() . "' WHERE mem_id='".$this->getMemId()."'";
        $resultCh = $myCon->query($queryCh);
        if ($resultCh) {
        } else {
            throw new Exception(mysqli_error());
        }
    }
    public  function checkChildren(){
        $myCon = new dbConfig();
        $myCon->connect();
        $queryCh = "SELECT * FROM mem_children WHERE mem_id='".$this->getMemId()."' AND mem_ch_status='active'";
        $resultCh = $myCon->query($queryCh);
        $countCh=mysqli_num_rows($resultCh);
        if($countCh >=1){
            return true;
        }
        else {
            return false;
        }
    }
    public function genPassword($len = 6)
    {
        $r = '';
        for ($i = 0; $i < $len; $i++)
            $r .= chr(rand(0, 25) + ord('a'));
        return $r;
    }

    public function addMember()
    {
        $myCon = new dbConfig();
        $myCon->connect();
        $emailObj = new emailTemplates();
        $this->checkUser();
        $query = "INSERT INTO member(form_id,mem_f_name,mem_l_name,mem_designation,
                                     mem_living_city,mem_living_district,mem_tel,mem_email,
                                     mem_address,mem_gender,mem_bdate,mem_nic,
                                     mem_civil_status,mem_cmp_name,mem_cmp_loc_city,mem_spo_name,
                                     mem_spo_bdate,mem_spo_nic,mem_spo_tel,mem_spo_designation,
                                     mem_spo_cmp_name,mem_status) 
                  VALUES ('" . $this->getFormId() . "','" . $this->getMemFName() . "','" . $this->getMemLName() . "','" . $this->getMemDesignation() . "',
                          '" . $this->getMemLivingCity() . "','" . $this->getMemLivingDistrict() . "','" . $this->getMemTel() . "','" . $this->getMemEmail() . "',
                          '" . $this->getMemAddress() . "','" . $this->getMemGender() . "','" . $this->getMemBdate() . "','" . $this->getMemNic() . "',
                          '" . $this->getMemCivilStatus() . "','" . $this->getMemCmpName() . "' ,'" . $this->getMemCmpLocCity() . "','" . $this->getMemSpoName() . "',
                          '" . $this->getMemSpoBdate() . "','" . $this->getMemSpoNic() . "','" . $this->getMemSpoTel() . "','" . $this->getMemSpoDesignation() . "',
                          '" . $this->getMemSpoCmpName() . "','" . $this->getMemStatus() . "')";

        $result = $myCon->query($query);
        if ($result) {
            $this->setMemId($myCon->mysqliInsertId());
            $emailObj->sendWelcomeEmail($myCon->mysqliInsertId(),$this->getMemEmail());
            return true;
        } else {
            throw new Exception(mysqli_error());
        }
    }
    public function updateMember()
    {
        $myCon = new dbConfig();
        $myCon->connect();
        $query = "UPDATE  member SET form_id='" . $this->getFormId() . "',mem_f_name='" . $this->getMemFName() . "',mem_l_name='" . $this->getMemLName() . "',mem_designation='" . $this->getMemDesignation() . "',
                                     mem_living_city=  '" . $this->getMemLivingCity() . "',mem_living_district='" . $this->getMemLivingDistrict() . "',mem_tel='" . $this->getMemTel() . "',mem_email='" . $this->getMemEmail() . "',
                                     mem_address='" . $this->getMemAddress() . "',mem_gender='" . $this->getMemGender() . "',
                                     mem_bdate='" . $this->getMemBdate() . "',mem_nic='" . $this->getMemNic() . "',
                                     mem_civil_status='" . $this->getMemCivilStatus() . "',mem_cmp_name='" . $this->getMemCmpName() . "',
                                     mem_cmp_loc_city='" . $this->getMemCmpLocCity() . "',mem_spo_name='" . $this->getMemSpoName() . "',
                                     mem_spo_bdate='" . $this->getMemSpoBdate() . "',mem_spo_nic='" . $this->getMemSpoNic() . "',
                                     mem_spo_tel='" . $this->getMemSpoTel() . "',mem_spo_designation='" . $this->getMemSpoDesignation() . "',
                                     mem_spo_cmp_name='" . $this->getMemSpoCmpName() . "' WHERE mem_id='".$this->getMemId()."' AND mem_status='active'";

        $result = $myCon->query($query);
        if ($result) {
            return true;
        } else {
            throw new Exception(mysqli_error());
        }
    }
    public function deleteMember()
    {
        $myCon = new dbConfig();
        $myCon->connect();

        $query = "UPDATE member SET mem_status='" . $this->getMemStatus() . "' WHERE mem_id='" . $this->getMemId() . "'";
        $result = $myCon->query($query);
        if ($result) {
            $querylogin = "UPDATE mem_login SET mem_login_status='deactive' WHERE mem_id='" . $this->getMemId() . "'";
            $resultlogin = $myCon->query($querylogin);
            if ($resultlogin) {
                return true;
            }
        } else {
            throw new Exception(mysqli_error());
        }
    }


}

