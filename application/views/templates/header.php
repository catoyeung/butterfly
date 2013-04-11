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
<script>
// Add jquery animate auto function
jQuery.fn.animateAuto = function(prop, speed, callback){
    var elem, height, width;
    return this.each(function(i, el){
        el = jQuery(el), elem = el.clone().css({"height":"auto","width":"auto"}).appendTo("body");
        height = elem.css("height"),
        width = elem.css("width"),
        elem.remove();
        
        if(prop === "height")
            el.animate({"height":height}, speed, callback);
        else if(prop === "width")
            el.animate({"width":width}, speed, callback);  
        else if(prop === "both")
            el.animate({"width":width,"height":height}, speed, callback);
    });  
}
</script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<!-- jquery cookie -->
<script src="<?php echo js_url()?>jquery-cookie/jquery.cookie.js"></script>
<!-- jquery time picker -->
<script src="<?php echo js_url()?>jqueryui-timepicker/jquery.ui.timepicker.js"></script>
<!-- chosen select option library -->
<script src="<?php echo js_url(); ?>chosen/chosen.jquery.min.js"></script>
<!-- mustache javascript template -->
<script src="<?php echo js_url()?>mustache/mustache.js"></script>
<script src="<?php echo js_url()?>spin/spin.min.js"></script>
<script>
    // flash message effect
    <?php 
        $flash = $this->session->flashdata('flash');
    ?>
    $(document).ready(function() {
        // flash message
        var flash = JSON.parse('<?php echo json_encode($flash) ?>');
        var template = $('#flash-message-template').html();
        var html = Mustache.to_html(template, flash);
        $('body').prepend(html);
        $('#flash-message').fadeIn(1000).delay(5000).fadeOut(1000);
        
        // loading spin library
        var opts = {
            lines: 10, // The number of lines to draw
            length: 10, // The length of each line
            width: 5, // The line thickness
            radius: 10, // The radius of the inner circle
            corners: 1, // Corner roundness (0..1)
            rotate: 0, // The rotation offset
            direction: 1, // 1: clockwise, -1: counterclockwise
            color: '#666', // #rgb or #rrggbb
            speed: 1, // Rounds per second
            trail: 60, // Afterglow percentage
            shadow: true, // Whether to render a shadow
            hwaccel: false, // Whether to use hardware acceleration
            className: 'spinner', // The CSS class to assign to the spinner
            zIndex: 2e9, // The z-index (defaults to 2000000000)
            top: 'auto', // Top position relative to parent in px
            left: 'auto' // Left position relative to parent in px
        };
        var target = document.getElementById('loading-img');
        var spinner = new Spinner(opts).spin(target);
    });
</script>
<script>
function overlay(html) {
    var overlay = $('<div id="overlay"></div>');
    overlay.append('<div class="block"></div>');
    overlay.appendTo('body');
    $('#overlay').append(html);
}

function removeOverlay() {
    $('#overlay').empty().remove();
}
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
    <div id="loading-div" style="display: none;">
        <div id="loading-img"></div>
    </div>
    <div id="wrapper">
        <div id="header">
            <div id="account-div">
                <ul>
                    <?php 
                    $logged_in_user = $this->session->userdata('logged_in_user');
                    echo '<li>'.anchor($this->lang->switch_uri('hk'),'繁體').'</li>';
                    echo '<li>'.anchor($this->lang->switch_uri('cn'),'简体').'</li>';
                    if (!empty($logged_in_user)) {
                        echo '<li>您好! '.$logged_in_user['display_name'].'</li>';
                        echo '<li><a href="'.base_url().'account/logout">登出</a></li>';
                    }
                    //echo '<li><a href="'.base_url().$controller.'/'.$controller_method.'"></a></li>';
                    //echo '<li><a href="'.base_url().'account/logout"></a></li>';
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
                                <li><a href="<?php echo base_url(); ?>brand/view">品牌管理</a></li>
                                <li><a href="<?php echo base_url(); ?>post/view">用戶身份管理</a></li>
                                <li><a href="<?php echo base_url(); ?>authentication_by_post/view">用戶身份權限管理</a></li>
                                <li><a href="<?php echo base_url(); ?>staff/view">用戶管理</a></li>
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
                                <li><a href="<?php echo base_url(); ?>customer/view">所有客戶</a></li>
                                <li><a href="<?php echo base_url(); ?>enquiry/create">人手輸入查詢</a></li>
                                <li><a href="<?php echo base_url(); ?>web_enquiry_form/view">網頁查詢</a></li>
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