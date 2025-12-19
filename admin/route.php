<?php

$p=$_GET['p'];

switch ($p) {


    // route dosen
    case 'dosen':
require_once "dosen.php";
        break;
    
    case 'Administrasi':
require_once "Administrasi.php";
        break;

    case 'detail-dosen';
require_once "detail-dosen.php";
        break;

        case 'edit-dosen';
require_once "edit-dosen.php";
        break;

    case 'hapus-dosen';
require_once "hapus-dosen.php";
        break;

    case 'add-dosen';
require_once "tambah-dosen.php";
        break;


        //route pegawai
    case 'pegawai':
require_once "pegawai.php";
        break;

    case 'add-pegawai':
require_once "tambah-pegawai.php";
        break;

    case 'edit-pegawai':
require_once "edit-pegawai.php";
        break;

    case 'detail-pegawai':
require_once "detail-pegawai.php";
        break;

    case 'hapus-pegawai':
require_once "hapus-pegawai.php";
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
require_once "Dashboard.php";
    break;
}