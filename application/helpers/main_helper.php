<?php

// convert php microtime function, which return time with micro time like this,
// 0.35792900 1363240901
// to this,
// 2013-03-14 06:01:41.358
function microtime_to_mssql_time($mt) {
    list($microsec, $timestamp) = explode(" ", $mt);
    return date('Y-m-d H:i:', $timestamp) . (date('s', $timestamp) + sprintf('%0.3f', $microsec));
}

function add_flash_message($type='info', $message='default message') {
    $ci =& get_instance();
    $flash = $ci->session->flashdata('flash');
    if (isset($flash[$type])) {
        $flash[$type][] = array('message'=>$message);
    } else {
        $flash[$type] = array(array('message'=>$message));
    }
    $ci->session->set_flashdata('flash', $flash);
}

function remove_microsec($datetime) {
    $pattern = '/(.*):(\d{2}):(\d{2}).(\d{3})/';
    $replacement = '$1:$2:$3';
    return preg_replace($pattern, $replacement, $datetime);
}

function combine_date_time($date, $time) {
    list ($m,$d,$y) = explode('/', $date ) ; 
    list ($h, $M) = explode(':', $time ) ; 
    return "{$y}-{$m}-{$d} {$h}:{$M}:00";
}

?>