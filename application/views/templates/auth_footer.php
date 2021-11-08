  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
</body>
 <script>
            setTimeout(function() {
                $('#flashdata').hide();
            }, 3000);
        </script>
 <script>
     function clearme() {
         <?php
            if (isset($_SESSION['message'])) :
                unset($_SESSION['message']);
            elseif (isset($_SESSION['message'])) :
                unset($_SESSION['message']);
            endif;
            ?>
     }
 </script>

</html>