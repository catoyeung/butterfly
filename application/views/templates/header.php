<!DOCTYPE HTML>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Home</title>
    <link href="<?php echo css_url()?>reset.css" rel="stylesheet" type="text/css">
    <link href="<?php echo css_url()?>main.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans|Lobster' rel='stylesheet' type='text/css'>
</head>
<html>
<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && is_array($flash)) {
    ?>
    <div id="flash-overlay"></div>
    <div id="flash-message">
        <div class="container">
            <ul class="message-list info">
                <li>你剛成功登入</li>
            </ul>
            <ul class="message-list warning">
                <li>你今天有１個客人需要聯絡</li>
            </ul>
            <ul class="message-list alert">
                <li>你剛成功登入</li>
                <li>你今天有１個客人需要回覆</li>
            </ul>
            <button class="already-read-btn">我已看過所有提示，謝謝。</button>
        </div>
    </div>
    <?php
    }
    ?>
    <div id="wrapper">
        <div id="header">
            <h1>Home</h1>
        </div>