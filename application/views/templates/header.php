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
<!-- chosen select option library -->
<script src="<?php echo js_url(); ?>chosen/chosen.jquery.min.js"></script>
<!-- mustache javascript template -->
<script src="<?php echo js_url()?>mustache/mustache.js"></script>
<script>
    // flash message effect
    <?php 
        $flash = $this->session->flashdata('flash');
    ?>
    $(document).ready(function() {
        var flash = JSON.parse('<?php echo json_encode($flash) ?>');
        console.log(flash);
        var template = $('#flash-message-template').html();
        var html = Mustache.to_html(template, flash);
        $('body').prepend(html);
        $('#flash-message').fadeIn(1000).delay(5000).fadeOut(1000);
    });
</script>
<script id="flash-message-template" type="text/template">
<div id="flash-message" style="display: none;">
    <div class="container">
        {{#info.length}}
            <ul class="message-list info">
            {{#info}}
                <li>{{message}}</li>
            {{/info}}
            </ul>
        {{/info.length}}
        
        {{#warning.length}}
        <ul class="message-list warning">
        {{#warning}}
            <li>{{message}}</li>
        {{/warning}}        
        </ul>
        {{/warning.length}}
        
        {{#alert.length}}
        <ul class="message-list alert">
        {{#alert}}
            <li>{{message}}</li>
        {{/alert}}
        </ul>
        {{/alert.length}}
     </div>
</div>
</script>
<html>
<body>
    <div id="wrapper">
        <div id="header">
            <div id="account-div">
                <ul>
                    <?php 
                    $logged_in_user = $this->session->userdata('logged_in_user');
                    if (!empty($logged_in_user)) {
                        echo '<li>您好! '.$logged_in_user['display_name'].'</li>';
                        echo '<li><a href="'.base_url().'account/logout">登出</a></li>';
                    } 
                    ?>
                </ul>
            </div>
            <h1>Butterfly Portal</h1>
            <div id="nav-container">
                <?php if ($this->session->userdata('logged_in_user')) { ?>
                <div id="nav"> 
                    <ul>
                        <li><a href='#'>管理</a>
                            <ul>
                                <li><a href="<?php echo base_url(); ?>authorization_by_post/view">用戶身份權限管理</a></li>
                                <li><a href="<?php echo base_url(); ?>brand/view">品牌管理</a></li>
                                <li><a href="<?php echo base_url(); ?>post/view">用戶身份管理</a></li>
                                <li><a href="<?php echo base_url(); ?>user/view">用戶管理</a></li>
                                <li><a href="<?php echo base_url(); ?>district/view">分區管理</a></li>
                                <li><a href="<?php echo base_url(); ?>ad_source/view">廣告來源管理</a></li>
                                <li><a href="<?php echo base_url(); ?>treatment_type/view">美容分類管理</a></li>
                                <li><a href="<?php echo base_url(); ?>enquiry_content/view">查詢內容管理</a></li>
                            </ul>
                        </li>
                        <li><a href='#'>通告</a>
                            <ul>
                                <li><a href="<?php echo base_url(); ?>notice/view">所有通告</a></li>
                                <li><a href="<?php echo base_url(); ?>notice/create">張貼通告</a></li>
                            </ul>
                        </li>
                        <li><a href='#'>客戶服務</a>
                            <ul>
                                <li><a href="<?php echo base_url(); ?>customer?identity=cs">所有客戶</a></li>
                                <li><a href="<?php echo base_url(); ?>enquiry/create">輸入查詢</a></li>
                            </ul>
                        </li>
                        <li><a href='#'>電話傳銷</a>
                            <ul>
                                <li><a href="<?php echo base_url(); ?>customer?identity=sales">所有客戶</a></li>
                                <li><a href="<?php echo base_url(); ?>booking/create">成功預約客戶</a></li>
                            </ul>
                        </li>
                        <li><a href='#'>接待</a>
                            <ul>
                                <li><a href="<?php echo base_url(); ?>customer">所有客戶</a></li>
                                <li><a href="<?php echo base_url(); ?>reception">客戶上門查詢</a></li>
                                <li><a href="<?php echo base_url(); ?>reception/showup">客戶出席預約</a></li>
                            </ul>
                        </li> 
                        <li><a href='#'>顧問</a>
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