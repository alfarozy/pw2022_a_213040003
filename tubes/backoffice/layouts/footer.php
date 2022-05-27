<div class="modal fade" id="delete" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-white">
                <h4 class="modal-title">Yakin ingin menghapus data ?</h4>
            </div>
            <form action="#">
                <div class="modal-body border-white ">
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary mx-2" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Batal</button>
                        <button type="button" class="btn btn-danger mx-2 ">Hapus sekarang</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- end modal import -->
<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="#" class="text-muted">Nusantara Hospital Center</a></strong>
    <div class="float-right d-none d-sm-inline-block">
        <span class="text-muted">
            <a href="#"><img width="80px" src="<?= base_url() ?>/assets/backoffice/dist/img/logo/kementrian-kesehatan.png" alt="" srcset=""></a>
        </span>
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= assets("backoffice/plugins/jquery/jquery.min.js") ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= assets("backoffice/plugins/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
<!-- bs-custom-file-input -->
<script src="<?= assets("backoffice/plugins/bs-custom-file-input/bs-custom-file-input.min.js") ?>"></script>
<!-- AdminLTE App -->
<script src="<?= assets("backoffice/dist/js/adminlte.min.js") ?>"></script>
<script src="<?= assets("backoffice/dist/js/ckeditor.js") ?>"></script>
<!-- Page specific script -->

<!-- data table -->
<script src="<?= assets("backoffice/plugins/datatables/jquery.dataTables.min.js") ?>"></script>
<script src="<?= assets("backoffice/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js") ?>"></script>
<script src="<?= assets("backoffice/plugins/datatables-responsive/js/dataTables.responsive.min.js") ?>"></script>
<script src="<?= assets("backoffice/plugins/datatables-responsive/js/responsive.bootstrap4.min.js") ?>"></script>
<script src="<?= assets("backoffice/plugins/toastr/toastr.min.js") ?>"></script>
<script src="<?= assets("backoffice/plugins/select2/js/select2.full.min.js") ?>"></script>
<script>
    $('.rupiah').on('keyup', function(e) {
        $(this).val(formatRupiah($(this).val(), "Rp"));

    })
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
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
    $(function() {

        $('#datatable').DataTable({
            "ordering": false,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": true,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "600",
            "hideDuration": "1000",
            "timeOut": "5000",
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

        <?php if (isset($_SESSION['msg'])) : ?>
            toastr['success']("<?= flash('msg') ?>", 'Success')
        <?php endif; ?>
    });

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "Rp" + rupiah : "";
    }
    $('.province').change(function() {
        var province_id = 0;
        if ($(this).val() != '') {
            var province_id = $(this).val();

            $.ajax({
                url: "<?= base_url('api/region') ?>",
                data: {
                    province: province_id,
                },
                success: function(result) {
                    $('.cities').html(result);
                }

            });
        } else {
            console.log('pilih provinsi terlebih dahulu')
        }
    });
    $('.cities').change(function() {
        var city_id = 0;
        if ($(this).val() != '') {
            var city_id = $(this).val();

            $.ajax({
                url: "<?= base_url('api/region') ?>",
                data: {
                    city: city_id,
                },
                success: function(result) {
                    $('.district').html(result);
                }

            });
        } else {
            console.log('pilih provinsi terlebih dahulu')
        }
    });
    $('.district').change(function() {
        var id = 0;
        if ($(this).val() != '') {
            var id = $(this).val();

            $.ajax({
                url: "<?= base_url('api/region') ?>",
                data: {
                    district: id,
                },
                success: function(result) {
                    $('.areas').html(result);
                }

            });
        } else {
            console.log('pilih provinsi terlebih dahulu')
        }
    });


    ClassicEditor.create(document.querySelector('.editor'), {

            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold', 'italic', 'bulletedList', 'numberedList', 'link',
                    '|',
                    'blockQuote',
                    'insertTable',
                    'mediaEmbed',
                    'imageInsert',
                    '|',
                    'code',
                    'codeBlock',
                    'htmlEmbed'
                ]
            },
            language: 'id',
            licenseKey: '',



        })
        .then(editor => {
            window.editor = editor;




        })
        .catch(error => {
            console.error('Oops, something went wrong!');
            console.error(
                'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:'
            );
            console.warn('Build id: hosofu6grpb-m75gatu85ah8');
            console.error(error);
        });
</script>
</body>

</html>