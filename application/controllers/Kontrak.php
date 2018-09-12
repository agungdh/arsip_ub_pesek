<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontrak extends CI_Controller {
	function __construct(){
		parent::__construct();

		// if ($this->session->login != true) {
		// 	redirect(base_url());
		// }
	}

	function index() {
		$data['isi'] = 'kontrak/index';
		$data['js'] = 'kontrak/index_js';
		$data['nav'] = 'kontrak/nav';

		$this->load->view('template/template', $data);
	}

	function tambah() {
		$data['isi'] = 'kontrak/tambah';
		$data['nav'] = 'kontrak/nav';

		$this->load->view('template/template', $data);
	}

	function ubah($id) {
		$data['isi'] = 'kontrak/ubah';
		$data['nav'] = 'kontrak/nav';
		$data['data']['kontrak'] = $this->db->get_where('kontrak', ['id_kontrak' => $id])->row();

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

		$this->db->insert('kontrak', $data);

		redirect(base_url('kontrak'));
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

		$this->db->update('kontrak', $data, $where);

		redirect(base_url('kontrak'));
	}

	function aksi_hapus($id) {
		$this->db->delete('detail_kontrak', ['id_kontrak' => $id]);
		$this->db->delete('kontrak', ['id_kontrak' => $id]);

		redirect(base_url('kontrak'));
	}

}