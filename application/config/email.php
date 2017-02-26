<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['protocol'] = 'smtp';
$config['charset']  = 'iso-8859-1'; //Change this you your preferred charset 
$config['wordwrap'] = TRUE;
$config['mailtype'] = 'html'; //Use 'text' if you don't need html tags and images

$config['smtp_host'] = 'smtp.mandrillapp.com';
$config['smtp_user'] = 'gabypirson@gmail.com';
$config['smtp_pass'] = 'hdZ2Vxj_VI1IywbEFSAC7Q';
$config['smtp_port'] = '587';