<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {

	public function datatable_karyawan()
	{
		
		$this->load->database();
		$data = $this->db->query("SELECT * FROM karyawan");
		if ($data->num_rows() == 0) {
			echo json_encode(null);
			return;
		}
		$result = ['data' => []];
		$no = 0;
		foreach ($data->result() as $key => $val) { $no++;
			$result['data'][$key] = [
				$no,
				$val->nama,
				$val->email,
				($val->jk) == 1 ? "Laki-laki" : "Perempuan",
				'<button id="edit" class="btn btn-flat btn-sm btn-warning" data-id="'.$val->id.'"> Edit </button>

				<button id="delete" class="btn btn-flat btn-sm btn-danger" data-id="'.$val->id.'"> Delete </button>
				'
			];
		}
		echo json_encode($result);
	}


	public function datatable_cuti () {
		$this->load->database();
		$data = $this->db->query("SELECT * FROM cuti");
		if ($data->num_rows() == 0){
			echo json_encode(null);
			return;
		}
		$result = ['data' => []];
		$no = 0;
		foreach ($data->result() as $key => $value) {
			$no++;
			$result['data'][$key] = [
				$no,
				$value->nama,
				$value->jenis,
				$value->awal,
				$value->akhir,
				$value->lama,
				$value->deskripsi,
			
			];
		}
		echo json_encode($result);
	}
}
