<?php
require_once '../config/db.php';

class DAONarudzbenice {
	private $db;

	// osoba
	private $SELECTOrders = "SELECT * from narudzbenice ";
	
	
	
	public function __construct()
	{
		$this->db = DB::createInstance();
	}

	
	public function selectOrders()
	{
	    $statement = $this->db->prepare($this->SELECTOrders);
	    
	    $statement->execute();
	    
	    $result = $statement->fetchAll();
	    return $result;
	}
	

}
?>
