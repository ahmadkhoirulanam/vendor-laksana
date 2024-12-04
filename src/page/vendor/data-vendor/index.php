<?php

$title = 'Data vendor';
include 'src/template/header.php' ;
include 'src/template/navbar.php' ;
include 'src/template/aside.php' ;
if(isset($_GET['m'])){
    if($_GET['m'] == 'add'){
        include 'src/page/vendor/data-vendor/tambah-content.php' ;
    }else if($_GET['m'] == 'edit'){
        include 'src/page/vendor/data-vendor/ubah-content.php' ;
    }
}else{
    include 'src/page/vendor/data-vendor/content.php' ;
}
include 'src/template/footer.php' ;