<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Мой проект</title>
    <link rel="stylesheet" href="../www/styles.css">
</head>
<body>

<table class="layout">
    <tr>
        <td colspan="2" class="header">
            Мой проект
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: right">
            <?= !empty($user) ? 'Привет, ' . $user->getNickname() : 'Войдите на сайт' ?>
            <?php if (empty($user)): ?>
                <ul>
                    <li><a href="users/login">Авторизация</a></li>
                    <li><a href="users/register">Регистрация</a></li>
                </ul>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <td>