<?php

require ('model.php');

class ModelCommentaire extends Model
{
    static $table = "commentaire";
    static $primary = "id";

    private $id;
    private $commentaire;
    private $idUser;
    private $idProd;
    private $valider;

    /**
     * ModelCategorie constructor.
     * @param $id
     * @param $commentaire
     * @param $idUser
     * @param $idProd
     * @param $valider
     */
    public function __construct($id = NULL, $commentaire = NULL, $idUser = NULL, $idProd = NULL, $valider = NULL)
    {
        if (!is_null($id) && !is_null($valider) && !is_null($commentaire) && !is_null($idUser) && !is_null($idProd)) {

            $this->id = $id;
            $this->commentaire = $commentaire;
            $this->idUser = $idUser;
            $this->idProd = $idProd;
            $this->valider = $valider;
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
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * @return null
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @return null
     */
    public function getIdProd()
    {
        return $this->idProd;
    }

    /**
     * @return null
     */
    public function getValider()
    {
        return $this->valider;
    }


    public static function getAllCommentaire(){
        return ModelCommentaire::getAll(static::$table);
    }

    public static function insertCommentaire($champs,$values){
        return ModelCommentaire::insert(static::$table,$champs,$values);
    }

    static function existCommentaire($key){
        return ModelCommentaire::exist($key);
    }

    public static function deleteCommentaire($champs,$values){
        return ModelCommentaire::delete(static::$table,$champs,$values);
    }

    public static function updateCommentaire($champs,$values){
        return ModelCommentaire::update(static::$table,$champs,$values);
    }

    static function selectCommentaire($para){
        return ModelCommentaire::select($para);
    }


    /**
     * recuperer les produits d'une catégorie donnée
     */
    public static function getProduitsDeCategorie($idCat){
        $sql = 'SELECT *
                FROM produit
                 WHERE idCategorie =:idCat';

        try{
            $req_prep = Model::$pdo->prepare($sql);
        }catch (PDOException $e){
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php"> retour a la page d\'accueil </a>';
            }
            die();
        }

        $req_prep->bindParam(':idCat',$idCat);
        $req_prep->execute();
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'modelProduit'); //transforme les row en objet
        return $req_prep->fetchAll();
    }



}