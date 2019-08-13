<?php
require 'flight/Flight.php';
require_once '../korisnik/DAOProizvodi.php';
require_once '../racun/DAORacun.php';
require_once '../kolica/DAOKolica.php';

/*
Flight::route('/', function(){
    echo 'hello world!';
});*/


Flight::route('GET /korisnik', function(){
    $dao = new DAOProizvodi();
    $response =$dao->selectKategorije();
    
    echo json_encode($response);
});

    Flight::route('POST /racun', function(){
        $dao = new DAORacun();
        $korisnik_id = Flight::request()->data->korisnik_id;
        $ime= Flight::request()->data->ime;
        $prezime= Flight::request()->data->prezime;
        $email= Flight::request()->data->email;
        $adresa= Flight::request()->data->adresa;
        $grad= Flight::request()->data->grad;
        $drzava= Flight::request()->data->drzava;
        $postanskiBroj= Flight::request()->data->postanskiBroj;
        $telefon= Flight::request()->data->telefon;
        $ukupno= Flight::request()->data->ukupno;
        $brojRacuna= Flight::request()->data->brojRacuna;
        $nacinPlacanja= Flight::request()->data->nacinPlacanja;
        $response = $dao->insertNarudzbe($korisnik_id,$ime,$prezime,$email,$adresa,$grad,$drzava,$postanskiBroj,$telefon,$ukupno,$brojRacuna,$nacinPlacanja);
        var_dump($korisnik_id);
        
        echo json_encode($response);
    });
    
        Flight::route('PUT /korisnik/@korisnik_id/@proizvod_id', function($korisnik_id,$proizvod_id){
            $dao = new DAOProizvodi();
            $kolica_kolicina = Flight::request()->data->kolica_kolicina;
            //$id = Flight::request()->data->id;
            $response = $dao->updateKolicina($kolica_kolicina, $korisnik_id,$proizvod_id);
            var_dump($kolica_kolicina);
            var_dump($korisnik_id);
            echo json_encode($response);
        });
            Flight::route('DELETE /kolica/@korisnik_id', function($korisnik_id){
                $dao = new DAOKolica();
                $response = $dao->deletekolica($korisnik_id);
                echo json_encode($response);
            });

    Flight::start();
    
?>