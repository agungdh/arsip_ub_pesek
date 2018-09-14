<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Apfelbox\FileDownload\FileDownload;

class Detail_kontrak extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->pustaka->auth($this->session->level, ['a', 'p']);
	}

	function index() {
		$data['isi'] = 'detail_kontrak/index';
		$data['js'] = 'detail_kontrak/index_js';
		$data['nav'] = 'detail_kontrak/nav';

		$this->load->view('template/template', $data);
	}

	function tambah() {
		$data['isi'] = 'detail_kontrak/tambah';
		$data['nav'] = 'detail_kontrak/nav';

		$this->load->view('template/template', $data);
	}

	function ubah($id) {
		$data['isi'] = 'detail_kontrak/ubah';
		$data['nav'] = 'detail_kontrak/nav';
		$data['data']['detail_kontrak'] = $this->db->get_where('detail_kontrak', ['id_detail_kontrak' => $id])->row();

		$this->load->view('template/template', $data);
	}

	function aksi_tambah() {
		foreach ($this->input->post('data') as $key => $value) {
			switch ($key) {
				default:
					$data[$key] = $value;
					break;
			}
		}

		$data['nama_berkas'] = $_FILES['berkas']['name'];

		$this->db->insert('detail_kontrak', $data);

		$insert_id = $this->db->insert_id();

		move_uploaded_file($_FILES['berkas']['tmp_name'], 'uploads/berkas/' . $insert_id);

		redirect(base_url('detail_kontrak'));
	}

	function aksi_ubah() {
		foreach ($this->input->post('data') as $key => $value) {
			switch ($key) {
				default:
					$data[$key] = $value;
					break;
			}
		}

		foreach ($this->input->post('where') as $key => $value) {
			switch ($key) {
				default:
					$where[$key] = $value;
					break;
			}
		}

		if ($_FILES['berkas']['size'] > 0) {
			$data['nama_berkas'] = $_FILES['berkas']['name'];
		}

		$this->db->update('detail_kontrak', $data, $where);

		if ($_FILES['berkas']['size'] > 0) {
			move_uploaded_file($_FILES['berkas']['tmp_name'], 'uploads/berkas/' . $where['id_detail_kontrak']);
		}

		redirect(base_url('detail_kontrak'));
	}

	function aksi_hapus($id) {
		$this->db->delete('detail_kontrak', ['id_detail_kontrak' => $id]);

		redirect(base_url('detail_kontrak'));
	}

	function download($id) {
		$detail_kontrak = $this->db->get_where('detail_kontrak', ['id_detail_kontrak' => $id])->row();

		$fileDownload = FileDownload::createFromFilePath('uploads/berkas/' . $detail_kontrak->id_detail_kontrak);
		$fileDownload->sendDownload($detail_kontrak->nama_berkas);
	}

}