<?php

$p=$_GET['p'];

switch ($p) {


    // route dosen
    case 'dosen':
require_once "dosen.php";
        break;
    
    case 'pegawai':
require_once "pegawai.php";
        break;
    
    case 'Administrasi':
require_once "Administrasi.php";
        break;

    case 'detail-dosen';
require_once "detail-dosen.php";
        break;
    
    case 'logout';
require_once "logout.php";
        break;



        // route mahasiswa
    case 'mahasiswa':
require_once "mahasiswa.php";
        break;

    case 'tambah-mahasiswa':
require_once "tambah-mahasiswa.php";
        break;

    case 'edit-mhs':
require_once "edit-mahasiswa.php";
        break;

    case 'detail-mhs':
require_once "detail-mahasiswa.php";
        break;

    case 'hapus-mhs':
require_once "hapus-mhs.php";   
        break;



    default:
require_once "dashboard.php";
    break;
}