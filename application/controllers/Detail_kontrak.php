<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Apfelbox\FileDownload\FileDownload;

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
		$data['data']['kontrak'] = $this->db->get_where('kontrak', ['id_kontrak' => $data['data']['detail_kontrak']->id_kontrak])->row();

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

		redirect(base_url('detail_kontrak/index/' . $data['id_kontrak']));
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

		$data['nama_berkas'] = $_FILES['berkas']['name'];

		$id_kontrak = $this->db->get_where('detail_kontrak', ['id_detail_kontrak' => $where['id_detail_kontrak']])->row()->id_kontrak;

		$this->db->update('detail_kontrak', $data, $where);

		move_uploaded_file($_FILES['berkas']['tmp_name'], 'uploads/berkas/' . $where['id_detail_kontrak']);

		redirect(base_url('detail_kontrak/index/' . $id_kontrak));
	}

	function aksi_hapus($id) {
		$id_kontrak = $this->db->get_where('detail_kontrak', ['id_detail_kontrak' => $id])->row()->id_kontrak;

		$this->db->delete('detail_kontrak', ['id_detail_kontrak' => $id]);

		redirect(base_url('detail_kontrak/index/' . $id_kontrak));
	}

	function download($id) {
		$detail_kontrak = $this->db->get_where('detail_kontrak', ['id_detail_kontrak' => $id])->row();

		$fileDownload = FileDownload::createFromFilePath('uploads/berkas/' . $detail_kontrak->id_detail_kontrak);
		$fileDownload->sendDownload($detail_kontrak->nama_berkas);
	}

}