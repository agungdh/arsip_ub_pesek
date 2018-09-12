<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->pustaka->auth($this->session->level, ['a']);
	}

	function index() {
		$data['isi'] = 'lokasi/index';
		$data['js'] = 'lokasi/index_js';
		$data['nav'] = 'lokasi/nav';

		$this->load->view('template/template', $data);
	}

	function tambah() {
		$data['isi'] = 'lokasi/tambah';
		$data['nav'] = 'lokasi/nav';

		$this->load->view('template/template', $data);
	}

	function ubah($id) {
		$data['isi'] = 'lokasi/ubah';
		$data['nav'] = 'lokasi/nav';
		$data['data']['lokasi'] = $this->db->get_where('lokasi', ['id_lokasi' => $id])->row();

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

		$this->db->insert('lokasi', $data);

		redirect(base_url('lokasi'));
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

		$this->db->update('lokasi', $data, $where);

		redirect(base_url('lokasi'));
	}

	function aksi_hapus($id) {
		$this->db->delete('lokasi', ['id_lokasi' => $id]);

		redirect(base_url('lokasi'));
	}

}