<?php
require_once '../config/db.php';

class DAOLogin {
	private $db;

	// osoba
	private $KLIJENTEXISTBYUSERNAME = "SELECT count(*) FROM korisnici WHERE korisnik_email = ?";
	private $SELECTKLIJENTBYUSERNAMEANDPASSWORD = "SELECT * FROM korisnici WHERE korisnik_email = ? AND korisnik_sifra = ?";
	
	//artika
	
	private $INSERTUSER = "INSERT INTO korisnici (korisnik_ime, korisnik_prezime, korisnik_email, korisnik_sifra) VALUES (?,?, ?, ?)";


	
	public function __construct()
	{
		$this->db = DB::createInstance();
	}

	public function insertUser($korisnik_ime,$korisnik_prezime,$korisnik_email, $korisnik_sifra)
	{
	    $statement = $this->db->prepare($this->INSERTUSER);
	    $statement->bindValue(1, $korisnik_ime);
	    $statement->bindValue(2, $korisnik_prezime);
	    
	    $statement->bindValue(3, $korisnik_email);
	    $statement->bindValue(4, $korisnik_sifra);
		
		$statement->execute();
	}
	
	

	public function selectKlijentById($idosoba)
	{
		$statement = $this->db->prepare($this->SELECTARTIKALBYID);
		$statement->bindValue(1, $idosoba);
		
		$statement->execute();
		
		$result = $statement->fetch();
		return $result;
	}
	
	
	
	
	
	public function klijentExistByUsername($korisnik_email)
	{
		$statement = $this->db->prepare($this->KLIJENTEXISTBYUSERNAME);
		$statement->bindValue(1, $korisnik_email);
		
		$statement->execute();
		
		return  $statement->fetchColumn();
	}
	
	public function selectKlijentByUsernameAndPassword($korisnik_email, $korisnik_sifra)
	{
		$statement = $this->db->prepare($this->SELECTKLIJENTBYUSERNAMEANDPASSWORD);
		$statement->bindValue(1, $korisnik_email);
		$statement->bindValue(2, $korisnik_sifra);
		
		$statement->execute();
		
		$result = $statement->fetch();
		return $result;
	}
	
	
}
?>
