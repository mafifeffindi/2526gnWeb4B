<?php

function judulWebsite(){

    return "Sistem Inventaris Barang";

}

function salam(){

    date_default_timezone_set("Asia/Jakarta");

    $jam = date("H");

    if($jam < 12){

        return "Selamat Pagi";

    }elseif($jam < 15){

        return "Selamat Siang";

    }elseif($jam < 18){

        return "Selamat Sore";

    }else{

        return "Selamat Malam";

    }

}

?>
