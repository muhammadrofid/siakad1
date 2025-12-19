<?php
$idx=$_GET['id'];

require_once "../config.php";
$sql="delete from dosen where id=$idx";
$hasil=$db->query($sql);

if($hasil){
    echo "<script>window.location.href='index.php?p=dosen';</script>";
} else {
    echo "<script>alert('Data Gagal Dihapus');
    window.location.href='index.php?p=dosen';</script>";
}
?>
