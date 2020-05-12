<?php
require_once '../config/db.php';

class DAOKolica {
	private $db;

	//private $insertkolica= "INSERT into kolica (korisnik_id,proizvod_id,proizvod_naziv,proizvod_slika2,proizvod_cena,proizvod_opis,kolicina) VALUES (?,?,?, ?,?,?,?)";
	
	private $selectArtikalByUser= "Select proizvod_id, proizvod_naziv,proizvod_naziv,proizvod_slika2,proizvod_cena,proizvod_opis,kolica_kolicina from kolica where korisnik_id=?";
	private $deletekolica= "DELETE  from kolica where korisnik_id=?";
	private $deleteProduct= "DELETE  from kolica where korisnik_id=? and proizvod_id=?";
	private $SELECTUKUPNO = "SELECT SUM(kolica_kolicina*proizvod_cena) from kolica where korisnik_id=?";
	


	public function __construct()
	{
		$this->db = DB::createInstance();
	}

	
	public function deleteProduct($korisnik_id,$proizvod_id)
	{
	    $statement = $this->db->prepare($this->deleteProduct);
	    $statement->bindValue(1, $korisnik_id);
	    $statement->bindValue(2, $proizvod_id);
	    
	    $statement->execute();
	    
	   
	}
	
	public function deletekolica($korisnik_id)
	{
	    $statement = $this->db->prepare($this->deletekolica);
	    $statement->bindValue(1, $korisnik_id);
	    
	    $statement->execute();
	    
	    
	}
	
	
	public function selectArtikalByUserId($korisnik_id)
	{
	    $statement = $this->db->prepare($this->selectArtikalByUser);
	    $statement->bindValue(1, $korisnik_id);
	    
	    $statement->execute();
	    
	    $result = $statement->fetchAll();
	    return $result;
	}
	
	public function ukupno($korisnik_id)
	{
	    $statement = $this->db->prepare($this->SELECTUKUPNO);
	    $statement->bindValue(1, $korisnik_id);
	    
	    $statement->execute();
	    
	    $result = $statement->fetchAll();
	    return $result;
	}
	

	
}
?>
