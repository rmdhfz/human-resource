<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

	public function index()
	{
		$this->load->view('frontend/login');
        // $this->load->view('frontend/home');
	}

	public function proses()
	{
	 	/*
	 	Step:
	 	1. Verifikasi input email
	 	2. Cek db by email
	 	3. Cek password
	 	*/
	 	$email = $this->input->post('email');
	 	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	 		http_response_code(400);
	 		return;
	 	}
	 	$this->load->database(); // load manual
	 	$check = $this->db->query("SELECT * FROM users WHERE email = ?", [$email]);
	 	// ->num_rows(): jumlah baris
	 	// ->result(): hasil berupa array object
	 	// ->result_array(): hasil berupa array
	 	// ->result_row():
	 	// ->row(): hasil berupa object
	 	if ($check->num_rows() == 0) {
	 		http_response_code(404); // data tidak ditemukan
	 		return;
	 	}
	 	$data = $check->row();
	 	$password = $this->input->post('password');
	 	$verify = password_verify($password, $data->password);
	 	if (!$verify) {
	 		http_response_code(401); // unauthorize
	 		return;
	 	}
	 	$this->load->library('session');
	 	$sessions = [
	 		'is_login'		=>	true,
	 		'user_id'		=>	$data->id,
	 		'user_name'		=>	$data->name,
	 		'user_username'	=>	$data->username,
	 		'user_email'	=>	$data->email,
	 	];
	 	$this->session->set_userdata($sessions);
	 	// http_response_code(200);
	 	echo json_encode([
	 		'status'	=> true,
	 		'msg'		=> 'Berhasil login'
	 	]);
	}
}
