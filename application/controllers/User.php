<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->pustaka->auth($this->session->level, ['a']);
	}

	function index() {
		$data['isi'] = 'user/index';
		$data['nav'] = 'user/nav';
		$data['js'] = 'user/index_js';

		$this->load->view('template/template', $data);
	}

	function tambah() {
		$data['isi'] = 'user/tambah';
		$data['nav'] = 'user/nav';

		$this->load->view('template/template', $data);
	}

	function ubah($id) {
		$data['isi'] = 'user/ubah';
		$data['nav'] = 'user/nav';
		$data['data']['user'] = $this->db->get_where('user', ['id_user' => $id])->row();

		$this->load->view('template/template', $data);
	}

	function aksi_tambah() {
		foreach ($this->input->post('data') as $key => $value) {
			switch ($key) {
				case 'password':
					$data[$key] = hash('sha512', $value);
					break;
				default:
					$data[$key] = $value;
					break;
			}
		}

		$this->db->insert('user', $data);

		redirect(base_url('user'));
	}

	function aksi_ubah() {
		foreach ($this->input->post('data') as $key => $value) {
			switch ($key) {
				case 'password':
					if ($value != '') {
						$data[$key] = hash('sha512', $value);
					}
					break;
				default:
					$data[$key] = $value;
					break;
			}
		}

		foreach ($this->input->post('where') as $key => $value) {
			$where[$key] = $value;
		}

		$this->db->update('user', $data, $where);

		redirect(base_url('user'));
	}

	function aksi_ubah_password() {
		foreach ($this->input->post('data') as $key => $value) {
			$data[$key] = hash('sha512', $value);
		}

		foreach ($this->input->post('where') as $key => $value) {
			$where[$key] = $value;
		}

		$this->db->update('user', $data, $where);

		redirect(base_url('user'));
	}

	function aksi_hapus($id) {
		$this->db->delete('user', ['id_user' => $id]);

		redirect(base_url('user'));
	}
}