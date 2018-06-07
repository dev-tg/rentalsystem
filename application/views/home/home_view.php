<!-- ############ LAYOUT START-->
<?php
$this->load->view('include/header.php');
$this->load->view('include/top_navbar_view.php');
?>
                  <ui-view></ui-view>

        <?php $this->load->view('include/footer.php'); ?>
        <script src="<?php echo base_url(); ?>assets/myjs/homeCtrl.js"></script>
        <script src="<?php echo base_url(); ?>assets/myjs/newAddPost.js"></script>
        <?php $this->load->view('include/mainfooter.php'); ?>
        <!-- ############ LAYOUT END-->

