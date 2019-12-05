<?php

/**
 * Created by PhpStorm.
 * User: Nethweb
 * Date: 10/14/2018
 * Time: 9:04 PM
 */
class userClass
{
    private $user_name;
    private $user_id;
    private $user_email;
    private $user_level;
    private $user_pword;
    private $last_login;
    private $verified_once;
    private $active;

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->user_name;
    }

    /**
     * @param mixed $user_name
     */
    public function setUserName($user_name)
    {
        $this->user_name = $user_name;
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
    public function getUserEmail()
    {
        return $this->user_email;
    }

    /**
     * @param mixed $user_email
     */
    public function setUserEmail($user_email)
    {
        $this->user_email = $user_email;
    }

    /**
     * @return mixed
     */
    public function getUserLevel()
    {
        return $this->user_level;
    }

    /**
     * @param mixed $user_level
     */
    public function setUserLevel($user_level)
    {
        $this->user_level = $user_level;
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
    public function getLastLogin()
    {
        return $this->last_login;
    }

    /**
     * @param mixed $last_login
     */
    public function setLastLogin($last_login)
    {
        $this->last_login = $last_login;
    }

    /**
     * @return mixed
     */
    public function getVerifiedOnce()
    {
        return $this->verified_once;
    }

    /**
     * @param mixed $verified_once
     */
    public function setVerifiedOnce($verified_once)
    {
        $this->verified_once = $verified_once;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    public function checkEmail()
    {
        $myCon = new dbConfig();
        $myCon->connect();
        $query = "SELECT user_email FROM login WHERE user_email='" . $this->getUserEmail() . "' LIMIT 1";
        $result = $myCon->query($query);
        $count = mysqli_num_rows($result);
        $myCon->closeCon();
        if ($count >= 1) {
            throw new Exception('Sorry, your email is already in the database');
        } else {
            return true;
        }
    }
    public function addUser()
    {
        $myCon = new dbConfig();
        $myCon->connect();
        $this->checkEmail();
        $query = "INSERT INTO login(user_name,user_email,user_level,user_pword,last_login,verified_once,active) 
                  VALUES('".$this->getUserName()."','" . $this->getUserEmail() . "','" . $this->getUserLevel() . "','" . $this->getUserPword() . "',
                   '" .$this->getLastLogin() . "','" . $this->getVerifiedOnce() . "','" . $this->getActive() . "')";

        $result = $myCon->query($query);
        if ($result) {
            return true;
        } else {
            throw new Exception(mysqli_error());
        }
    }
    public function updateUser()
    {
        $myCon = new dbConfig();
        $myCon->connect();
        $query = "UPDATE login SET user_name='".$this->getUserName()."',user_level='" . $this->getUserLevel() . "',
                                  user_pword='" . $this->getUserPword() . "'WHERE user_id='".$this->getUserId()."'";
        $result = $myCon->query($query);
        if ($result) {
            return true;
        } else {
            throw new Exception(mysqli_error());
        }
    }
    public function deleteUser()
    {
        $myCon = new dbConfig();
        $myCon->connect();
        $query = "UPDATE login SET  active='" . $this->getActive() . "' WHERE user_id='".$this->getUserId()."'";
        $result = $myCon->query($query);
        if ($result) {
            return true;
        } else {
            throw new Exception(mysqli_error());
        }
    }

}