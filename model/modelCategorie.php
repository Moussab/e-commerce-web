<?php

require ('model.php');

class ModelCategorie extends Model
{
    static $table = "categorie" ;
    static $primary = "id" ;

    private $id;
    private $categorie;

    /**
     * ModelCategorie constructor.
     * @param $id
     * @param $categorie
     */
    public function __construct($id = NULL, $categorie = NULL)
    {
        if(!is_null($id) && !is_null($categorie)){
            $this->id = $id;
            $this->categorie = $categorie;
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
    public function getCategorie()
    {
        return $this->categorie;
    }



    public static function getAllCategories(){
        return ModelCategorie::getAll(static::$table);
    }

    static function insertCategorie($tab){
        return ModelCategorie::insert($tab);
    }

    static function existCategorie($key){
        return ModelCategorie::exist($key);
    }

    static function deleteCategorie($para){
        return ModelCategorie::delete($para);
    }

    static function updateCategorie($tab, $old){
        return ModelCategorie::update($tab,$old);
    }

    static function selectCategorie($para){
        return ModelCategorie::select($para);
    }

}