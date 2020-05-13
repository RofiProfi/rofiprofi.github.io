<?php
require_once '../../config/db.php';

class DAOKategorije {
	private $db;

	private $selectKategorije = "SELECT * from kategorije ";
	private $selectKategorijeById = "SELECT * from kategorije where kategorija_id=?";

	private $deleteKategoriju= "DELETE  from kategorije where kategorija_id=?";
	private $updateKategoriju ="UPDATE kategorije set kategorija_naziv=?,kategorija_opis=? where kategorija_id=?";
	private $insertKategoriju = "INSERT into kategorije(kategorija_naziv,kategorija_opis) values (?,?)";
	private $selectKategorijaId= "SELECT kategorija_id from kategorije";


	public function __construct()
	{
		$this->db = DB::createInstance();
	}

public function insertKategoriju($kategorija_naziv,$kategorija_opis){
	$statement= $this->db->prepare($this->insertKategoriju);
	$statement->bindValue(1,$kategorija_naziv);
	$statement->bindValue(2,$kategorija_opis);
	$statement->execute();
}

public function selectKategorijaId(){
$statement= $this->db->prepare($this->selectKategorijaId);
	$statement->execute();
  $result = $statement->fetchAll();
	    return $result;
}

public function updateKategoriju($kategorija_naziv,$kategorija_opis,$kategorija_id)
    {
        $statement = $this->db->prepare($this->updateKategoriju);
        $statement->bindValue(1, $kategorija_naziv);
        $statement->bindValue(2, $kategorija_opis);
        $statement->bindValue(3, $kategorija_id);

        $statement->execute();
            

        
     }

	
	public function selectKategorije()
	{
	    $statement = $this->db->prepare($this->selectKategorije);
	    
	    $statement->execute();
	    
	    $result = $statement->fetchAll();
	    return $result;
	}

public function selectKategorijeById($kategorija_id)
	{
	    $statement = $this->db->prepare($this->selectKategorijeById);
	    	    $statement->bindValue(1, $kategorija_id);
	    $statement->execute();
	    	    $result = $statement->fetch();
	    return $result;

	}


	public function deleteKategoriju($kategorija_id)
	{
	    $statement = $this->db->prepare($this->deleteKategoriju);
	    $statement->bindValue(1, $kategorija_id);
	    
	    $statement->execute();
	    
	   
	}
	



}
?>
