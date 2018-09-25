<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontrak extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->pustaka->auth($this->session->level, ['a', 'p']);
	}

	function index() {
		$data['isi'] = 'kontrak/index';
		$data['js'] = 'kontrak/index_js';
		$data['nav'] = 'kontrak/nav';

		$this->load->view('template/template', $data);
	}

	function tambah() {
		$data['isi'] = 'kontrak/tambah';
		$data['js'] = 'kontrak/tambah_js';
		$data['nav'] = 'kontrak/nav';

		$this->load->view('template/template', $data);
	}

	function ubah($id) {
		$data['isi'] = 'kontrak/ubah';
		$data['js'] = 'kontrak/ubah_js';
		$data['nav'] = 'kontrak/nav';
		$data['data']['kontrak'] = $this->db->get_where('kontrak', ['id_kontrak' => $id])->row();

		$this->load->view('template/template', $data);
	}

	function aksi_tambah() {
		$kontrak = $this->db->get_where('kontrak', ['no_kl' => $this->input->post('data[no_kl]')])->row();

		if ($kontrak != null) {
			$this->session->set_flashdata('error', true);

			redirect(base_url('kontrak/tambah'));
		}

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

		$kontrak_master = $this->db->get_where('kontrak', ['id_kontrak' => $this->input->post('where[id_kontrak]')])->row();

		if ($kontrak_master->no_kl != $data['no_kl']) {
			$kontrak = $this->db->get_where('kontrak', ['no_kl' => $this->input->post('data[no_kl]')])->row();

			if ($kontrak != null) {
				$this->session->set_flashdata('error', true);

				redirect(base_url('kontrak/ubah/' . $where['id_kontrak']));
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

	function ajax() {
		$sql = "SELECT *
				FROM kontrak k, unit u, lokasi l
				WHERE k.id_unit = u.id_unit
				AND k.id_lokasi = l.id_lokasi
				AND MONTH(k.tgl_mulai_kontrak) = ?
				AND YEAR(k.tgl_mulai_kontrak) = ?
				ORDER BY ";

		switch ($this->input->post('order')) {
			case 'tanggala':
				$sql .= 'k.tgl_mulai_kontrak ASC';
				break;
			case 'tanggalz':
				$sql .= 'k.tgl_mulai_kontrak DESC';
				break;
			case 'raba':
				$sql .= 'k.nilai ASC';
				break;
			case 'rabz':
				$sql .= 'k.nilai DESC';
				break;
			default:
				break;
		}

		$query = $this->db->query($sql, [$this->input->post('bulan'), $this->input->post('tahun')])->result();

		?>
		<!-- 
		<?php echo $this->db->last_query(); ?>
		 -->
		<?php

		$i = 1;
		foreach ($query as $item) {
		?>
		<tr>
		  <td><?php echo $i++; ?></td>
		  <td><?php echo $item->nama_pekerjaan; ?></td>
		  <td><?php echo $this->db->get_where('unit', ['id_unit' => $item->id_unit])->row()->nama_unit; ?></td>
		  <td><?php echo $this->db->get_where('lokasi', ['id_lokasi' => $item->id_lokasi])->row()->nama_lokasi; ?></td>
		  <td><?php echo $this->pustaka->tanggal_indo($item->tgl_mulai_kontrak); ?></td>
		  <td><?php echo $this->pustaka->tanggal_indo($item->tgl_selesai_kontrak); ?></td>
		  <td><?php echo $item->no_kl; ?></td>
		  <td><?php echo $this->pustaka->rupiah($item->nilai); ?></td>
		    <td style="text-align: center;">
		      <?php
		      if ($this->session->level == 'a') {
		        ?>
		        <a href="<?php echo base_url('kontrak/ubah/' . $item->id_kontrak); ?>">
		          <button type="button" class="btn bg-blue waves-effect" data-toggle="tooltip" data-placement="top" title="Ubah">
		            <i class="material-icons">edit</i>
		          </button>
		        </a>
		        <a href="javascript:void(0)">
		          <button type="button" class="btn bg-red waves-effect" onclick="hapus('<?php echo $item->id_kontrak; ?>')" data-toggle="tooltip" data-placement="top" title="Hapus">
		            <i class="material-icons">delete</i>
		          </button>
		        </a>
		        <?php
		      }
		      ?>
		    </td>
		</tr>
		<?php
		}
	}
}