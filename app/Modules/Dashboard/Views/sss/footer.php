
</div>
                    <!-- CONTAINER CLOSED -->

                </div>
            </div>
            <!--app-content closed-->
        </div>
        <footer class="footer">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-md-12 col-sm-12 text-center">
                        Copyright © <?php echo date('Y') ?> All rights reserved.
                    </div>
                </div>
            </div>
        </footer>
    </div>


    <div class="modal fade" id="dinamicModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="dinamicModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <i class="fa fa-spinner fa-spin"></i> loading ...
                </div>
            </div>
        </div>
    </div>
    </div>


    <script src="<?php echo base_url('assets/backend/select2/js/select2.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/bootstrap/js/popper.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/js/jquery.sparkline.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/js/circle-progress.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/charts-c3/d3.v5.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/charts-c3/c3-chart.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/input-mask/jquery.mask.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/sidebar/sidebar.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/sidemenu/sidemenu.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/p-scroll/perfect-scrollbar.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/p-scroll/pscroll.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/p-scroll/pscroll-1.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/js/themeColors.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/js/sticky.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/js/custom.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/sweetalert2/dist/sweetalert2.min.js') ?>"></script>
    <script>
        $(document).ready(function() {
            $('.select2-single').select2();
        });
        // $("#dinamicModals").on("show.bs.modal", function(e) {
        //     var link = $(e.relatedTarget);
        //     $(this).find(".modal-body").load(link.attr("data-bs-href"));
        //     $(this).find("#myModalLabel").text(link.attr("data-bs-title"));
        // });
        $("#dinamicModal").on("show.bs.modal", function(e) {
            var link = $(e.relatedTarget);
            $(this).find(".modal-body").load(link.attr("data-bs-href"));
            $(this).find("#myModalLabel").text(link.attr("data-bs-title"));
        });

        function logout_confirm() {
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Anda akan keluar dari sesi dan kembali ke halaman login!",
                type: 'warning',
                showCancelButton: true,
                allowOutsideClick: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'YA, Logout',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.value) {
                    location.href = '<?php echo site_url('logout') ?>';
                }
            })
        }
    </script>
</body>

</html>