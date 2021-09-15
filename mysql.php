<?php

class MySQL{
    private $oConBD=null;

    public function _construct(){
    } 
    public function conBDOB(){
        $this->oConBD=new mysqli('taxi.cvejcfpsnjtv.us-west-2.rds.amazonaws.com','admin','Personaje_26','taxi');
        if ($this-> oConBD -> connect_error){
            echo "Error al conectarse".$this->oConBD->connect_error."\n";
            return false;
        }

        $sql = "SELECT * FROM datos ORDER BY ID DESC";
        $result = $this ->oConBD->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc(); 
          } else {
            echo "0 results";
          }
          return $row;
          
    }

}