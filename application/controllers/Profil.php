<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->pustaka->auth($this->session->level, ['a', 'p']);
	}

	function index() {
		$data['isi'] = 'profil/index';
		$data['nav'] = 'profil/nav';
		$data['data']['user'] = $this->db->get_where('user', ['id_user' => $this->session->id_user])->row();

		$this->load->view('template/template', $data);
	}

	function aksi_ubah() {
		$fav = $_FILES['foto'];
		if ($fav['size'] != 0) {
			move_uploaded_file($fav['tmp_name'], 'uploads/userimage/temp/' . $this->session->id_user);

			$image = new \Gumlet\ImageResize('uploads/userimage/temp/' . $this->session->id_user);
			$image->crop(64, 64);
			$image->save('uploads/userimage/' . $this->session->id_user);

			unlink('uploads/userimage/temp/' . $this->session->id_user);
		}

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

		$this->session->set_userdata('nama', $data['nama']);
		$this->session->set_userdata('username', $data['username']);

		redirect(base_url('user'));
	}

}