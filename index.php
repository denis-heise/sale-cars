<?php
    require_once('functions.php');
    session_start();

    if(!isset($_SESSION['error_send'])){
        $popup_data = ['title' => 'Заголовок формы', 'description' => 'Мы перезвоним вам и ответим на любой вопрос', 'show_block' => 1, 'button' => 'Отправить заявку', 'popup' => 0];
    } else if ($_SESSION['error_send'] === 1){
        $popup_data = ['title' => 'Ошибка при отправке', 'description' => 'попробуйте отправить заявку заново', 'show_block' => 0, 'button' => 'Повторить', 'popup' => 1];
    }else if ($_SESSION['error_send'] === 0){
        $popup_data = ['title' => 'Ваша Заявка успешно отправлена', 'description' => 'менеджер свяжется с Вами в ближайшее время', 'button' => 'На главную', 'show_block' => 0, 'popup' => 1, 'send' => 'done'];
        $_SESSION['send'] = 'done';
    };

    if (isset($_SESSION['send'])){
        $_SESSION = [];  
    };

    $page_content = include_template ('main.php');

    $layout_content = include_template ('layout.php', [
        'content' => $page_content,
        'popup_data' => $popup_data
    ]);

    print($layout_content);