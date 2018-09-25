<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2 style="text-align: center;">LAPORAN DETAIL KONTRAK</h2>

	<table>
		<tbody>
			<tr>
				<td>Bulan</td>
				<td>: <?php echo $bulan; ?></td>
			</tr>
			<tr>
				<td>Tahun</td>
				<td>: <?php echo $tahun; ?></td>
			</tr>
		</tbody>
	</table>

	<table border="1" width="100%">
        <thead>
            <tr>
                <th style="text-align: center;">NO</th>
                <th style="text-align: center;">No KL</th>
                <th style="text-align: center;">Nama Pekerjaan</th>
                <th style="text-align: center;">Lokasi</th>
                <th style="text-align: center;">Nilai RAB (Rp)</th>
                <th style="text-align: center;">Bagian (Unit)</th>
                <th style="text-align: center;">Tahun</th>
                <th style="text-align: center;">Tanggal Mulai Kontrak</th>
                <th style="text-align: center;">Tanggal Selesai Kontrak</th>
                <th style="text-align: center;">Nama Perusahaan</th>
                <th style="text-align: center;">Status</th>
                <th style="text-align: center;">Berkas</th>
            </tr>
        </thead>
        <tbody>
        	<?php
        	$sql = "SELECT *, YEAR(k.tgl_mulai_kontrak) tahun_kontrak
				FROM detail_kontrak dk, kontrak k, unit u, lokasi l, cv_pt cv
				WHERE dk.id_kontrak = k.id_kontrak 
				AND k.id_unit = u.id_unit 
				AND k.id_lokasi = l.id_lokasi 
				AND dk.id_cv_pt = cv.id_cv_pt
				AND MONTH(k.tgl_mulai_kontrak) = ?
				AND YEAR(k.tgl_mulai_kontrak) = ?
				ORDER BY ";

		switch ($order) {
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

		$query = $this->db->query($sql, [$bulan, $tahun])->result();

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
          <td><?php echo $item->nama_berkas; ?></td>
        </tr>
        <?php
      }
      ?>
        </tbody>
    </table>
</body>
</html>