<?php

function statusBadge($status){
    if($status == "Selesai"){
        return "success";
    }else{
        return "warning";
    }
}

function formatTanggal($tanggal){
    return date('d-m-Y', strtotime($tanggal));
}

?>
