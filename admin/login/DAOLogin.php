<?php
require_once '../config/db.php';

class DAOLogin {
	private $db;

	// osoba
	private $SELECTADMINBYUSERNAMEANDPASSWORD = "SELECT * FROM admin WHERE admin_email = ? AND admin_pass = ?";
	
	//artika
	


	
	public function __construct()
	{
		$this->db = DB::createInstance();
	}


	
	public function selectAdminByUsernameAndPassword($admin_email, $admin_pass)
	{
	    $statement = $this->db->prepare($this->SELECTADMINBYUSERNAMEANDPASSWORD);
	    $statement->bindValue(1, $admin_email);
		$statement->bindValue(2, $admin_pass);
		
		$statement->execute();
		
		$result = $statement->fetch();
		return $result;
	}
	
	
	
}
?>
