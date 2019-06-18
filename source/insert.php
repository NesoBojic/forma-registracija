<?php

$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$pol = $_POST['pol'];
$email = $_POST['email'];
$pozivniBroj = $_POST['pozivniBroj'];
$brojTelefona = $_POST['brojTelefona'];

if(!empty($ime) || !empty($prezime) || !empty($pol) || !empty($email) || !empty($pozivniBroj) || !empty($brojTelefona))
{
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "root";
    $dbname = "registar";
    
    // Konektovanje sa bazom!
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    
    // Check connection
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "INSERT INTO podaci_o_klijentu(ime, prezime, pol, email, pozivniBroj, brojTelefona)
    VALUES ('$ime', '$prezime', '$pol', '$email', '$pozivniBroj', '$brojTelefona')";

    if ($conn->query($sql) === TRUE)
    {
        echo "Novi podatak unesen u bazu!";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
else
{
    echo "Potrebno je popuniti sva polja!";
    die();
}

?>
