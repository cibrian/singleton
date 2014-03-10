<?php

Class Db{
   private $servidor;
   private $usuario;
   private $password;
   private $base_datos;
   private $link;
   private $stmt;
   private $array = array();

   static $_instance;
   private function __construct(){
      $this->setConexion();
      $this->conectar();
   }
   private function setConexion(){
      $conf = Conf::getInstance();
      $this->servidor=$conf->getHostDB();
      $this->base_datos=$conf->getDB();
      $this->usuario=$conf->getUserDB();
      $this->password=$conf->getPassDB();
   }

   private function __clone(){ }
   public static function getInstance(){
      if (!(self::$_instance instanceof self)){
         self::$_instance=new self();
      }
         return self::$_instance;
   }

   private function conectar(){

      $this->link = new mysqli($this->servidor, $this->usuario, $this->password, $this->base_datos);
   }

   public function ejecutar($sql){
   if(!$this->stmt = $this->link->query($sql))
    {
    die('Ocurrio un error ejecutando el query [' . $this->link->error . ']'); 
}
   return $this->stmt;


   }

   public function obtener_filas($stmt){
      while($fila = $stmt->fetch_assoc()){
             $this->array[] = $fila;
       }

      return $this->array;
    }
}


?>