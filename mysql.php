<<<<<<< HEAD
<?php
	
 
class MySQL{
	
    private $oConBD=null;

    public function _construct(){} 

    public function conBDOB(){
	include '../../Config.php';
        $this->oConBD=new mysqli($Host,$Usuario,$Clave,'Taxi');
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
=======
<?php
	
 
class MySQL{
	
    private $oConBD=null;

    public function _construct(){} 

    public function conBDOB(){
	include './Config.php';
        $this->oConBD=new mysqli($Host,$Usuario,$Clave,'Taxi');
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
>>>>>>> e0d520ab5d417e15a17d2826e00a20f0d01e826d
