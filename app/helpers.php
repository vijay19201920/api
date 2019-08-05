<?php

function get_enc_email($str) {
    $str_length = strlen($str);
    return substr($str, 0, 3).str_repeat('*', $str_length - 3).substr($str, $str_length - 10);
}
