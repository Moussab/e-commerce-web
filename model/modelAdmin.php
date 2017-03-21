<?php

require ('model.php');

class ModelAdmin extends Model
{

    static $table = "admin" ;
    static $primary = "id" ;

    private $id;
    private $username;
    private $password;

    /**
     * ModelAdmin constructor.
     * @param $id
     * @param $username
     * @param $password
     */
    public function __construct($id, $username, $password)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }


    static function insertAdmin($champs,$values){
        return ModelAdmin::insert(static::$table,$champs,$values);
    }

    public static function existAdmin($champ,$value){
        return ModelAdmin::exist(static::$table,$champ,$value);
    }

    static function deleteAdmin($para){
        return ModelAdmin::delete($para);
    }

    static function updateAdmin($tab, $old){
        return ModelAdmin::update($tab,$old);
    }

    public static function selectAdmin($champ,$value){
        return ModelAdmin::select(static::$table,$champ,$value);
    }


}