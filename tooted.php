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

<style>
    .card {
        width: 250px;
    }
</style>
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
                        <li class="nav-item active">
                        <a class="nav-link" href="tooted.php?leht=tooted">Tooted</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="kontakt.php?leht=kontakt">Kontakt</a>
                        </li>
                        <li class="nav-item">
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
    <h3 class="text-center">Parimad pakkumised</h3>
	<div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-4 center">
	<?php
        $file = fopen('tooted.csv', 'r');
        if ($file !== false) {
        while (($line = fgetcsv($file)) !== false) {
            $image = $line[1];
            $name = $line[2];
            $price = $line[3];
    ?>

        <div class="card border-light">
		<img src="<?php echo $image; ?>" class="card-img-top" height="300" alt="<?php echo $name; ?>">
        <div class="card-body">
		<h5 class="card-title"><?php echo $name; ?></h5>
        <p class="card-text">Hind: <?php echo $price; ?></p>
        </div>
        </div>

<?php
        }
        fclose($file);
        }
?>


</body>
</html>
