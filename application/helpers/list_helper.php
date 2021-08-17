<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function list_kelamin(){
    return array('Unknown','Laki-Laki','Perempuan');
}
function list_hamil(){
    return array('Tidak Hamil','Hamil');
}
function list_parutbcg(){
    return array('<span class="badge badge-success">Parut BCG Nihil</span>','<span class="badge badge-danger">Parut BCG Ada</span>');
}
function list_tpdiag(){
    return array('Terkonfirmasi bakteriologis','Terdiagnosis klinis');
}

function list_klsantm(){
    return array('TB Paru','TB Ekstraparu');
}

function list_klsrwyt(){
    return array('Baru','Diobati setelah gagal','Kambuh','Diobati setelah putus berobat','Riwayat tidak diketahui','Lain-lain');
}

function list_klshiv(){
    return array('Positif','Negatif','Tidak Diketahui');
}

function list_tahap(){
    return array('Tahap Awal','Tahap Lanjutan');
}

function list_status(){
    return array('Sembuh','Pengobatan Lengkap','Gagal','Meninggal','Putus Berobat','Tidak Dievaluasi');
}

function list_paduan(){
    return array('Kategori-1','Kategori-2','Kategori Anak');
}

function list_bentuk(){
    return array('KDT','Kombipak');
}

function list_sumber(){
    return array('Program TB','Bayar Sendiri','Asuransi','Lain-lain');
}

function list_jns_periksa(){
    return array('Uji Dahak','Uji Tuberkulin','Foto Toraks','Uji Selain Dahak','Berat Badan');
}