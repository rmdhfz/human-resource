<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
	'karyawan/update'		=> 'Backend/update',
	'karyawan/delete'		=> 'Backend/delete',
];
