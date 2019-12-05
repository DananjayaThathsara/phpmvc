<?php

/**
 * Created by PhpStorm.
 * User: Nethweb
 * Date: 9/11/2018
 * Time: 11:38 AM
 */
class imageClass
{
    private $img_id;
    private $ref_id;
    private $img_type_id;
    private $ref_sec_id;
    private $img_path;

    /**
     * @return mixed
     */
    public function getImgId()
    {
        return $this->img_id;
    }
    /**
     * @param mixed $img_id
     */
    public function setImgId($img_id)
    {
        $this->img_id = $img_id;
    }
    /**
     * @return mixed
     */
    public function getRefId()
    {
        return $this->ref_id;
    }
    /**
     * @param mixed $ref_id
     */
    public function setRefId($ref_id)
    {
        $this->ref_id = $ref_id;
    }
    /**
     * @return mixed
     */
    public function getImgTypeId()
    {
        return $this->img_type_id;
    }
    /**
     * @param mixed $img_type_id
     */
    public function setImgTypeId($img_type_id)
    {
        $this->img_type_id = $img_type_id;
    }
    /**
     * @return mixed
     */
    public function getRefSecId()
    {
        return $this->ref_sec_id;
    }
    /**
     * @param mixed $ref_sec_id
     */
    public function setRefSecId($ref_sec_id)
    {
        $this->ref_sec_id = $ref_sec_id;
    }
    /**
     * @return mixed
     */
    public function getImgPath()
    {
        return $this->img_path;
    }
    /**
     * @param mixed $img_path
     */
    public function setImgPath($img_path)
    {
        $this->img_path = $img_path;
    }


    public function imgSave()
    {

        $myCon = new dbConfig();
        $myCon->connect();
        $query = "INSERT INTO images (ref_id,img_type_id,ref_sec_id,img_path)
                  VALUES ('" . $this->getRefId() . "','" . $this->getImgTypeId() . "','" . $this->getRefSecId() . "','" . $this->getImgPath() . "')";

        $result = $myCon->query($query);
        if ($result) {
            return TRUE;
        } else {
            throw new Exception(mysqli_error());
        }

    }
    public function imgUpdate()
    {

        $myCon = new dbConfig();
        $myCon->connect();
        $query = "UPDATE  images SET  img_path='" . $this->getImgPath() . "' WHERE ref_id='" . $this->getRefId() . "' AND img_type_id='" . $this->getImgTypeId() . "'";
        $result = $myCon->query($query);
        if ($result) {
            $myCon->closeCon();
            return TRUE;
        } else {
            throw new Exception(mysqli_error());
        }

    }


}