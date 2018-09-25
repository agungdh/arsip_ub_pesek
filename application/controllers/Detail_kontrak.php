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

	function ajax() {
		$sql = "SELECT *, YEAR(k.tgl_mulai_kontrak) tahun_kontrak
				FROM detail_kontrak dk, kontrak k, unit u, lokasi l, cv_pt cv
				WHERE dk.id_kontrak = k.id_kontrak 
				AND k.id_unit = u.id_unit 
				AND k.id_lokasi = l.id_lokasi 
				AND dk.id_cv_pt = cv.id_cv_pt
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
          <td><?php echo $item->no_kl; ?></td>
          <td><?php echo $item->nama_pekerjaan; ?></td>
          <td><?php echo $item->nama_lokasi; ?></td>
          <td><?php echo $this->pustaka->rupiah($item->nilai); ?></td>
          <td><?php echo $item->nama_unit; ?></td>
          <td><?php echo $item->tahun_kontrak; ?></td>
          <td><?php echo $this->pustaka->tanggal_indo($item->tgl_mulai_kontrak); ?></td>
          <td><?php echo $this->pustaka->tanggal_indo($item->tgl_selesai_kontrak); ?></td>
          <td><?php echo $item->nama_perusahaan; ?></td>
          <td><?php echo $item->status_kontrak == 'pm' ? 'Pemenang' : 'Pendamping'; ?></td>
          <td><a href="<?php echo base_url('detail_kontrak/download/' . $item->id_detail_kontrak); ?>"><?php echo $item->nama_berkas; ?></a></td>
            <?php
            if ($this->session->level == 'a') {
              ?>
            <td style="text-align: center;">
              <a href="<?php echo base_url('detail_kontrak/ubah/' . $item->id_detail_kontrak); ?>">
                <button type="button" class="btn bg-blue waves-effect" data-toggle="tooltip" data-placement="top" title="Ubah">
                  <i class="material-icons">edit</i>
                </button>
              </a>
              <a href="javascript:void(0)">
                <button type="button" class="btn bg-red waves-effect" onclick="hapus('<?php echo $item->id_detail_kontrak; ?>')" data-toggle="tooltip" data-placement="top" title="Hapus">
                  <i class="material-icons">delete</i>
                </button>
              </a>
            </td>
            <?php
            }
            ?>
        </tr>
        <?php
      }
	}

}