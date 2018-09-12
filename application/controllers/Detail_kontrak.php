<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_kontrak extends CI_Controller {
	function __construct(){
		parent::__construct();

		// if ($this->session->login != true) {
		// 	redirect(base_url());
		// }
	}

	function index($id_kontrak) {
		$data['isi'] = 'detail_kontrak/index';
		$data['js'] = 'detail_kontrak/index_js';
		$data['nav'] = 'detail_kontrak/nav';
		$data['data']['kontrak'] = $this->db->get_where('kontrak', ['id_kontrak' => $id_kontrak])->row();

		$this->load->view('template/template', $data);
	}

	function tambah($id_kontrak) {
		$data['isi'] = 'detail_kontrak/tambah';
		$data['nav'] = 'detail_kontrak/nav';
		$data['data']['kontrak'] = $this->db->get_where('kontrak', ['id_kontrak' => $id_kontrak])->row();

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

		$this->db->insert('detail_kontrak', $data);

		$insert_id = $this->db->insert_id();

		

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

		$this->db->update('detail_kontrak', $data, $where);

		redirect(base_url('detail_kontrak'));
	}

	function aksi_hapus($id) {
		$this->db->delete('detail_kontrak', ['id_detail_kontrak' => $id]);

		redirect(base_url('detail_kontrak'));
	}

}