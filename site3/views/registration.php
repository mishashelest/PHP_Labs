<div class="reg">
    <?php
    $data=$_POST;
    if (isset($data['do_signup']))
    {
        $errors=array();
        if(trim($data['login'])=='')
        {
            $errors[]="Введіть логін!";
        }
        else
        {
            if(!preg_match("/^([a-zA-Zа-яієїА-ЯІЄЇ0-9_\-]){4,}$/",$data['login']))
            {
                $errors[]="Заповніть поле \"Ваш Логін\" правильно, обов'язковими є 4 літери!";
            }
        }
        if($data['password']=='')
        {
            $errors[]="Введіть пароль!";
        }
        else
        {
            if(!preg_match("/^\S*(?=\S{7,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/",$data['password']))
            {
                $errors[]="Заповніть поле \"Ваш Пароль\" правильно,  не менше 7 літер, обов’язково має містити великі та малі літери, а також цифри!";
            }
        }
        if($data['password_2']=='')
        {
            $errors[]="Повторіть пароль!";
        }
        else
        {
            if($data['password_2']!=$data['password'])
            {
                $errors[]="Заповніть поле \"Повторіть Ваш Пароль\" правильно!";
            }
        }
        if($data['email']=='')
        {
            $errors[]="Введіть Email!";
        }
        else
        {
            if(!preg_match("/[a-zA-Z0-9\.\-_]{2,}@[a-zA-Z0-9\-_]+\.[a-z]{2,3}$/",$data['email']))
            {
                $errors[]="Заповніть поле \"Ваш Email\" правильно!";
            }
        }
        // if($data['name']!='')
        // {
        //     if(!preg_match('/^(\+)[0-9]{0,29}$/',$data['name']))
        //     {
        //         if(!preg_match('/^\([0-9]{3}\)[ ]{1}[0-9]{0,25}$/',$data['name']))
        //         {
        //             if(!preg_match('/^\([0-9]{3}\)[ ]{1}[0-9]{2}[\-]{1}[0-9]{2}[\-]{1}[0-9]{3}$/',$data['phone']))
        //             {
        //                 if(!preg_match('/^(\+)[0-9]{2}[ ]{1}\([0-9]{3}\)[ ]{1}[0-9]{2}[ ]{1}[0-9]{2}[ ]{1}[0-9]{3}$/',$data['phone']))
        //             {
                        
        //                     $errors[]="Заповніть поле \"Ім'я\" правильно!";
        //                     }
        //                 }
        //             }
        //         }
        // }
        if(empty($errors))
        {
           
            header ('Location: index.php?action=registration_successfull');  
            exit(); 
        }
        else
        {
            echo '<div style="color:red; margin-left:15%;">'.array_shift($errors).'</div><hr>';
        }
    }
?>

    <form action="index.php?action=registration" method="POST">
        <p><label for="text_label">Логін</label>: 
            <br>
            <input type="text" name="login" id="text_label" value="<?= @$data['login'];?>">
        <p><label for="password_label">Пароль</label>:
            <br>
            <input type="password" name="password" id="password_label" value="<?php echo @$data['password'];?>">
        <p><label for="password_2_label">Повторіть ваш пароль</label>:
            <br>
            <input type="password" name="password_2" id="password_2_label" value="<?php echo @$data['password_2'];?>">
        <p><label for="email_label">Email</label>:
            <br>
           <input type="email" name="email" id="email_label" value="<?php echo @$data['email'];?>">
        <!-- <p><label for="phone_label">Телефон</label>:
            <br>
           <input type="text" name="phone" id="phone_label" value="<?php echo @$data['phone'];?>"> -->
        <p><button class="btn" type="submit" name="do_signup">Зареєструватися</button>
    </form>
</div>

