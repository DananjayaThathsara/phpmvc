<?php

class outletClass
{
    private $out_id;
    private $me_id;
    private $out_district;
    private $out_city;
    private $out_hotline;
    private $out_email;
    private $out_address;
    private $out_log_lat;
    private $out_cont_prsn;
    private $out_cont_prsn_title;
    private $out_cont_prsn_desig;
    private $out_cont_prsn_mobile;
    private $out_cont_prsn_email;
    private $out_status;

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
    public function getOutDistrict()
    {
        return $this->out_district;
    }
    /**
     * @param mixed $out_district
     */
    public function setOutDistrict($out_district)
    {
        $this->out_district = $out_district;
    }
    /**
     * @return mixed
     */
    public function getOutCity()
    {
        return $this->out_city;
    }
    /**
     * @param mixed $out_city
     */
    public function setOutCity($out_city)
    {
        $this->out_city = $out_city;
    }
    /**
     * @return mixed
     */
    public function getOutHotline()
    {
        return $this->out_hotline;
    }
    /**
     * @param mixed $out_hotline
     */
    public function setOutHotline($out_hotline)
    {
        $this->out_hotline = $out_hotline;
    }
    /**
     * @return mixed
     */
    public function getOutEmail()
    {
        return $this->out_email;
    }
    /**
     * @param mixed $out_email
     */
    public function setOutEmail($out_email)
    {
        $this->out_email = $out_email;
    }
    /**
     * @return mixed
     */
    public function getOutAddress()
    {
        return $this->out_address;
    }
    /**
     * @param mixed $out_address
     */
    public function setOutAddress($out_address)
    {
        $this->out_address = $out_address;
    }
    /**
     * @return mixed
     */
    public function getOutLogLat()
    {
        return $this->out_log_lat;
    }
    /**
     * @param mixed $out_log_lat
     */
    public function setOutLogLat($out_log_lat)
    {
        $this->out_log_lat = $out_log_lat;
    }
    /**
     * @return mixed
     */
    public function getOutContPrsn()
    {
        return $this->out_cont_prsn;
    }
    /**
     * @param mixed $out_cont_prsn
     */
    public function setOutContPrsn($out_cont_prsn)
    {
        $this->out_cont_prsn = $out_cont_prsn;
    }
    /**
     * @return mixed
     */
    public function getOutContPrsnTitle()
    {
        return $this->out_cont_prsn_title;
    }
    /**
     * @param mixed $out_cont_prsn_title
     */
    public function setOutContPrsnTitle($out_cont_prsn_title)
    {
        $this->out_cont_prsn_title = $out_cont_prsn_title;
    }
    /**
     * @return mixed
     */
    public function getOutContPrsnDesig()
    {
        return $this->out_cont_prsn_desig;
    }
    /**
     * @param mixed $out_cont_prsn_desig
     */
    public function setOutContPrsnDesig($out_cont_prsn_desig)
    {
        $this->out_cont_prsn_desig = $out_cont_prsn_desig;
    }
    /**
     * @return mixed
     */
    public function getOutContPrsnMobile()
    {
        return $this->out_cont_prsn_mobile;
    }
    /**
     * @param mixed $out_cont_prsn_mobile
     */
    public function setOutContPrsnMobile($out_cont_prsn_mobile)
    {
        $this->out_cont_prsn_mobile = $out_cont_prsn_mobile;
    }
    /**
     * @return mixed
     */
    public function getOutContPrsnEmail()
    {
        return $this->out_cont_prsn_email;
    }
    /**
     * @param mixed $out_cont_prsn_email
     */
    public function setOutContPrsnEmail($out_cont_prsn_email)
    {
        $this->out_cont_prsn_email = $out_cont_prsn_email;
    }
    /**
     * @return mixed
     */
    public function getOutStatus()
    {
        return $this->out_status;
    }
    /**
     * @param mixed $out_status
     */
    public function setOutStatus($out_status)
    {
        $this->out_status = $out_status;
    }


    public function outletSave()
    {
        $mycon = new dbConfig();
        $mycon->connect();
        $query = "INSERT INTO outlets(me_id,out_district,out_city,out_hotline,out_email,out_address,out_log_lat,
                                      out_cont_prsn,out_cont_prsn_title,out_cont_prsn_desig,out_cont_prsn_mobile,
                                      out_cont_prsn_email,out_status)
                  VALUES ('" . $this->getMeId() . "','" . $this->getOutDistrict()."',
                          '" . $this->getOutCity()."','" . $this->getOutHotline()."','" . $this->getOutEmail()."',
                          '" . $this->getOutAddress()."','" . $this->getOutLogLat()."','" . $this->getOutContPrsn()."',
                          '" . $this->getOutContPrsnTitle()."','" . $this->getOutContPrsnDesig()."','".$this->getOutContPrsnMobile()."',
                          '" . $this->getOutContPrsnEmail()."','" . $this->getOutStatus()."') ";

        $result = $mycon->query($query);
        if ($result) {
            return TRUE;
        } else {
            throw new Exception(mysqli_error());
        }
    }
    public function outletUpdate()
    {
        $mycon = new dbConfig();
        $mycon->connect();
        $query = "UPDATE outlets SET me_id='" . $this->getMeId() . "',out_district='" . $this->getOutDistrict()."',
                         out_city='" . $this->getOutCity()."',out_hotline='" . $this->getOutHotline()."',
                         out_email='" . $this->getOutEmail()."',out_address='" . $this->getOutAddress()."',out_log_lat='" . $this->getOutLogLat()."',
                         out_cont_prsn='" . $this->getOutContPrsn()."',out_cont_prsn_title='" . $this->getOutContPrsnTitle()."',
                         out_cont_prsn_desig='" . $this->getOutContPrsnDesig()."',out_cont_prsn_mobile='".$this->getOutContPrsnMobile()."',
                         out_cont_prsn_email= '" . $this->getOutContPrsnEmail()."'
                  WHERE out_id='".$this->getOutId()."' ";

        $result = $mycon->query($query);
        if ($result) {
            return TRUE;
        } else {
            throw new Exception(mysqli_error());
        }
    }
    public function outletDelete()
    {
        $myCon = new dbConfig();
        $myCon->connect();

        $query = "UPDATE outlets SET out_status='" . $this->getOutStatus() . "' WHERE out_id='" . $this->getOutId() . "'";
        $result = $myCon->query($query);
        if ($result) {
            return true;
        } else {
            throw new Exception(mysqli_error());
        }
    }

}