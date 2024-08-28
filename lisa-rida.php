<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kontrollime, kas tegemist on POST-päringuga
    $fail = 'tooted.csv';
    // Määrame CSV faili nime
    $id = count(file($fail)) + 1;
    // Loeme ridade arvu ja suurendame ID-d

    // Kontrollime, kas pildifail on üles laaditud
    if (isset($_FILES['pilt']) && $_FILES['pilt']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'img/';
        $uploadFile = $uploadDir . basename($_FILES['pilt']['name']);
        
        // Laadime üles faili
        if (move_uploaded_file($_FILES['pilt']['tmp_name'], $uploadFile)) {
            $pilt = $uploadFile;
        } else {
            echo "Faili üleslaadimine ebaõnnestus!";
            exit();
        }
    } else {
        echo "Pilt on kohustuslik!";
        exit();
    }

    // $produkt on massiiv, mis sisaldab toote andmeid
    $produkt = [
        $id,
        $pilt,
        $_POST['nimi'],
        $_POST['hind'],
    ];

    // Avame CSV faili ja lisame toote andmed
    $avacsv = fopen($fail, 'a');
    fputcsv($avacsv, $produkt);
    fclose($avacsv);

    header('Location: admin.php');
    exit();
}
?>
