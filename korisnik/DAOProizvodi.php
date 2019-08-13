<?php
require_once '../config/db.php';

class DAOProizvodi {
    private $db;
    
    // osoba
    
    //artika
    private $SELECTARTIKLI = "SELECT proizvod_naziv,proizvod_slika1,proizvod_slika2,proizvod_cena,proizvod_opis,proizvod_id FROM proizvodi";
    private $SELECTARTIKALBYID = "SELECT * FROM proizvodi WHERE proizvod_id = ?";
    private $selectArtikalByUser= "Select proizvod_id, proizvod_naziv,proizvod_naziv,proizvod_slika2,proizvod_cena,proizvod_opis,kolica_kolicina from kolica where korisnik_id=?";
  
    
    
    
    
    
    private $insertkolica= "INSERT into kolica (korisnik_id,proizvod_id,proizvod_naziv,proizvod_slika2,proizvod_cena,proizvod_opis,kolica_kolicina) VALUES (?,?, ?,?,?,?,?)";
    
    private $selectProductIdByUser= "select proizvod_id from kolica where proizvod_id=?";
    
    
    private $SELECTARTIKALBYKATEGORIJA = "SELECT proizvod_naziv,proizvod_slika1,proizvod_slika2,proizvod_cena,proizvod_opis,proizvod_id FROM proizvodi WHERE proizvod_kategorija_id = ?";
    
    
    
    private $updateKolicina= "UPDATE kolica set kolica_kolicina=kolica_kolicina+1  where korisnik_id=? and proizvod_id=?";
    
    
    private $selectKateg= "Select * from kategorije";
    
    public function __construct()
    {
        $this->db = DB::createInstance();
    }
    
    
 
    public function selectArtikalByUserId($korisnik_id)
    {
        $statement = $this->db->prepare($this->selectArtikalByUser);
        $statement->bindValue(1, $korisnik_id);
        
        $statement->execute();
        
        $result = $statement->fetchAll();
        return $result;
    }
    
   
    
    
     function insertkolica($korisnik_id,$proizvod_id, $proizvod_naziv, $proizvod_slika2,$proizvod_cena,$proizvod_opis,$kolica_kolicina)
    {
        $statement = $this->db->prepare($this->insertkolica);
        $statement->bindValue(1, $korisnik_id);
        $statement->bindValue(2, $proizvod_id);
        $statement->bindValue(3, $proizvod_naziv);
        $statement->bindValue(4, $proizvod_slika2);
        $statement->bindValue(5, $proizvod_cena);
        $statement->bindValue(6, $proizvod_opis);
        $statement->bindValue(7, $kolica_kolicina);
        
        
        $statement->execute();
    }
    
    
    
    
    
     function selectKategorije()
    {
        $statement = $this->db->prepare($this->selectKateg);
        // $statement->bindValue(1, $korisnik_id);
        
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
        
    }
    
     function selectProizvodByKateogorija($proizvod_kategorija_id)
    {
        $statement = $this->db->prepare($this->SELECTARTIKALBYKATEGORIJA);
        $statement->bindValue(1, $proizvod_kategorija_id);
        
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
        
    }
    
    
    
     function updateKolicina($korisnik_id,$proizvod_id)
    {
        $statement = $this->db->prepare($this->updateKolicina);
        $statement->bindValue(1, $korisnik_id);
        $statement->bindValue(2, $proizvod_id);
        
        $statement->execute();
        
        
     }
    
   
    
    
    
  
    
    
    
    // artikli
     function selectArtikli()
    {
        $statement = $this->db->prepare($this->SELECTARTIKLI);
        
        $statement->execute();
        
        $result = $statement->fetchAll();	// ako ne postoji vraca prazan niz array{}
        return $result;
    }
    
  
    
    
     function selectArtikalByID($proizvod_id)
    {
        $statement = $this->db->prepare($this->SELECTARTIKALBYID);
        $statement->bindValue(1, $proizvod_id);
        $statement->execute();
        
        $result = $statement->fetch(); 	// ako ne postoji vraca bool(false)
        return $result;
    }
}
?>
