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
		$_SESSION['korpa'] = $dao->selectArtikalByUserId($_SESSION['ulogovan']["korisnik_id"]);
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
		$korisnik_id = ($_SESSION['ulogovan']["korisnik_id"]);
		var_dump(intval($korisnik_id));

		$kolicaId = intval($dao->selectKolicaId(($korisnik_id)));
		$narudzbenicaId = intval($dao->selectNarudzbenicaId($korisnik_id));

		$ime = isset($_POST['ime']) ? $_POST['ime'] : "";
		$prezime = isset($_POST['prezime']) ? $_POST['prezime'] : "";
		$email = isset($_POST['email']) ? $_POST['email'] : "";
		$grad = isset($_POST['grad']) ? $_POST['grad'] : "";
		$adresa = isset($_POST['adresa']) ? $_POST['adresa'] : "";

		$drzava = isset($_POST['drzava']) ? $_POST['drzava'] : "";
		$postanskiBroj = isset($_POST['postanskiBroj']) ? $_POST['postanskiBroj'] : "";
		$telefon = isset($_POST['telefon']) ? $_POST['telefon'] : "";
		if (isset($_POST['kartica'])) {
			$nacinPlacanja = $_POST['kartica'];
		} else {
			$msg4 = "izaberite nacin placanja";
		}
		$brojRacuna = isset($_POST['brojRacuna']) ? $_POST['brojRacuna'] : "";

		if (!empty($ime) && !empty($adresa) && !empty($prezime) && !empty($nacinPlacanja) && !empty($grad) && !empty($drzava) && !empty($postanskiBroj) && !empty($telefon) && !empty($brojRacuna)) {
			if (is_numeric($postanskiBroj)) {
				if (is_numeric($telefon)) {
					if (is_numeric($brojRacuna)) {
						$ukupno = $dao->ukupno($korisnik_id);

						foreach ($ukupno as $u) {
							$Ukupno = $u["sum"];
						}
						$dao->insertNarudzbe($narudzbenicaId, $korisnik_id, $kolicaId, $ime, $prezime, $email, $adresa, $grad, $drzava, $postanskiBroj, $telefon, $Ukupno, $brojRacuna, $nacinPlacanja);
						//$dao->insertLista();
						$dao->deletekolica($_SESSION['ulogovan']["korisnik_id"]);

						$kupa = $dao->selectNarudzbe($_SESSION['ulogovan']["korisnik_id"]);
						$ukupno = $dao->ukupno($_SESSION['ulogovan']["korisnik_id"]);
						foreach ($kupa as $kup) {
							$msg = "Ime: " . $kup["ime"] . "<br>" . "Prezime: " . $kup["prezime"] . "<br>" . "Email: " . $kup["email"] . " <br>" . "Adresa: " . $kup["adresa"] . " <br>" . "Grad: " . $kup["grad"] . "<br> " . "Drzava: " . $kup["drzava"] . "<br> " . "Postanski broj: " . $kup["postanskiBroj"] . " <br>" . "Broj telefona: " . $kup["telefon"] . " <br>" . "Broj Racuna: " . $kup["brojRacuna"];
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

		//
		if (isset($_SESSION['korpa']))
			unset($_SESSION['korpa']);
		//session_destroy($_SESSION['korpa']);

		$dao = new DAORacun();
		$dao->deleteProduct($_SESSION['ulogovan']["korisnik_id"], $idart);
		$_SESSION['korpa'] = $dao->selectArtikalByUserId($_SESSION['ulogovan']["korisnik_id"]);
		$korpa = isset($_SESSION['korpa']) ? $_SESSION['korpa'] : array();
		include 'racun.php';
	}

	public function obrisiSve()
	{
		$idart = isset($_GET['idart']) ? $_GET['idart'] : '';

		//
		unset($_SESSION['korpa'][$idart]);

		// reindex array after remove an artikal by the index
		$_SESSION['korpa'] = array_values($_SESSION['korpa']);

		$dao = new DAORacun();
		$artikli = $dao->deletekolica($_SESSION['ulogovan']["korisnik_id"]);

		include 'racun.php';
	}
}
