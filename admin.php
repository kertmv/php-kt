<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<script src="https://kit.fontawesome.com/5f11feec13.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="kt.css">
</head>
<body>
	<div id="grad" class="jumbotron text-black">
	    <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light ">
                <a class="navbar-brand" href="avaleht.php"> vare.com</a>
                <div class="collapse navbar-collapse" id="minuMenyy">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                        <a class="nav-link" href="avaleht.php">Avaleht</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="tooted.php?leht=tooted">Tooted</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="kontakt.php?leht=kontakt">Kontakt</a>
                        </li>
                        <li class="nav-item active">
                        <a class="nav-link" href="admin.php?leht=admin">Admin</a>
                        </li>
                        <li class="nav-item">
                        <a class="fa-solid fa-bag-shopping"></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Product List</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Pilt</th>
                                <th>ID</th>
                                <th>Nimi</th>
                                <th>Hind</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
                            $fail = fopen('tooted.csv', 'r');
                            // avame csv faili
                            while (($info = fgetcsv($fail)) !== false) {
                                // votame info selle seest ja paneme html vormi tabelisse
                                echo '<tr>';
                                echo '<td>' . '<img src="' . $info[1] . '" height="100" width="100"></td>';
                                echo '<td>' . $info[0] . '</td>';
                                echo '<td>' . $info[2] . '</td>';
                                echo '<td>' . $info[3] . '</td>';
                                echo '<td>';
                                echo '<form action="kustuta-rida.php" method="post">'; // kustuta-rida.php nupp
                                echo '<input type="hidden" name="id" value="' . $info[0] . '">';
                                echo '<button type="submit" class="btn btn-danger">Kustuta</button>';
                                echo '</form>';
                                echo '<td>';
                                echo '</tr>';
                            }
                            fclose($fail);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2>Lisa produkt</h2>
                    <form action="lisa-rida.php" method="post">
                        <div class="form-group">
                            <label for="picture">Pilt:</label>
                            <input type="file" class="form-control-file" id="pilt" name="pilt" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Nimi:</label>
                            <input type="text" class="form-control" id="nimi" name="nimi" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Hind:</label>
                            <input type="number" class="form-control" id="hind" name="hind" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
