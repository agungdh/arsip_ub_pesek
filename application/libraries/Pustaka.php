<?php

class Pustaka {

	function auth($level, $accept)
	{
		if (!in_array($level, $accept)) {
			redirect(base_url());
		}
	}

	function tanggal_indo($tanggal) {
		return date("d-m-Y", strtotime($tanggal));
	}	

	function tanggal_waktu_indo($tanggal_waktu) {
		return date("d-m-Y H:i:s", strtotime($tanggal_waktu));
	}	

	function tanggal_indo_string($tanggal){
		$bulan = array (
			1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		$pecahkan = explode('-', $tanggal);
	 
		return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
	}

	function tanggal_indo_string_bulan_tahun($bulan_tahun){
		$bulan = array (
			1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		$pecahkan = explode('-', $bulan_tahun);
	 
		return $bulan[ (int)$pecahkan[0] ] . ' ' . $pecahkan[1];
	}
	
	function swal1($pesan) {
		?>
		<script type="text/javascript">
			swal("<?php echo $pesan; ?>");
		</script>
		<?php
	}

	function swal2($header, $pesan) {
		?>
		<script type="text/javascript">
			swal("<?php echo $header; ?>", "<?php echo $pesan; ?>");
		</script>
		<?php	
	}

	function swal3($header, $pesan, $status) {
		?>
		<script type="text/javascript">
			swal("<?php echo $header; ?>", "<?php echo $pesan; ?>", "<?php echo $status; ?>");
		</script>
		<?php		
	}

	function rupiah($angka){
		$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
		return $hasil_rupiah;
	}
	 
}

?>