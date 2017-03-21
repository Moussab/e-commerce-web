<?php

require ('model.php');

class ModelCommande extends Model
{

    static $table = "commande" ;
    static $primary = "id" ;

    private $id;
    private $idUser;
    private $idProd;

    /**
     * ModelCommande constructor.
     * @param $id
     * @param $idUser
     * @param $idProd
     */
    public function __construct($id = NULL, $idUser = NULL, $idProd = NULL)
    {
        if (!is_null($id) && !is_null($idUser) && !is_null($idProd)){
            $this->id = $id;
            $this->idUser = $idUser;
            $this->idProd = $idProd;
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @return mixed
     */
    public function getIdProd()
    {
        return $this->idProd;
    }

    public static function getAllCommande(){
        return ModelCommande::getAll(static::$table);
    }
    static function insertCommande($champs,$values){
        return ModelCommande::insert(self::$table,$champs,$values);
    }

    static function existCommande($champ,$value){
        return ModelCommande::exist(self::$table,$champ,$value);
    }

    static function deleteCommande($champ,$value){
        return ModelCommande::delete(self::$table,$champ,$value);
    }

    static function updateCommande($champs,$values){
        return ModelCommande::update(self::$table,$champs,$values);
    }

    static function selectCommande($champ,$value){
        return ModelCommande::select(self::$table,$champ,$value);
    }

}