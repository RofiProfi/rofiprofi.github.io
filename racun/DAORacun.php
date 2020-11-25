<?php
require_once '../config/db.php';

class DAORacun
{
    private $db;


    private $selectArtikalByUser = "SELECT proizvod_id, proizvod_naziv,proizvod_naziv,proizvod_slika2,proizvod_cena,proizvod_opis,kolica_kolicina from kolica where korisnik_id=?";

    private $selectKolicaId = "SELECT MAX(kolica_id) from kolica where korisnik_id=?";
    private $selectNarudzbenicaId = "SELECT MAX(narudzbenica_id) from narudzbenice where korisnik_id=?";

    private $deletekolica = "DELETE  from kolica where korisnik_id=?";

    private $deleteProduct = "DELETE  from kolica where korisnik_id=? and proizvod_id=?";

    private $SELECTUKUPNO = "SELECT SUM(kolica_kolicina*proizvod_cena) from kolica where korisnik_id=?";

    private $SELECTNARUDZBE = "SELECT narudzbenice.ime,narudzbenice.prezime,narudzbenice.email,narudzbenice.adresa,narudzbenice.grad,narudzbenice.drzava,narudzbenice.postanski_Broj,narudzbenice.telefon,narudzbenice.broj_Racuna,narudzbenice.nacin_Placanja,narudzbenice.ukupno, narudzbenice.datum_Narucivanja from narudzbenice where narudzbenice.korisnik_id=? order by narudzbenice.korisnik_id desc limit 1";



    private $insertLista = "INSERT INTO narudzbenice(SELECT narudzbenice2.*,kolica.proizvod_naziv,kolica.proizvod_cena,kolica.kolica_kolicina FROM narudzbenice2 RIGHT JOIN kolica ON narudzbenice2.korisnik_id=kolica.korisnik_id)";



    private $insertNarudzbe = "INSERT INTO narudzbenice2 (narudzbenica_id, korisnik_id,kolica_id,ime,prezime,email, adresa,grad,drzava,postanski_Broj,telefon,ukupno,broj_Racuna,nacin_Placanja,datum_Narucivanja) VALUES (?,?,?,?,?, ?, ?, ?,?, ?, ?,?, ?, ?,CURRENT_TIMESTAMP)";



    public function __construct()
    {
        $this->db = DB::createInstance();
    }

    public function insertLista()
    {
        $statement = $this->db->prepare($this->insertLista);

        $statement->execute();
    }




    public function insertNarudzbe($narudzbenica_id, $korisnik_id, $kolica_id, $ime, $prezime, $email, $adresa, $grad, $drzava, $postanski_Broj, $telefon, $ukupno, $broj_Racuna, $nacin_Placanja)
    {
        $statement = $this->db->prepare($this->insertNarudzbe);
        $statement->bindValue(1, $narudzbenica_id);
        $statement->bindValue(2, $korisnik_id);

        $statement->bindValue(3, $kolica_id);
        $statement->bindValue(4, $ime);
        $statement->bindValue(5, $prezime);
        $statement->bindValue(6, $email);
        $statement->bindValue(7, $adresa);
        $statement->bindValue(8, $grad);
        $statement->bindValue(9, $drzava);
        $statement->bindValue(10, $postanski_Broj);
        $statement->bindValue(11, $telefon);
        $statement->bindValue(12, $ukupno);
        $statement->bindValue(13, $broj_Racuna);
        $statement->bindValue(14, $nacin_Placanja);
        $statement->execute();
    }


    public function deleteProduct($korisnik_id, $proizvod_id)
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


    public function ukupno($korisnik_id)
    {
        $statement = $this->db->prepare($this->SELECTUKUPNO);
        $statement->bindValue(1, $korisnik_id);

        $statement->execute();

        $result = $statement->fetchAll();
        return $result;
    }

    public function selectKolicaId($korisnik_id)
    {
        $statement = $this->db->prepare($this->selectKolicaId);
        $statement->bindValue(1, $korisnik_id);

        $statement->execute();
    }


    public function selectNarudzbenicaId($korisnik_id)
    {
        $statement = $this->db->prepare($this->selectNarudzbenicaId);
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

    public function selectNarudzbe($korisnik_id)
    {
        $statement = $this->db->prepare($this->SELECTNARUDZBE);
        $statement->bindValue(1, $korisnik_id);

        $statement->execute();

        $result = $statement->fetchAll();
        return $result;
    }
}
