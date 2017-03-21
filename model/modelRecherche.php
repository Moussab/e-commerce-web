<?php

$path = "{$ROOT}{$DS}model{$DS}";
require ("{$path}modelProduit.php");

class ModelRecherche
{
    /**
     * @param $param
     * @return array
     * fonction which return all model, brand and category when
     * the name is like $param
     */
    public static function search($param){
        $produit = static::searchProduit($param);
        $res = array();
        if(!empty($produit)){
            $res = $produit;//array("produits"=>$produit);
        }

        return $res;
    }

    /**
     * @param $param
     * @return mixed
     * fonction intermediaire
     * qui regarde s'il existe un produit
     */
    private static function searchProduit($param){
        $sql = 'SELECT *
                FROM produit
                 WHERE nomProd like :param';
        try{
            $req_prep = Model::$pdo->prepare($sql);
        }catch (PDOException $e){
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }

        $req_prep->execute(array('param'=>'%'.$param.'%'));
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
        return $req_prep->fetchAll();
    }




}