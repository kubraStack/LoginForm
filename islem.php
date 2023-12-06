<?php
    include './fonksiyonlar/helper.php';
    session_start();
    
    $user = [
        'sahinersever' => [
            'eposta' => 'sahin@stebilisim.com',
            'password' => '123456'
        ],
        'fatmaersever' => [
            'eposta' => 'fatma@stebilisim.com',
            'password' => '654321'
        ],
        'mustafaersever' => [
            'eposta' => 'mustafa@stebilisim.com',
            'password' => '012345'
        ]
    ];

     
   
    if (get('islem') == 'giris') {
        $_SESSION['username'] = post('username');
        $_SESSION['password'] = post('password');

        if (!post('username')) {
            $_SESSION['error'] = 'Lütfen kullanıcı adınızı giriniz.';
            header('Location: login.php');
            exit();
        }elseif (!post('password')) {
            $_SESSION['error'] = "Lütfen parolanızı giriniz.";
            header('Location: login.php');
            exit();
        }
        else{
            if (array_key_exists(post('username'),$user)) {
                if ($user[post('username')]['password'] == post('password')) {
                    $_SESSION['login'] = true;
                    $_SESSION['kullanici_adi'] = post('username');
                    $_SESSION['eposta'] = $user[post('username')]['eposta'];
                    header('Location: index.php');
                    exit();
                }else {
                    $_SESSION['error'] = 'Kayıtlı kullanıcı bulunamadı';
                    header('Location: login.php');
                    exit();
                }
            }else {
                $_SESSION['error'] = 'Kayıtlı kullanıcı bulunamadı';
                header('Location: login.php');
                exit();
            }
        }
    }

    if (get('islem') == 'hakkimda') {
    
        $hakkimda = post('hakkimda');

       $islem =  file_put_contents('db/'.session('kullanici_adi').'.txt',htmlspecialchars($hakkimda) );
       if ($islem) {
         header('Location: index.php?islem=true');
       }else{
         header('Location: index.php?islem=false');
       }
       

       
    }
    if (get('islem') == 'cikis') {
        session_destroy(); //sessionı sonlandırdık
        session_start();
        $_SESSION['error'] = 'Oturum Sonlandırıldı.';
        header('Location: login.php');
    }
    if (get('islem') == 'renk') {
        setcookie('color', get('color'), time() + (86400 * 360));
        header('Location:'.$_SERVER['HTTP_REFERER'] ?? 'index.php');
        
    }
?>
    