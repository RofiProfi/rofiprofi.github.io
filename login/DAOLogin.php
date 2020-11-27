<?php
require_once '../config/db.php';

class DAOLogin
{
	private $db;

	private $KLIJENTEXISTBYUSERNAME = "SELECT count(*) FROM korisnici WHERE korisnik_email = ?";
	private $SELECTKLIJENTBYUSERNAMEANDPASSWORD = "SELECT * FROM korisnici WHERE korisnik_email = ? AND korisnik_sifra = ?";
	private $INSERTUSER = "INSERT INTO korisnici (korisnik_id,korisnik_ime, korisnik_prezime, korisnik_email, korisnik_sifra) VALUES (?,?,?, ?, ?)";
	private $SELECTUSERID = "SELECT korisnik_id FROM korisnici ORDER BY korisnik_id DESC LIMIT 1";

	public function __construct()
	{
		$this->db = DB::createInstance();
	}

	public function insertUser($korisnik_id, $korisnik_ime, $korisnik_prezime, $korisnik_email, $korisnik_sifra)
	{
		$statement = $this->db->prepare($this->INSERTUSER);
		$statement->bindValue(1, $korisnik_id);
		$statement->bindValue(2, $korisnik_ime);
		$statement->bindValue(3, $korisnik_prezime);
		$statement->bindValue(4, $korisnik_email);
		$statement->bindValue(5, $korisnik_sifra);
		$statement->execute();
	}

	public function selectUserId()
	{
		$statement = $this->db->prepare($this->SELECTUSERID);
		$statement->execute();
		$result = $statement->fetch();
		return $result;
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
