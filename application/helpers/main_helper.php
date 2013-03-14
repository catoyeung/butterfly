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
    if (isset($flash['info'])) {
        array_push($flash[$type], $message);
    } else {
        $flash[$type] = array($message);
    }
    
    $ci->session->set_flashdata('flash', $flash);
}

?>