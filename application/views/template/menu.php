<li>
    <a href="<?php echo base_url(); ?>">
        <i class="material-icons">home</i>
        <span>Dashboard</span>
    </a>
</li>

<?php
if ($this->session->level == 'a') {
    ?>
    <li>
        <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons">swap_calls</i>
            <span>Data Master</span>
        </a>
        <ul class="ml-menu">
            <li>
                <a href="<?php echo base_url('user'); ?>">
                    User
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('unit'); ?>">
                    Unit
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('lokasi'); ?>">
                    Lokasi
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('cv_pt'); ?>">
                    CV/PT
                </a>
            </li>
        </ul>
    </li>
    <?php
}
?>

<?php
if ($this->session->level == 'a') {
?>
<li>
    <a href="<?php echo base_url('kontrak'); ?>">
        <i class="material-icons">content_copy</i>
        <span>Data Kontrak</span>
    </a>
</li>
<?php
}
?>

<li>
    <a href="<?php echo base_url('detail_kontrak'); ?>">
        <i class="material-icons">assignment</i>
        <span>Data Detail Kontrak</span>
    </a>
</li>