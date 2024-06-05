<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fail = 'tooted.csv';
    $id = count(file($fail)) + 1;
    $pilt = 'img/product-1.jpg';

    $produkt = [
        $id,
        $pilt,
        $_POST['nimi'],
        $_POST['hind'],
    ];

    $avacsv = fopen($fail, 'a');
    fputcsv($avacsv, $produkt);
    // add id to the next product
    $id++;
    fclose($avacsv);

    header('Location: admin.php');
    exit();
}
?>