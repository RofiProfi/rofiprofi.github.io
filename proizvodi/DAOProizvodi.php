<?php
require_once '../../config/db.php';

class DAOProizvodi{
	private $db;

	private $selectProizvode = "SELECT * from proizvodi";
	private $selectProizvodeById = "SELECT * from proizvodi where proizvod_id=?";

	private $deleteProizvode= "DELETE  from proizvodi where proizvod_id=?";
	private $updateProizvode ="UPDATE proizvodi set proizvod_kategorija_id=?,proizvod_naziv=?,proizvod_cena=?,proizvod_opis=? where proizvod_id=?";

	private $updateSlikuProizvoda="UPDATE proizvodi set proizvod_slika1=?, proizvod_slika2=? where proizvod_id=?";
private $updateSlikuProizvodaKolica="UPDATE kolica set proizvod_slika2=? where proizvod_id=?";

private $insertProizvod="INSERT into proizvodi(proizvod_kategorija_id,proizvod_naziv,proizvod_slika1,proizvod_slika2,proizvod_cena,proizvod_opis) values(?,?,?,?,?,?)";
	
	
	public function __construct()
	{
		$this->db = DB::createInstance();
	}

public function insertProizvod($proizvod_kategorija_id,$proizvod_naziv,$proizvod_slika1,$proizvod_slika2,$proizvod_cena,$proizvod_opis){

$statement = $this->db->prepare($this->insertProizvod);
        $statement->bindValue(1, $proizvod_kategorija_id);
                $statement->bindValue(2, $proizvod_naziv);
        $statement->bindValue(3, $proizvod_slika1);
        $statement->bindValue(4, $proizvod_slika2);
        $statement->bindValue(5, $proizvod_cena);
        $statement->bindValue(6, $proizvod_opis);
        $statement->execute(); 
     }

public function updateProizvode($proizvod_kategorija_id,$proizvod_naziv,$proizvod_cena,$proizvod_opis,$proizvod_id)
    {
        $statement = $this->db->prepare($this->updateProizvode);
        $statement->bindValue(1, $proizvod_kategorija_id);
        $statement->bindValue(2, $proizvod_naziv);
        $statement->bindValue(3, $proizvod_cena);
        $statement->bindValue(4, $proizvod_opis);
        $statement->bindValue(5, $proizvod_id);
        $statement->execute(); 
     }

public function updateSlikuProizvoda($proizvod_slika1,$proizvod_slika2,$proizvod_id)     
{
        $statement = $this->db->prepare($this->updateSlikuProizvoda);
        $statement->bindValue(1, $proizvod_slika1);
        $statement->bindValue(2, $proizvod_slika2);
        $statement->bindValue(3, $proizvod_id);
        $statement->execute(); 
     }


     public function updateSlikuProizvodaKolica($proizvod_slika2,$proizvod_id)     
{
        $statement = $this->db->prepare($this->updateSlikuProizvodaKolica);
        $statement->bindValue(1, $proizvod_slika2);
        $statement->bindValue(2, $proizvod_id);
        $statement->execute(); 
     }
	
	public function selectProizvode()
	{
	    $statement = $this->db->prepare($this->selectProizvode);
	    
	    $statement->execute();
	    
	  
	    $result = $statement->fetchAll();
	    return $result;
	}



public function selectProizvodeById($proizvod_id)
	{
	    $statement = $this->db->prepare($this->selectProizvodeById);
	    $statement->bindValue(1, $proizvod_id);
	    $statement->execute();
	 		$result = $statement->fetch();
		return $result;

	}




	public function deleteProizvode($proizvod_id)
	{
	    $statement = $this->db->prepare($this->deleteProizvode);
	    $statement->bindValue(1, $proizvod_id);
	    $statement->execute();

	    
	   
	}
	



}
?>
