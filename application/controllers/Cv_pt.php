<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cv_pt extends CI_Controller {
	function __construct(){
		parent::__construct();

		// if ($this->session->login != true) {
		// 	redirect(base_url());
		// }
	}

	function index() {
		$data['isi'] = 'cv_pt/index';
		$data['js'] = 'cv_pt/index_js';
		$data['nav'] = 'cv_pt/nav';

		$this->load->view('template/template', $data);
	}

	function tambah() {
		$data['isi'] = 'cv_pt/tambah';
		$data['nav'] = 'cv_pt/nav';

		$this->load->view('template/template', $data);
	}

	function ubah($id) {
		$data['isi'] = 'cv_pt/ubah';
		$data['nav'] = 'cv_pt/nav';
		$data['data']['cv_pt'] = $this->db->get_where('cv_pt', ['id_cv_pt' => $id])->row();

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

		$this->db->insert('cv_pt', $data);

		redirect(base_url('cv_pt'));
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

		$this->db->update('cv_pt', $data, $where);

		redirect(base_url('cv_pt'));
	}

	function aksi_hapus($id) {
		$this->db->delete('cv_pt', ['id_cv_pt' => $id]);

		redirect(base_url('cv_pt'));
	}

}