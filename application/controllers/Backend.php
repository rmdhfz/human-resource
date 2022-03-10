<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {

	private function template($data)
	{
		$this->load->view('backend/dashboard', $data);
	}
	
	public function index()
	{
		$this->template(['file' => 'modul/dashboard/index']);
	}

	public function karyawan()
	{
		$this->template(['file' => 'modul/karyawan/index']);
	}

	public function cuti() {
		$this->template(['file'=> 'modul/cuti/index']);
	}

	public function datatable()
	{
		$this->load->model('model');
		$this->model->datatable_karyawan();
		
	}

	public function datatableCuti(){
		$this->load->model('model');
		$this->model->datatable_cuti();
	}

	public function save()
	{
		$nama	= $this->input->post('nama');
		$email  = $this->input->post('email');
		$jk 	= $this->input->post('jk');

		$data = [
			'nama'	=> $nama,
			'email'	=> $email,
			'jk'	=> $jk
		];

		$this->load->database();
		$save = $this->db->insert('karyawan', $data);

		if (!$save) {
			echo json_encode([
				'status'	=> false,
				'msg'		=> 'Gagal simpan data'
			]);
		}
		echo json_encode([
			'status'	=> true,
			'msg'		=> 'Berhasil simpan data'
		]);
	}

	public function id()
	{
		$id = $this->input->post('id');

		$this->load->database();
		$d = $this->db->query("SELECT * FROM karyawan WHERE id = ? LIMIT 1", [$id]);
        if ($d->num_rows() == 0) {
            http_response_code(404);
            return;
        }
        json([
			'status'	=> true,
			'msg'		=> 'Berhasil',
            'data'      => $d->row()
		]);
	}

	public function edit()
	{
		$id = $this->input->post('id');

		$nama	= $this->input->post('nama');
		$email  = $this->input->post('email');
		$jk 	= $this->input->post('jk');

		$data = [
			'nama'	=> $nama,
			'email'	=> $email,
			'jk'	=> $jk
		];

		$this->load->database();
		$update = $this->db->where('id', $id)->update('karyawan', $data);

		if (!$update) {
			echo json_encode([
				'status'	=> false,
				'msg'		=> 'Gagal edit data'
			]);
		}

		echo json_encode([
			'status'	=> true,
			'msg'		=> 'Berhasil edit data'
		]);
	}

	public function delete()
	{
		$id = $this->input->post('id');
		$this->load->database();

		$delete = $this->db->where('id', $id)->delete('karyawan');

		if (!$delete) {
			echo json_encode([
				'status'	=> false,
				'msg'		=> 'Gagal hapus data'
			]);
		}
		echo json_encode([
			'status'	=> true,
			'msg'		=> 'Berhasil hapus data'
		]);
	}
}
