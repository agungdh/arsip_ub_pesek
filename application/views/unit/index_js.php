<script type="text/javascript">
$(function () {
    $('.js-basic-example').DataTable({
        responsive: true
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
            window.location = "<?php echo base_url('unit/aksi_hapus/'); ?>" + id;
        }
    });
};

$('[data-toggle="tooltip"]').tooltip({
    container: 'body'
});
</script>