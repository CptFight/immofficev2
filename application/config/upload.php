<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$config['upload_repository']    = 'files/';
$config['upload_path']          = $_SERVER['DOCUMENT_ROOT'].'/immofficev2/'.$config['upload_repository'];
$config['allowed_types']        = 'gif|jpg|png|pdf';
$config['max_size']             = 100;
$config['max_width']            = 1024;
$config['max_height']           = 768;

