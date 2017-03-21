<?php

require ("{$ROOT}{$DS}config{$DS}db.php");

class Model
{
    public static $pdo;

    public static function Init(){
        $host = Conf::getHostname();
        $dbname= Conf::getDatabase();
        $login= Conf::getLogin();
        $pass= Conf::getPassword();
        try{
            self::$pdo = new PDO("mysql:host=$host;dbname=$dbname",$login,$pass);

        }catch(PDOException $e) {
            echo $e->getMessage(); // affiche un message d'erreur
            die();}

    }

    public static function getAll($table){
         $SQL="SELECT * FROM $table";
          //echo $SQL ;
          try{
              $req_prep = Model::$pdo->query($SQL);
              //print_r( $req_prep );
              $nomModel =  'model'.substr($table , 3) ;
              $req_prep->setFetchMode(PDO::FETCH_CLASS, $nomModel );
              $all_Art = $req_prep->fetchAll(); ;
              return $all_Art ;
          } catch(PDOException $e) {
              if (Conf::getDebug()) {
                  echo $e->getMessage(); // affiche un message d'erreur
              } else {
                  echo 'Une erreur est survenue <a href="www.google.com"> retour a la page d\'accueil </a>';
              }
              die();
          }
    }

    public static function countElem (){
            $sql = 'SELECT count(:elem) AS ResCount
                    FROM '.static::$table.'';
            try{
                $req_prep = Model::$pdo->prepare($sql);
                $req_prep->bindParam(':elem', static::$primary);
                $req_prep->execute();

            }catch (PDOException $e){
                if(Conf::getDebug())
                    echo $e->getMessage(); // affiche un message d'erreur
                else
                    echo "une erreur est survenue <a href='index.php> retour à la page d\'accueil</a>";
                die();

            }
            return $req_prep->fetch();
    }

    public static function exist ($table,$champ,$value){
          $sql = "SELECT *
                  FROM $table";

          $cpt = 0;
          try{
              $results = Model::$pdo->query($sql);
              $results->setFetchMode(PDO::FETCH_ASSOC);

              while ($result = $results->fetch()){
                  if ($result[$champ] == $value)
                      $cpt++;
              }

          }catch (PDOException $e){
              if(Conf::getDebug())
                  echo $e->getMessage(); // affiche un message d'erreur
              else
                  echo "une erreur est survenue <a href='index.php> retour à la page d\'accueil</a>";
              die();
          }

          return ($cpt==0)?false:true;

    }

    // verifie si un element existe dans une table


    static function insert($table,$champs,$values){

        $sql = "INSERT INTO $table (";

        foreach ($champs as $cle => $champ){
            $sql .= $champ.',';
        }
        $sql=rtrim($sql,",");

        $sql.=')';

        $sql .= ' VALUES ("';

        foreach ($values as $cle => $valeur){
            $sql .= $valeur.'","';
        }
        $sql=rtrim($sql,',"",');

        $sql.='");';

            try{
                $req_prep = Model::$pdo->prepare($sql);
                $req_prep->execute();
            }catch(PDOException $e) {
                if (Conf::getDebug()) {
                    echo $e->getMessage(); // affiche un message d'erreur
                } else {
                    echo 'Une erreur est survenue <a href="#"> retour a la page d\'accueil </a>';
                }
                die();
            }
    }

    public static function delete($table,$champ,$value) {
          $sql = "DELETE FROM $table WHERE $champ = $value";
          try{
              $req_prep = Model::$pdo->prepare($sql);

              $req_prep->execute();
              return 0;
          } catch(PDOException $e) {
              if (Conf::getDebug()) {
                  echo $e->getMessage(); // affiche un message d'erreur
              }
              return -1;
              die();
          }
    }

    public static function update($table,$champs,$values) {
         $sql = "UPDATE $table SET";

            $max = sizeof($champs);
        for ($i = 1 ; $i < $max ; $i++){
            $sql .= " ".$champs[$i]."='".$values[$i]."',";
        }
        $sql=rtrim($sql,",");
        $sql.=" where ";
        $sql .= " ".$champs[0]."=".$values[0].";";


          try{
              $req_prep = Model::$pdo->prepare($sql);
              $req_prep->execute();
          } catch(PDOException $e) {
              if (Conf::getDebug()) {
                  echo "PROBLEME"; // affiche un message d'erreur
              }
              return -1;
              die();
          }
    }

    public static function select($table,$champ,$value) {

        $sql = "SELECT *
                  FROM $table";

        try{
            $results = Model::$pdo->query($sql);
            $results->setFetchMode(PDO::FETCH_ASSOC);

            while ($result = $results->fetch()){
                if ($result[$champ] == $value) {
                    return $result;
                }
            }
        } catch(PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
        return null;
    }
}

Model::Init();

?>