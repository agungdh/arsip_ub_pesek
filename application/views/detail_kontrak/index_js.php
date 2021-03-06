<script type="text/javascript">
$(function () {
    $('.js-basic-example').DataTable({
        responsive: true,
        ordering: false,
    });
});

function hapus(id) {
    swal({
        title: 'Apakah anda yakin?',
        text: "Data akan dihapus!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Hapus!'
    }, function(result) {
        if (result) {
            window.location = "<?php echo base_url('detail_kontrak/aksi_hapus/'); ?>" + id;
        }
    });
};

$('[data-toggle="tooltip"]').tooltip({
    container: 'body'
});
</script>

<script type="text/javascript">
$(function() {
    ajax();
});

$("#bulan").change(function() {
    ajax();
});

$("#tahun").change(function() {
    ajax();
});

$("#order").change(function() {
    ajax();
});

function ajax() {
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('detail_kontrak/ajax'); ?>",
      data: {
        bulan : $("#bulan").val(),
        tahun : $("#tahun").val(),
        order : $("#order").val(),
      },
      success: function(data) {
        $("tbody").html(data);
      }
    });
}
</script>

<script type="text/javascript">
    function laporan() {
        window.location = "<?php echo base_url('detail_kontrak/pdf/'); ?>" + $("#bulan").val() + '/' + $("#tahun").val() + '/' + $("#order").val();
    }
</script>