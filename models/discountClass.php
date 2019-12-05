<?php

/**
 * Created by PhpStorm.
 * User: Nethweb
 * Date: 9/22/2018
 * Time: 12:11 AM
 */
class discountClass
{
    private $me_dis_id;
    private $me_dis_rate;
    private $me_dis_dsp;
    private $me_id;
    private $dis_status;

    /**
     * @return mixed
     */
    public function getDisStatus()
    {
        return $this->dis_status;
    }

    /**
     * @param mixed $dis_status
     */
    public function setDisStatus($dis_status)
    {
        $this->dis_status = $dis_status;
    }

    /**
     * @return mixed
     */
    public function getMeDisId()
    {
        return $this->me_dis_id;
    }

    /**
     * @param mixed $me_dis_id
     */
    public function setMeDisId($me_dis_id)
    {
        $this->me_dis_id = $me_dis_id;
    }

    /**
     * @return mixed
     */
    public function getMeDisRate()
    {
        return $this->me_dis_rate;
    }

    /**
     * @param mixed $me_dis_rate
     */
    public function setMeDisRate($me_dis_rate)
    {
        $this->me_dis_rate = $me_dis_rate;
    }

    /**
     * @return mixed
     */
    public function getMeDisDsp()
    {
        return $this->me_dis_dsp;
    }

    /**
     * @param mixed $me_dis_dsp
     */
    public function setMeDisDsp($me_dis_dsp)
    {
        $this->me_dis_dsp = $me_dis_dsp;
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

public  function checkMerchant(){
    $mycon = new dbConfig();
    $mycon->connect();
    $query="SELECT me_id FROM discounts WHERE me_id='".$this->getMeId()."'";
    $result=$mycon->query($query);
    $count=mysqli_num_rows($result);
    if($count>=1){

    return true;
    }

}
    public function disSave()
    {
        $mycon = new dbConfig();
        $mycon->connect();
        if($this->checkMerchant()){
            echo('<div class="alert alert-danger col-md-10" role="alert">  '
                . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                . '<span aria-hidden="true">&times;</span></button>You Already set discount to this merchant.Please Update it.</div>');
        }else{

        $query = "INSERT INTO discounts (me_dis_rate,me_dis_dsp,me_id,dis_status) 
                VALUES ('" . $this->getMeDisRate() . "','" . $this->getMeDisDsp() . "','" . $this->getMeId() . "','" . $this->getDisStatus() . "')";
        $result = $mycon->query($query);
        if ($result) {
            return true;
        } else {
            throw new Exception(mysqli_error());
        }}

    }
    public function disUpdate()
    {
        $mycon = new dbConfig();
        $mycon->connect();
        $query = "UPDATE discounts SET me_dis_rate='" . $this->getMeDisRate() . "',me_dis_dsp='" . $this->getMeDisDsp() . "',me_id='" . $this->getMeId() . "'
              WHERE me_dis_id='" . $this->getMeDisId() . "'";
        $result = $mycon->query($query);
        if ($result) {
            return true;
        } else {
            throw new Exception(mysqli_error());
        }

    }

    public function disDelete()
    {
        $mycon = new dbConfig();
        $mycon->connect();
        $query = "UPDATE discounts SET dis_status='" . $this->getDisStatus() . "' WHERE me_dis_id='" . $this->getMeDisId() . "'";
        $result = $mycon->query($query);
        if ($result) {
            return true;
        } else {
            throw new Exception(mysqli_error());
        }

    }
}