<!DOCTYPE HTML>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php 
            if (isset($title)) {
                echo 'Butterfly Portal - '.$title;
            } else {
                echo 'Butterfly Portal';
            }
            ?></title>
    <link href="<?php echo css_url()?>reset.css" rel="stylesheet" type="text/css">
    <link href="<?php echo css_url()?>main.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans|Lobster' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo css_url()?>chosen/chosen.css" />
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/smoothness/jquery-ui.css" />
    <link rel="stylesheet" href="<?php echo css_url()?>jqueryui-timepicker/jquery.ui.timepicker.css" />
</head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<!-- jquery time picker -->
<script src="<?php echo js_url()?>jqueryui-timepicker/jquery.ui.timepicker.js"></script>
<html>
<body>
    <?php
    $flash = $this->session->flashdata('flash');
    if (!empty($flash)) {
    ?>
    <div id="flash-overlay" style="display: none;"></div>
    <div id="flash-message" style="display: none;">
        <div class="container" style="top: 0;">
            <div class="title">提示</div>
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
    <script>
    $(document).ready(function() {
        $('#flash-overlay').fadeIn(1000);
        $('#flash-message').fadeIn(1000);
        $('#flash-message .container').animate({'top': '50%'}, 1000);
        $("#flash-message .already-read-btn").click(function() {
            $("#flash-message").remove();
            $("#flash-overlay").remove();
        });
    });
    </script>
    <?php
    }
    ?>
    <div id="wrapper">
        <div id="header">
            <div id="account-div">
                <ul>
                    <?php 
                    $logged_in_user = $this->session->userdata('logged_in_user');
                    if (!empty($logged_in_user)) {
                        echo '<li>您好! '.$logged_in_user['display_name'].'</li>';
                        echo '<li><a href="'.base_url().'logout">登出</a></li>';
                    } 
                    ?>
                </ul>
            </div>
            <h1>Butterfly Portal</h1>
            <div id="nav-container">
                <?php if ($this->session->userdata('logged_in_user')) { ?>
                <div id="nav"> 
                    <ul>
                        <li><a>管理</a>
                            <ul>
                                <li><a href="">用戶管理</a></li>
                                <li><a href="">用戶身份管理</a></li>
                            </ul>
                        </li>
                        <li><a>通告</a>
                            <ul>
                                <li><a href="<?php echo base_url(); ?>notice">所有通告</a></li>
                                <li><a href="<?php echo base_url(); ?>notice/create">張貼通告</a></li>
                            </ul>
                        </li>
                        <li><a>客戶服務</a>
                            <ul>
                                <li><a href="<?php echo base_url(); ?>customer?identity=cs">所有客戶</a></li>
                                <li><a href="<?php echo base_url(); ?>manualenquiry/create">客戶來電查詢</a></li>
                            </ul>
                        </li>
                        <li><a>電話傳銷</a>
                            <ul>
                                <li><a href="<?php echo base_url(); ?>customer?identity=sales">所有客戶</a></li>
                                <li><a href="<?php echo base_url(); ?>booking/create">成功預約客戶</a></li>
                            </ul>
                        </li>
                        <li><a>接待</a>
                            <ul>
                                <li><a href="<?php echo base_url(); ?>customer">所有客戶</a></li>
                                <li><a href="<?php echo base_url(); ?>reception">客戶上門查詢</a></li>
                                <li><a href="<?php echo base_url(); ?>reception/showup">客戶出席預約</a></li>
                            </ul>
                        </li> 
                        <li><a>顧問</a>
                            <ul>
                                <li><a href="<?php echo base_url(); ?>consultant/refer">推薦朋友</a></li>
                                <li><a href="<?php echo base_url(); ?>consultant/showup">客戶出席預約</a></li>
                                <li><a href="<?php echo base_url(); ?>consultant/showup">反捐獻清單</a></li>
                            </ul>
                        </li> 
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