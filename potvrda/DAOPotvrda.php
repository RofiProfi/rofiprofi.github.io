<?php
require_once '../config/db.php';

class DAOPotvrda {
    private $db;
    
    
    
    private $deletekolica= "DELETE  from kolica where korisnik_id=?";    
    
    public function __construct()
    {
        $this->db = DB::createInstance();
    }

    
    public function deletekolica($korisnik_id)
    {
        $statement = $this->db->prepare($this->deletekolica);
        $statement->bindValue(1, $korisnik_id);
        
        $statement->execute();
        
        
    }
  

    
    
}
?>
