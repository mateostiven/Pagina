
<?php
	
 
class MySQL{
	
    private $oConBD=null;

    public function _construct(){} 

    public function conBDOB(){
	include '../../Config.php';
        $this->oConBD=new mysqli($Host,$Usuario,$Clave,'taxi');
        if ($this-> oConBD -> connect_error){
            echo "Error al conectarse".$this->oConBD->connect_error."\n";
            return false;
        }

        $sql = "SELECT * FROM datos WHERE Taxi=2 ORDER BY ID DESC";
        $result = $this ->oConBD->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc(); 
          } else {
            echo "0 results";
          }
          return $row;
    }

}	

