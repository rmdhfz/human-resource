<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Alur CI:
/*
    1. routes.php
    2. controller
    3. cari index
    4. baca fungsi didalam index
    5. cek folder index
*/
$route = [
	'default_controller'	=>	'Frontend',
	'404_override'			=>	'',
	'translate_uri_dashes'	=>	FALSE,

	'login/proses'			=>	'Frontend/proses',
	'dashboard'				=>	'Backend',
	'karyawan'				=>	'Backend/karyawan',
	'karyawan/datatable'	=>	'Backend/datatable',

	'karyawan/save'			=> 'Backend/save',
	'karyawan/id'			=> 'Backend/id',
	'karyawan/edit'			=> 'Backend/edit',
	'karyawan/delete'		=> 'Backend/delete',
];
