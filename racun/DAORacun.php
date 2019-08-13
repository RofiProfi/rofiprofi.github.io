<?php
require_once '../config/db.php';

class DAORacun {
    private $db;
    
    
    private $selectArtikalByUser= "Select proizvod_id, proizvod_naziv,proizvod_naziv,proizvod_slika2,proizvod_cena,proizvod_opis,kolica_kolicina from kolica where korisnik_id=?";
    
    
    private $deletekolica= "DELETE  from kolica where korisnik_id=?";
    
    private $deleteProduct= "DELETE  from kolica where korisnik_id=? and proizvod_id=?";
    
    private $SELECTUKUPNO = "SELECT SUM(kolica_kolicina*proizvod_cena) from kolica where korisnik_id=?";
    
    private $SELECTNARUDZBE = "SELECT narudzbenice.ime,narudzbenice.prezime,narudzbenice.email,narudzbenice.adresa,narudzbenice.grad,narudzbenice.drzava,narudzbenice.postanskiBroj,narudzbenice.telefon,narudzbenice.brojRacuna,narudzbenice.nacinPlacanja,narudzbenice.ukupno, narudzbenice.datumNarucivanja from narudzbenice where narudzbenice.korisnik_id=? order by narudzbenice.korisnik_id desc limit 1";  
    
    
    
    private $insertLista = "INSERT INTO narudzbenice( SELECT narudzbenice2.*,kolica.proizvod_naziv,kolica.proizvod_cena,kolica.kolica_kolicina
    FROM narudzbenice2
    RIGHT JOIN kolica ON narudzbenice2.korisnik_id=kolica.korisnik_id)";
    
    
    
    private $insertNarudzbe = "INSERT INTO narudzbenice2 (korisnik_id,ime,prezime,email, adresa,grad,drzava,postanskiBroj,telefon,ukupno,brojRacuna,nacinPlacanja,datumNarucivanja) VALUES (?,?,?, ?, ?, ?,?, ?, ?,?, ?, ?,CURRENT_TIMESTAMP)";
    
   
    
    public function __construct()
    {
        $this->db = DB::createInstance();
    }
    
    public function insertLista(){
        $statement = $this->db->prepare($this->insertLista);
        
        $statement->execute();
        }
    
   
    
    
    public function insertNarudzbe($korisnik_id, $ime,$prezime,$email, $adresa,$grad,$drzava,$postanskiBroj,$telefon,$ukupno,$brojRacuna,$nacinPlacanja)
    {
        $statement = $this->db->prepare($this->insertNarudzbe);
        $statement->bindValue(1, $korisnik_id);
        $statement->bindValue(2, $ime);
        $statement->bindValue(3, $prezime);
        $statement->bindValue(4, $email);
        $statement->bindValue(5, $adresa);
        $statement->bindValue(6, $grad);
        $statement->bindValue(7, $drzava);
        $statement->bindValue(8, $postanskiBroj);
        $statement->bindValue(9, $telefon);
        $statement->bindValue(10, $ukupno);
        $statement->bindValue(11, $brojRacuna);
        $statement->bindValue(12, $nacinPlacanja);
        
     
        
        $statement->execute();
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
    
    
    public function ukupno($korisnik_id)
    {
        $statement = $this->db->prepare($this->SELECTUKUPNO);
        $statement->bindValue(1, $korisnik_id);
        
        $statement->execute();
        
        $result = $statement->fetchAll();
        return $result;
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
?>
