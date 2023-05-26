<?php
    session_start();

    function include_template($name, array $data = []) {
        $name = 'templates/' . $name;
        $result = '';
    
        if (!is_readable($name)) {
            return $result;
        }
    
        ob_start();
        extract($data);
        require $name;
    
        $result = ob_get_clean();
    
        return $result;
    };
    
    function validate_length ($value, $min, $max) {
        if ($value) {
            $len = strlen($value);
            if ($len < $min or $len > $max) {
                return "Значение должно быть от $min до $max символов";
            }
        }
    };
    function validate_phone ($phone) {
        if (!preg_match('/^\s?(\+\s?7|8)([- ()]*\d){10}$/', $phone)){
            return "Некорректный номер телефона";
        }

    };

    function send_message($data){
        $name = 'Блок баннера';
            
        if(!empty($data['name'])){
            $name = $data['name'];
        } 
        
        $phone = $data['phone'];
        $filename = 'application.db';
        $message = "Имя: $name" . PHP_EOL . "Номер телефона: $phone" . PHP_EOL;
        $to = 'testemail@yandex.ru';
        $from = "testemail@yandex.ru";
        $subject = $data['theme'];

        $headers = "From: $from\r\nReply-to: $from\r\nContent-type:text/plain; charset=utf-8\r\n";
        $send_mail = mail($to, $subject, $message, $headers);

        if($send_mail){
            file_put_contents($filename, $message . PHP_EOL, FILE_APPEND);
            return 1;
        } else {
            return 0;
        }
    };

    function check_fields ($fields){
        $required = ["name", "phone"];
        $errors = [];

        if($fields['banner_block']){
            setcookie('banner_block', true, time() + 2);
        }

        if($fields['questions_block']){
            setcookie('questions_block', true, time() + 2);
        }
        
        $rules = [
            "name" => function($value) {
                return validate_length($value, 2, 15);
            },
            "phone" => function($value) {
                return validate_phone ($value);
            }
        ];

        $data_form = filter_input_array(INPUT_POST,
        [
            "name"=>FILTER_DEFAULT,
            "phone"=>FILTER_DEFAULT
        ], true);

        foreach ($data_form as $field => $value) {
            if (isset($rules[$field])) {
                $rule = $rules[$field];
                $errors[$field] = $rule($value);
            }
            if (in_array($field, $required) && empty($value)) {
                switch($field){
                    case 'name':
                        $errors[$field] = "Некорректное имя";
                        break;
                    case 'phone':
                        $errors[$field] = "Некорректный номер телефона";
                        break;
                }
            }
        };
    
        $errors = array_filter($errors);

        if(count($errors)){
            $_SESSION['errors_form'] = $errors;
            $_SESSION['error_send'] = 1;
            setcookie('name', $_POST['name']);
            setcookie('phone', $_POST['phone']);
        } else{
            $_SESSION['errors_form'] = [];
            if(send_message($_POST)){
                $_SESSION['error_send'] = 0;
                setcookie('name', '', -1);
                setcookie('phone', '', -1);
                send_message($_POST);
                setcookie('name', '', time() - 1111);
                setcookie('phone', '', time() - 1111);
                $_SESSION = [];
            } else {
                $_SESSION['error_send'] = 1;
                setcookie('name', $_POST['name']);
                setcookie('phone', $_POST['phone']);
            }
        };
    };
