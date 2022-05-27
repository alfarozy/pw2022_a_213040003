 <!-- /.login-card-body -->
 <div class="row justify-content-center mt-5">
     <div class="col-12">
         <span class="text-muted">
             <a href="#"><img width="80px" src="<?= assets("backoffice/dist/img/logo/kementrian-kesehatan.png") ?>" alt="" srcset=""></a>
         </span>
     </div>
 </div>

 <!-- jQuery -->
 <script src="<?= assets("backoffice/plugins/jquery/jquery.min.js") ?>"></script>
 <!-- Bootstrap 4 -->
 <script src="<?= assets("backoffice/plugins/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
 <!-- AdminLTE App -->
 <script src="<?= assets("backoffice/dist/js/adminlte.min.js") ?>"></script>
 <script src="<?= assets("backoffice/plugins/toastr/toastr.min.js") ?>"></script>
 <script src="<?= assets("backoffice/plugins/select2/js/select2.full.min.js") ?>"></script>
 <script src="<?= assets("backoffice/plugins/toastr/toastr.min.js") ?>"></script>


 <script>
     $('.input-img').change(function() {
         const file = this.files[0];
         if (file && file.name.match(/\.(jpg|jpeg|png|svg)$/)) {
             let reader = new FileReader();
             reader.onload = function(event) {
                 $('.image-preview').attr('src', event.target.result)
             }
             reader.readAsDataURL(file);
         } else {
             alert('please upload image file');
         }
     });
     $('.select2bs4').select2({
         theme: 'bootstrap4'
     })
     toastr.options = {
         "closeButton": false,
         "debug": false,
         "newestOnTop": true,
         "progressBar": false,
         "positionClass": "toast-top-center",
         "preventDuplicates": true,
         "onclick": null,
         "showDuration": "600",
         "hideDuration": "1500",
         "timeOut": "8000",
         "extendedTimeOut": "1000",
         "showEasing": "swing",
         "hideEasing": "linear",
         "showMethod": "fadeIn",
         "hideMethod": "fadeOut"
     }
     <?php if (isset($_SESSION['success'])) : ?>
         toastr['success']("<?= flash('success') ?>", 'Success')
     <?php endif; ?>

     <?php if (isset($_SESSION['error'])) : ?>
         toastr['error']("<?= flash('error') ?>", 'Error')
     <?php endif; ?>
     <?php if (isset($_SESSION['info'])) : ?>
         toastr['info']("<?= flash('info') ?>", 'Pemberitahuan')
     <?php endif; ?>

     <?php if (isset($_SESSION['msg'])) : ?>
         toastr['success']("<?= flash('msg') ?>", 'Success')
     <?php endif; ?>
 </script>
 </body>

 </html>