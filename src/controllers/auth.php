<?php
    $logins = [
        [
        'email'=> 'secreto@gmail.com',
        'password'=> '1234'
        ],
        [
        'email'=> 'secreto@gmail.com',
        'password'=> '1234'
        ],
    ];

    //recoger datos
    if(!empty($_POST['email'])
        && !empty($_POST['password'])){
        $email=filter_input(INPUT_POST,'email');
        $password=filter_input(INPUT_POST,'password');
        
        //crear conexion
        $sql="SELECT * FROM users WHERE email=:email LIMIT 1";
        $stmt=$pdo->prepare($sql);
        if($stmt->execute([':email'=>$email])){
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            dd($result);
            $user=$result[0];
            //verificar password
            password_verify($password,$user['password']);
            //$user['password'];
        }
    }else{
        http_redirect('login',302);
    }
    //validar

    //determinar