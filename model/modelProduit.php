<?php

require ('model.php');

class ModelProduit extends Model
{

    static $table = "produit" ;
    static $primary = "id" ;


    private $id;
    private $idCategorie;
    private $nomProd;
    private $dateAjout;
    private $marque;
    private $nbVue;
    private $prix;
    private $condition;
    private $description;
    private $numTelVendeur;
    private $nbExemplaire;
    private $taille;
    private $couleur;
    private $imgUrl;

    /**
     * ModelProduit constructor.
     * @param $id
     * @param $idCategorie
     * @param $nomProd
     * @param $dateAjout
     * @param $marque
     * @param $nbVue
     * @param $prix
     * @param $condition
     * @param $description
     * @param $numTelVendeur
     * @param $nbExemplaire
     * @param $taille
     * @param $couleur
     */
    public function __construct($id = NULL, $idCategorie = NULL, $nomProd = NULL, $dateAjout = NULL, $marque = NULL, $nbVue = NULL, $prix = NULL, $condition = NULL, $description = NULL, $numTelVendeur = NULL, $nbExemplaire = NULL, $taille = NULL, $couleur = NULL)
    {
        if (!is_null($id) && !is_null($idCategorie) && !is_null($nomProd) && !is_null($dateAjout) && !is_null($marque) && !is_null($nbVue) && !is_null($prix) && !is_null($condition) && !is_null($description) && !is_null($numTelVendeur) && !is_null($nbExemplaire) && !is_null($taille) && !is_null($couleur)){
            $this->id = $id;
            $this->idCategorie = $idCategorie;
            $this->nomProd = $nomProd;
            $this->dateAjout = $dateAjout;
            $this->marque = $marque;
            $this->nbVue = $nbVue;
            $this->prix = $prix;
            $this->condition = $condition;
            $this->description = $description;
            $this->numTelVendeur = $numTelVendeur;
            $this->nbExemplaire = $nbExemplaire;
            $this->taille = $taille;
            $this->couleur = $couleur;
        }
    }

    /**
     * @return mixed
     */
    public function getImgUrl()
    {
        return $this->imgUrl;
    }

    /**
     * @param mixed $imgUrl
     */
    public function setImgUrl($imgUrl)
    {
        $this->imgUrl = $imgUrl;
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
    public function getIdCategorie()
    {
        return $this->idCategorie;
    }

    /**
     * @return null
     */
    public function getNomProd()
    {
        return $this->nomProd;
    }

    /**
     * @return null
     */
    public function getDateAjout()
    {
        return $this->dateAjout;
    }

    /**
     * @return null
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * @return null
     */
    public function getNbVue()
    {
        return $this->nbVue;
    }

    /**
     * @return null
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @return null
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * @return null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return null
     */
    public function getNumTelVendeur()
    {
        return $this->numTelVendeur;
    }

    /**
     * @return null
     */
    public function getNbExemplaire()
    {
        return $this->nbExemplaire;
    }

    /**
     * @return null
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * @return null
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    public static function getAllProduit(){
        return ModelProduit::getAll(static::$table);
    }

    public static function insertProduit($champs,$values){
        return ModelProduit::insert(static::$table,$champs,$values);
    }

    static function existProduit($key){
        return ModelProduit::exist($key);
    }

    public static function deleteProduit($champs,$values){
        return ModelProduit::delete(static::$table,$champs,$values);
    }

    public static function updateProduit($champs,$values){
        return ModelProduit::update(static::$table,$champs,$values);
    }

    static function selectProduit($para){
        return ModelProduit::select($para);
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