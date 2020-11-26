<?php
session_start();
require_once '../racun/DAORacun.php';

class ControllerRacun
{

	public function pocetna()
	{
		$dao = new DAORacun();

		//$artikli =$dao->selectArtikli();
		header("Location:../korisnik/?action=pocetna");
	}

	public function gologin()
	{
		include '../login/login.php';
	}

	public function gocart()
	{
		include '../kolica/cart.php';
	}



	function goRacun()
	{

		$dao = new DAORacun();
		$korisnik_id = $_SESSION['ulogovan']["korisnik_id"];
		$_SESSION['korpa'] = $dao->selectArtikalByUserId($korisnik_id);
		$korpa = isset($_SESSION['korpa']) ? $_SESSION['korpa'] : array();
		include 'racun.php';
	}
	function potvrda()
	{
		include '../potvrda/potvrda.php';
	}


	public function logout()
	{
		//
		session_unset();
		session_destroy();
		header("Location:../korisnik/?action=pocetna");
	}



	function narudzbenica()
	{

		//
		$dao = new DAORacun();
		$korisnik_id = $_SESSION['ulogovan']["korisnik_id"];

		$kolicaId = intval($dao->selectKolicaId(($korisnik_id)));
		$narudzbenicaId = intval($dao->selectNarudzbenicaId($korisnik_id));

		$ime = isset($_POST['ime']) ? $_POST['ime'] : "";
		$prezime = isset($_POST['prezime']) ? $_POST['prezime'] : "";
		$email = isset($_POST['email']) ? $_POST['email'] : "";
		$grad = isset($_POST['grad']) ? $_POST['grad'] : "";
		$adresa = isset($_POST['adresa']) ? $_POST['adresa'] : "";
		$drzava = isset($_POST['drzava']) ? $_POST['drzava'] : "";
		$postanski_broj = isset($_POST['postanski_broj']) ? $_POST['postanski_broj'] : "";
		$telefon = isset($_POST['telefon']) ? $_POST['telefon'] : "";
		$broj_racuna = isset($_POST['broj_racuna']) ? $_POST['broj_racuna'] : "";

		if (isset($_POST['kartica'])) {
			$nacin_placanja = $_POST['kartica'];
		} else {
			$msg4 = "izaberite nacin placanja";
		}

		if (!empty($ime) && !empty($adresa) && !empty($prezime) && !empty($nacin_placanja) && !empty($grad) && !empty($drzava) && !empty($postanski_broj) && !empty($telefon) && !empty($broj_racuna)) {
			if (is_numeric($postanski_broj)) {
				if (is_numeric($telefon)) {
					if (is_numeric($broj_racuna)) {
						$ukupno = $dao->ukupno($korisnik_id);

						foreach ($ukupno as $u) {
							$Ukupno = $u["sum"];
						}
						$dao->insertNarudzbe($narudzbenicaId, $korisnik_id, $kolicaId, $ime, $prezime, $email, $adresa, $grad, $drzava, $postanski_broj, $telefon, $Ukupno, $broj_racuna, $nacin_placanja);
						$dao->insertLista();
						$dao->deletekolica($korisnik_id);

						$kupa = $dao->selectNarudzbe($korisnik_id);
						$ukupno = $dao->ukupno($korisnik_id);
						foreach ($kupa as $kup) {
							$msg = "Ime: " . $kup["ime"] . "<br>" . "Prezime: " . $kup["prezime"] . "<br>" . "Email: " . $kup["email"] . " <br>" . "Adresa: " . $kup["adresa"] . " <br>" . "Grad: " . $kup["grad"] . "<br> " . "Drzava: " . $kup["drzava"] . "<br> " . "Postanski broj: " . $kup['postanski_broj'] . " <br>" . "Broj telefona: " . $kup["telefon"] . " <br>" . "Broj Racuna: " . $kup["broj_racuna"] . "<br>";
						}

						include '../potvrda/potvrda.php';
					} else {
						$msg4 = "Broj racuna mora biti broj";
						include 'racun.php';
					}
				} else {
					$msg4 = "Telefon mora biti broj";
					include 'racun.php';
				}
			} else {
				$msg4 = "Postanski broj mora biti broj";
				include 'racun.php';
			}
		} else {
			$msg4 = "Morate popuniti sva polja!";
			include 'racun.php';
		}
	}
	public function obrisiJedan()
	{
		$idart = isset($_GET['idart']) ? $_GET['idart'] : '';
		$korisnik_id = $_SESSION['ulogovan']["korisnik_id"];

		//
		if (isset($_SESSION['korpa']))
			unset($_SESSION['korpa']);
		//session_destroy($_SESSION['korpa']);

		$dao = new DAORacun();
		$dao->deleteProduct($korisnik_id, $idart);
		$_SESSION['korpa'] = $dao->selectArtikalByUserId($korisnik_id);
		$korpa = isset($_SESSION['korpa']) ? $_SESSION['korpa'] : array();
		include 'racun.php';
	}

	public function obrisiSve()
	{
		$idart = isset($_GET['idart']) ? $_GET['idart'] : '';
		$korisnik_id = $_SESSION['ulogovan']["korisnik_id"];

		//
		unset($_SESSION['korpa'][$idart]);

		// reindex array after remove an artikal by the index
		$_SESSION['korpa'] = array_values($_SESSION['korpa']);

		$dao = new DAORacun();
		$artikli = $dao->deletekolica($korisnik_id);

		include 'racun.php';
	}
}
