<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'home';

$route['user/login'] = 'user/login';
$route['user/register'] = 'user/register';


$route['logout'] = 'login/logout';

$route['jadwal_poliklinik/jadwal_poli'] = 'jadwal_poliklinik/jadwal_poli';
$route['jadwal_poliklinik/dokter_poli'] = 'jadwal_poliklinik/dokter_poli';
$route['jadwal_poliklinik/perawat_poli'] = 'jadwal_poliklinik/perawat_poli';
$route['jadwal_poliklinik/registrasi_poli'] = 'jadwal_poliklinik/registrasi_poli';
$route['jadwal_poliklinik/list_poli'] = 'jadwal_poliklinik/list_poli';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
