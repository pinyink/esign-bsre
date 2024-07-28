<?php

require_once('../Library/Esign.php');

$nik = $_POST['nik'];
$passphrase = $_POST['passphrase'];
$link = $_POST['link'];
$pagecount = $_POST['halaman'];
$base_url= $_POST['base_url'];
 
$rand = rand();
$ekstensi =  array('pdf');
$filename = $_FILES['pdf']['name'];
$ukuran = $_FILES['pdf']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array($ext,$ekstensi) ) {
	echo "file harus pdf <a href='upload.php'>Ulangi</a>";
} else {
    $name = $rand.'_'.uniqid().'.pdf';
    move_uploaded_file($_FILES['pdf']['tmp_name'], '../tmp/'.$name);
    
    $baseLib = new BsreLibrary();
    $baseLib->base_url = $base_url;
    $baseLib->path = '../tmp/'.$name;
    $baseLib->halaman = $pagecount;
    $baseLib->page = $pagecount;
    $baseLib->nik = $nik;
    $baseLib->passphrase = $passphrase;
    $baseLib->linkQR = $link;
    $baseLib->tampilan = 'visible';
    $baseLib->image = 'false';
    $baseLib->width = 120;
    $baseLib->height = 120;
    $sendDoc = $baseLib->signInDoc();
    $response = json_decode($sendDoc);
    if (isset($response->error)) {
        print_r($sendDoc);
    } else {
        file_put_contents('../result/'.$name, $sendDoc);
        echo "Generate Esign Success, <a href='../result/".$name."'>download</a>";
    }
}
?>