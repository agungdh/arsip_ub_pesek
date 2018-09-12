<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	function index() {
		if ($this->session->login != true) {
			redirect(base_url('login'));
		} else {
			redirect(base_url('dashboard'));
		}
	}

	function login() {
		$data_user = $this->db->get_where('user', ['username' => $this->input->post('username'), 'password' => hash("sha512", $this->input->post('password'))])->row();

		if ($data_user != null) {			
			$array_data_user = array(
				'id_user'  => $data_user->id_user,
				'nama'  => $data_user->nama,
				'username'  => $data_user->username,
				'level'  => $data_user->level,
				'login'  => true
			);

			$this->session->set_userdata($array_data_user);

			redirect(base_url());
		} else {
			$data['header'] = "ERROR !!!";
			$data['pesan'] = "Username / Password Salah !!!";
			$data['status'] = "error";
			
			$data['username'] = $this->input->post('username');

			$data['login'] = false;

			$this->session->set_flashdata('flash', $data);

			redirect(base_url('login'));
		}
	}

}