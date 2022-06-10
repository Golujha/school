<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container">
            <a href="index.php" class="navbar-brand fw-bolder" style="font-size:26px">SMS</a>

            <ul class="navbar-nav">
                <li class="nav-item"><a href="index.php" class="nav-link text-light fw-bolder" style="font-size:26px"><i class="bi bi-house-heart-fill"></i>Home</a></li>

                <?php 
                if(isset($_SESSION['admin'])){?>
                <li class="nav-item"><a href="logout.php" class="nav-link text-light fw-bolder" style="font-size:26px"><i class="bi bi-door-closed"></i>Logout</a></li>
                <?php } else { ?>
                <li class="nav-item"><a href="login.php" class="nav-link text-light" style="font-size:26px">Login</a></li>

                <?php } ?>
            </ul>
        </div>
    </nav>
</body>
</html>