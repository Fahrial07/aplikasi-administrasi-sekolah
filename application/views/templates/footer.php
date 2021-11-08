 <!-- Footer -->
 <footer class="sticky-footer bg-white">
     <div class="container my-auto">
         <div class="copyright text-center my-auto">
             <span>Copyright &copy; SIAP-<em>bayar </em><?= date('Y'); ?> <em class="badge badge-info"> beta</em> | Build by Salahul Bain | Theme <a href="https://startbootstrap.com/themes/sb-admin-2"> SB Admin 2</a>
             </span>
         </div>
     </div>
 </footer> <!-- End of Footer -->

 </div>
 <!-- End of Content Wrapper -->

 </div>
 <!-- End of Page Wrapper -->

 <!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top">
     <i class="fas fa-angle-up"></i>
 </a>

 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
                 <a class="btn btn-danger" href="<?= base_url('auth/logout'); ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
             </div>
         </div>
     </div>
 </div>


 <!-- Bootstrap core JavaScript-->
 <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
 <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

 <!-- Page level plugins -->
 <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>
 <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
 <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

 <!-- Page level custom scripts -->
 <script src="<?= base_url('assets/'); ?>js/demo/chart-area-demo.js"></script>
 <script src="<?= base_url('assets/'); ?>js/demo/chart-pie-demo.js"></script>

 <script>
     $(document).ready(function() {
         $('#dataTable').DataTable();
     });

     $(document).ready(function() {
         $('#tableIuran').DataTable();
     });

     $(document).ready(function() {
         $('#tableSemester').DataTable();
     });

     $(document).ready(function() {
         $('#tableKelas').DataTable();
     });
 </script>

 <script>
     $('.custom-file-input').on('change', function() {
         let fileName = $(this).val().split('\\').pop();
         $(this).next('.custom-file-label').addClass("selected").html(fileName);
     });
 </script>

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