<?php


class Model
{

    private $database; //Attribut privé contenant l'objet PDO
    private static $instance = null; //Attribut qui contiendra l'unique instance du modèle

    /*
     * Constructeur créant l'objet PDO et l'affectant à $database
     */
    private function __construct()
    {
        try {
            //Fichier contenant les dsn, login et mot de passe
            require 'postgresql.conf.inc.php';
            $this->database = new PDO($dsn, $login, $mdp);
            $this->database->query("SET NAMES 'utf8'"); //instruction indique que le script PHP communique avec la base de données en utf-8
            $this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // indique qu’en cas d’erreur, une exception doit être levée
        } catch (PDOException $e) {
            die('<p> La connexion a échoué. Erreur[' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
    }

    /**
     * Méthode permettant de récupérer l'instance de la classe Model
     */
    public static function getModel()
    {

        //Si la classe n'a pas encore été instanciée
        if (self::$instance == null) {
            self::$instance = new Model(); //On l'instancie
            return self::$instance;//On retourne l'instance

        }
    }

    /**
    * Méthode permettant de renvoyer la methode prepare étant donnée la vzriable privé qui contient PDO
    */
    public function prepare($reqSQL)
    {
        return $this->database->prepare($reqSQL);
    }
}
