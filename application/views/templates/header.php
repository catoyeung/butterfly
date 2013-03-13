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
    if (isset($flash) && is_array($flash)) {
    ?>
    <div id="flash-overlay"></div>
    <div id="flash-message">
        <div class="container">
            <?php
            if (isset($flash['alert']) && is_array($flash['alert'])) {
                echo '<ul class="message-list alert">';
                foreach($flash['alert'] as $a) {
                    echo '<li>'.$a.'</li>';
                }
                echo '</ul>';
            }
            if (isset($flash['warning']) && is_array($flash['warning'])) {
                echo '<ul class="message-list warning">';
                foreach($flash['warning'] as $w) {
                    echo '<li>'.$w.'</li>';
                }
                echo '</ul>';
            }
            if (isset($flash['info']) && is_array($flash['info'])) {
                echo '<ul class="message-list info">';
                foreach($flash['info'] as $i) {
                    echo '<li>'.$i.'</li>';
                }
                echo '</ul>';
            }
            ?>
            <button class="already-read-btn">我已看過所有提示，謝謝。</button>
        </div>
    </div>
    <?php
    }
    ?>
    <div id="wrapper">
        <div id="header">
            <h1>Butterfly Portal</h1>
            <div id="nav-container">
                <?php if ($this->session->userdata('logged_in_user')) { ?>
                <div id="nav"> 
                    <ul>
                    <li><a href="<?php echo base_url(); ?>#">我的工作(2)</a></li> 
                    <li><a href="<?php echo base_url(); ?>notice">通告(1)</a>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>notice/create">張貼通告</a></li> 
                            <li><a href="">所有通告</a></li>
                        </ul> 
                    </li>
                    <li><a href="<?php echo base_url(); ?>#">我的顧客(3)</a></li> 
                    <!--<li><a href="#">Three Levels</a> 
                            <ul> 
                            <li><a href="#">Level 2.1</a></li> 
                            <li><a href="#">Level 2.2</a></li> 
                            <li><a href="#">Level 2.3</a> 
                                    <ul> 
                                    <li><a href="#">Level 2.3.1</a></li> 
                                    <li><a href="#">Level 2.3.2</a></li> 
                                    <li><a href="#">Level 2.3.3</a></li> 
                                    <li><a href="#">Level 2.3.4</a></li> 
                                    <li><a href="#">Level 2.3.5</a></li> 
                                    <li><a href="#">Level 2.3.6</a></li> 
                                    <li><a href="#">Level 2.3.7</a></li> 
                                    </ul> 
                            </li> 
                            <li><a href="#">Level 2.4</a></li> 
                            <li><a href="#">Level 2.5</a></li> 
                            </ul> 
                    </li> 
                    <li><a href="#">Services</a></li> 
                    <li><a href="#">Contact Us</a></li> -->
                    </ul> 
                </div>
                <?php } ?>
            </div>
            <?php 
            if (isset($title)) {
                echo '<h2>'.$title.'</h2>';
            }
            ?>
        </div>