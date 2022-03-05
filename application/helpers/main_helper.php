<?php if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}
if (!function_exists('json')) {
  function json($data = '')
  {
    $CI = &get_instance();
    $CI->output
    ->set_content_type('application/json', 'utf-8')
    ->set_output(json_encode($data, JSON_PRETTY_PRINT))
    ->_display();
    exit();
  }
}
