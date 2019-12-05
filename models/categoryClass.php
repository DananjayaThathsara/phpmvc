<?php

/**
 * Created by PhpStorm.
 * User: Nethweb
 * Date: 9/7/2018
 * Time: 1:00 PM
 */
class categoryClass
{
    private $me_cat_id;
    private $me_cat_name;
    private $me_cat_status;
    private $me_sub_cat_id;
    private $me_sub_cat_name;
    private $me_sub_cat_status;

    /**
     * @return mixed
     */
    public function getMeSubCatStatus()
    {
        return $this->me_sub_cat_status;
    }
    /**
     * @param mixed $me_sub_cat_status
     */
    public function setMeSubCatStatus($me_sub_cat_status)
    {
        $this->me_sub_cat_status = $me_sub_cat_status;
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
    public function getMeSubCatName()
    {
        return $this->me_sub_cat_name;
    }
    /**
     * @param mixed $me_sub_cat_name
     */
    public function setMeSubCatName($me_sub_cat_name)
    {
        $this->me_sub_cat_name = $me_sub_cat_name;
    }
    /**
     * @return mixed
     */
    public function getMeCatStatus()
    {
        return $this->me_cat_status;
    }
    /**
     * @param mixed $me_cat_status
     */
    public function setMeCatStatus($me_cat_status)
    {
        $this->me_cat_status = $me_cat_status;
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
    public function getMeCatName()
    {
        return $this->me_cat_name;
    }
    /**
     * @param mixed $me_cat_name
     */

    public function setMeCatName($me_cat_name)
    {
        $this->me_cat_name = $me_cat_name;
    }
    public function checkImageExist(){
        $myCon = new dbConfig();
        $myCon->connect();
        $query = "SELECT img_path FROM images WHERE ref_id='" . $this->getMeCatId() . "' AND img_type_id=4";
        $result = $myCon->query($query);
        if (mysqli_num_rows($result) >= 1) {
            return true;
        }else{
            return false;
        }
    }
    public function checkCatName()
    {
        $myCon = new dbConfig();
        $myCon->connect();
        $query = "SELECT me_cat_name FROM me_category WHERE me_cat_name='" . $this->getMeCatName() . "'";
        $result = $myCon->query($query);
        if (mysqli_num_rows($result) >= 1) {
            throw new Exception('Sorry, Category name "' . $this->getMeCatName() . '" already in the database');
        }
    }
    public function checkSubCatName()
    {
        $myCon = new dbConfig();
        $myCon->connect();
        $query = "SELECT me_sub_cat_name FROM me_sub_category WHERE me_sub_cat_name='" . $this->getMeSubCatName() . "' AND me_cat_id='" . $this->getMeCatId() . "'";
        $result = $myCon->query($query);
        if (mysqli_num_rows($result) >= 1) {
            throw new Exception('Sorry, Category name "' . $this->getMeCatName() . '" already in the database');
        }
    }
    public function checkCatNameOnUpdate()
    {
        $myCon = new dbConfig();
        $myCon->connect();
        $query = "SELECT me_cat_name FROM me_category WHERE me_cat_name='" . $this->getMeCatName() . "' AND "
            . "me_cat_id!='" . $this->getMeCatId() . "'";
        $result = $myCon->query($query);
        if (mysqli_num_rows($result) >= 1) {
            throw new Exception('Sorry, Main entry name "' . $this->getCat_name() . '" already in the database');
        }
    }
    public function catSave()
    {
        $myCon = new dbConfig();
        $myCon->connect();
        $this->checkCatName();
        $query = "INSERT INTO me_category (me_cat_name,me_cat_status) VALUES ('" . $this->getMeCatName() . "','" . $this->getMeCatStatus() . "')";
        $result = $myCon->query($query);
        if ($result) {
            $this->setMeCatId($myCon->mysqliInsertId());
            return true;
        } else {
            throw new Exception(mysqli_error());
        }
    }
    public function catUpdate()
    {
        $myCon = new dbConfig();
        $myCon->connect();
        $this->checkCatNameOnUpdate();
        $query = "UPDATE me_category SET me_cat_name='" . $this->getMeCatName() . "' WHERE me_cat_id='" . $this->getMeCatId() . "'";

        $result = $myCon->query($query);
        if ($result) {
            return true;
        } else {
            throw new Exception(mysqli_error());
        }
    }
    public function catDelete()
    {
        $myCon = new dbConfig();
        $myCon->connect();

        $query = "UPDATE me_category SET me_cat_status='" . $this->getMeCatStatus() . "' WHERE me_cat_id='" . $this->getMeCatId() . "'";
        $result = $myCon->query($query);
        if ($result) {
            return true;
        } else {
            throw new Exception(mysqli_error());
        }
    }
    public function saveSubCat()
    {
        $myCon = new dbConfig();
        $myCon->connect();
        $this->checkSubCatName();
        $query = "INSERT INTO me_sub_category (me_sub_cat_name,me_cat_id,me_sub_cat_status) VALUES ('" . $this->getMeSubCatName() . "','" . $this->getMeCatId() . "','active')";
        $result = $myCon->query($query);
        if ($result) {
            return true;
        } else {
            throw new Exception(mysqli_error());
        }
    }
    public function subCatUpdate()
    {
        $myCon = new dbConfig();
        $myCon->connect();
        $query = "UPDATE me_sub_category SET me_sub_cat_name='" . $this->getMeSubCatName() . "',me_cat_id='".$this->getMeCatId()."' WHERE me_sub_cat_id='" . $this->getMeSubCatId() . "'";
        $result = $myCon->query($query);
        if ($result) {
            return true;
        } else {
            throw new Exception(mysqli_error());
        }
    }
    public function subCatDelete()
    {
        $myCon = new dbConfig();
        $myCon->connect();

        $query = "UPDATE me_sub_category SET me_sub_cat_status='" . $this->getMeSubCatStatus() . "' WHERE me_sub_cat_id='" . $this->getMeSubCatId() . "'";
        $result = $myCon->query($query);
        if ($result) {
            return true;
        } else {
            throw new Exception(mysqli_error());
        }
    }

}