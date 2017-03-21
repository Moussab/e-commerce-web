<?php

require ('model.php');

class ModelUser extends Model
{

    static $table = "user" ;
    static $primary = "id" ;

    private $id;
    private $nom;
    private $prenom;
    private $bday;
    private $sexe;
    private $mail;
    private $numTel;
    private $adr;
    private $password;
    private $imgUrl;
    private $codePostal; //


    public function __construct($id=NULL, $nom=NULL, $prenom=NULL, $bday=NULL, $sexe=NULL,
           $mail=NULL, $numTel=NULL, $password=NULL, $adr = NULL, $imgUrl=NULL, $codePostal=NULL){

        if(!is_null($id)&&!is_null($nom)&&!is_null($prenom)&&!is_null($bday)&&!is_null($sexe)
            &&!is_null($mail)&&!is_null($numTel)&&!is_null($password)&&!is_null($adr)
            &&!is_null($imgUrl) &&!is_null($codePostal)){
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->bday = $bday;
            $this->sexe = $sexe;
            $this->mail = $mail;
            $this->numTel = $numTel;
            $this->password = $password;
            $this->adr = $adr;
            $this->imgUrl = $imgUrl;
            $this->codePostal = $codePostal; // le code postal
        }

    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return null
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return null
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @return null
     */
    public function getBday()
    {
        return $this->bday;
    }

    /**
     * @return null
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * @return null
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @return null
     */
    public function getNumTel()
    {
        return $this->numTel;
    }

    /**
     * @return null
     */
    public function getAdr()
    {
        return $this->adr;
    }

    /**
     * @return null
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return null
     */
    public function getImgUrl()
    {
        return $this->imgUrl;
    }

    /**
     * @return null
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }


    public static function getAllUsers(){
        return ModelUser::getAll(static::$table);
    }

    public static function updateUser($champs,$values){
        return ModelUser::update(static::$table,$champs,$values);
    }

    public static function insertUser($champs,$values){
        return ModelUser::insert(static::$table,$champs,$values);
    }

    public static function existUser($champ,$value){
        return ModelUser::exist(static::$table,$champ,$value);
    }


    public static function deleteUser($champs,$values){
        return ModelUser::delete(static::$table,$champs,$values);
    }


    public static function selectUser($champ,$value){
        return ModelUser::select(static::$table,$champ,$value);
    }



}