<?php
// kustutamise funktsioon
function deleteProduct($id) {
    // nimetame faili
    $file = 'tooted.csv';
    // loeme faili sisu ilma uute ridadeta
    $lines = file($file, FILE_IGNORE_NEW_LINES);

    // iga rea kohta failis
    foreach ($lines as $key => $line) {
        // jagame rea andmed tükkideks
        $fields = str_getcsv($line);
        // kui ID on õige
        if ($fields[0] == $id) {
            // kustuta see rida
            unset($lines[$key]);
            break;
        }
    }

    // muudame massiivi tekstiks
    $data = implode(PHP_EOL, $lines);
    // kirjutame andmed faili
    file_put_contents($file, $data);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // kui vormi väljad on täidetud
    if (isset($_POST['id'])) {
        // kustutame toote
        deleteProduct($_POST['id']);
        header('Location: admin.php');
        exit();
    }
}
?>
