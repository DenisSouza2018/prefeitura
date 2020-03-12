<?php
    require_once 'Config.php';

    class DB{
        private static $instance;

        public static function getInstance(){
            if(!isset(self::$instance)){//Se fosse private seria $this->$instance, mas como é static usa-se o self::
                try{
                    self::$instance = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
                    self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                    self::$instance->exec("set names UTF8");
                }catch (PDOException $e){
                    echo $e->getMessage();
                }
            }

            return self::$instance;
        }

        public static function prepare($sql){
            return self::getInstance()->prepare($sql);
        }
    }
?>