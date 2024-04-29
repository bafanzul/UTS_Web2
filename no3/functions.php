<?php

$koneksi = mysqli_connect("localhost","root","","bukutelpon");
function query ($query){
    global $koneksi;
    $result = mysqli_query($koneksi,$query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;

}

function tambah($data){
    global $koneksi;
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $notel = htmlspecialchars($data["notel"]);
    $email = htmlspecialchars($data["email"]);

     
       $query = "INSERT INTO datamhs VALUES(DEFAULT,'$nama','$nim','$notel','$email')";

       mysqli_query($koneksi,$query);
       return mysqli_affected_rows($koneksi);
}

function hapus($id){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM datamhs WHERE id = $id");
    return mysqli_affected_rows($koneksi);
}


function cari($keyword){
    $query = "SELECT * FROM datamhs
                WHERE 
                Nama LIKE '%$keyword%' OR
                NIM LIKE '%$keyword%' OR
                NoTel LIKE '%$keyword%' OR
                Email LIKE '%$keyword%'
               
    ";
    return query($query);
}

function ubah($data){
    global $koneksi;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $notel = htmlspecialchars($data["notel"]);
    $email = htmlspecialchars($data["email"]);


       $query = "UPDATE datamhs SET 
       Nama ='$nama',
       NIM = '$nim',
       NoTel = '$notel',
       Email = '$email' 
       WHERE id = $id
       ";

       mysqli_query($koneksi,$query);
       return mysqli_affected_rows($koneksi);
}
?>