<?php
    include './fonksiyonlar/helper.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Login Page</title>
    <style>
        body.bg-dark{
            background: #181818!important;;
        }
    </style>
</head>
<body class="<?= cook('color') ? cook('color') : 'bg-dark'; ?>">
    
    <div class="d-flex align-items-center justify-content-center p-4">
        <img src="kod.png" alt="">
    </div>
    <div class="container d-flex align-items-center justify-content-center">
        <div class="card <?= cook('color') ? cook('color') : 'bg-dark'; ?>" style="width: 18rem;">
            <div class="card-header bg-primary">
                Giriş Yap
            </div>
            <div class="card-body">
                <?php if(session('error')): ?>
                <div class="alert alert-danger">
                   <?= session('error')  ?>
                </div>
                <?php endif; ?>
                <form action="islem.php?islem=giris" method="post">
                    <label for="username" class="text-success mb-1">Kullanıcı Adı</label>
                    <input type="text" name="username" value="<?= session('username') ?>" class="form-control">
                    <label for="password" class="text-success">Şifreniz</label>
                    <input type="text" name="password"value="<?= session('password') ?>" class="form-control mb-4">
                    <button class="btn btn-success mb-4 w-100">Giriş Yap</button>

                </form>
            </div>
            <div class="card-footer bg-info d-flex align-items-center justify-content-between">
                <a href="islem.php?islem=renk&color=bg-light" class="btn btn-sm btn-light">Light Mod</a>
                <a href="islem.php?islem=renk&color=bg-dark" class="btn btn-sm btn-dark">Dark Mod</a>
            </div>
        </div>
    </div>
 
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  
</body>
</html> 
<?php 
 $_SESSION['error'] = null;
 $_SESSION['username'] = null;
 $_SESSION['password'] = null;
?>
    