<?php
function deleteProduct($id) {
    $file = 'tooted.csv';
    $lines = file($file, FILE_IGNORE_NEW_LINES);

    foreach ($lines as $key => $line) {
        $fields = str_getcsv($line);
        if ($fields[0] == $id) {
            unset($lines[$key]);
            break;
        }
    }

    $data = implode(PHP_EOL, $lines);
    file_put_contents($file, $data);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        deleteProduct($_POST['id']);
        header('Location: admin.php');
        exit();
    }
}
?>