<?php
require_once '../../config/db.php';

class DAONarudzbenice {
	private $db;

	private $selectOrders = "SELECT * from narudzbenice2";
	private $selectOrdersById = "SELECT * from narudzbenice2 where narudzbenica_id=?";

	private $deleteNarudzbenicu= "DELETE  from narudzbenice2 where narudzbenica_id=?";
	private $updateNarudzbenicu ="UPDATE narudzbenice2 set ime=?,prezime=?,email=?,adresa=?,grad=?,drzava=?,postanskiBroj=?,telefon=?,brojRacuna=?,nacinPlacanja=?,ukupno=?,datumNarucivanja=?  where narudzbenica_id=?";
private $selectNarudzbeniceId="SELECT narudzbenica_id from narudzbenice2";

	
	
	public function __construct()
	{
		$this->db = DB::createInstance();
	}

public function updateNarudzbenicu($ime,$prezime,$email,$adresa,$grad,$drzava,$postanskiBroj,$telefon,$brojRacuna,$nacinPlacanja,$ukupno,$datumNarucivanja,$narudzbenica_id)
    {
        $statement = $this->db->prepare($this->updateNarudzbenicu);
        $statement->bindValue(1, $ime);
        $statement->bindValue(2, $prezime);
        $statement->bindValue(3, $email);
        $statement->bindValue(4, $adresa);
        $statement->bindValue(5, $grad);
        $statement->bindValue(6, $drzava);
        $statement->bindValue(7, $postanskiBroj);
        $statement->bindValue(8, $telefon);
        $statement->bindValue(9, $brojRacuna);
        $statement->bindValue(10, $nacinPlacanja);
        $statement->bindValue(11, $ukupno);
        $statement->bindValue(12, $datumNarucivanja);
        $statement->bindValue(13, $narudzbenica_id);

        $statement->execute();
            

        
     }

	
	public function selectOrders()
	{
	    $statement = $this->db->prepare($this->selectOrders);
	    
	    $statement->execute();
	    
	  
	    $result = $statement->fetchAll();
	    return $result;
	}

public function selectNarudzbeniceId()
	{
	    $statement = $this->db->prepare($this->selectNarudzbeniceId);
	    
	    $statement->execute();
	    
	    $result = $statement->fetchAll();
	    return $result;
	}



public function selectOrdersById($narudzbenica_id)
	{
	    $statement = $this->db->prepare($this->selectOrdersById);
	    $statement->bindValue(1, $narudzbenica_id);
	    $statement->execute();
	 		$result = $statement->fetch();
		return $result;

	}




	public function deleteNarudzbenicu($narudzbenica_id)
	{
	    $statement = $this->db->prepare($this->deleteNarudzbenicu);
	    $statement->bindValue(1, $narudzbenica_id);
	    
	    $statement->execute();
	    
	   
	}
	



}
?>
