<?php
require_once '../../config/db.php';

class DAOKorisnici{
	private $db;

	private $selectKorisnike = "SELECT * from korisnici ";
	private $selectKorisnikaById = "SELECT * from korisnici where korisnik_id=?";

	private $deleteKorisnika= "DELETE  from korisnici where korisnik_id=?";
	private $updateKorisnika ="UPDATE korisnici set korisnik_email=?,korisnik_sifra=? where korisnik_id=?";

	public function __construct()
	{
		$this->db = DB::createInstance();
	}

public function updateKorisnika($korisnik_email,$korisnik_sifra, $korisnik_id)
    {
        $statement = $this->db->prepare($this->updateKorisnika);
        $statement->bindValue(1, $korisnik_email);
        $statement->bindValue(2, $korisnik_sifra);
         $statement->bindValue(3, $korisnik_id);

        $statement->execute();
             
     }

	
	public function selectKorisnike()
	{
	    $statement = $this->db->prepare($this->selectKorisnike);
	    $statement->execute();
	    $result = $statement->fetchAll();
	    return $result;
	}

public function selectKorisnikaById($korisnik_id)
	{
	    $statement = $this->db->prepare($this->selectKorisnikaById);
	    	    $statement->bindValue(1, $korisnik_id);
	    $statement->execute();
	    	    $result = $statement->fetch();
	    return $result;

	}


	public function deleteKorisnika($korisnik_id)
	{
	    $statement = $this->db->prepare($this->deleteKorisnika);
	    $statement->bindValue(1, $korisnik_id);
	    $statement->execute();
	     
	}
}
?>
