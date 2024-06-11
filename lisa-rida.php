<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // vaata kas request on post tyybiga
    $fail = 'tooted.csv';
    // sea faili nimi
    $id = count(file($fail)) + 1;
    // loe faili ridade arv ja lisa 1
    $pilt = 'img/product-1.jpg';
    // pildi asukoht/tootepilt

    // $produkt on massiiv, mis sisaldab toote andmeid
    $produkt = [
        $id,
        $pilt,
        $_POST['nimi'],
        $_POST['hind'],
    ];

    // avame csv faili
    $avacsv = fopen($fail, 'a');
    // paneme csv faili saadud andmed eelmisest kysitlusest
    fputcsv($avacsv, $produkt);
    $id++;
    fclose($avacsv);

    header('Location: admin.php');
    exit();
}
?>
