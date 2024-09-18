<div class="login-img ">
    <div class="page" style="background-image: url('<?php echo base_url('assets/bg.jpg') ?>') !important; background-size:cover">
        <div class="">
            <div class="container-login100">
                <div class="wrap-login100 p-6">
                    <?= form_open('', array('id' => 'registrasi-form', 'class' => 'login100-form validate-form')); ?>
                    <div class="pb-2">
                        <div class="text-center pb-3">
                            <a href="<?php echo site_url('') ?>" title="Gleh Store">
                                <img src="<?php echo base_url('assets/logo-gleh-black.svg') ?>" class="header-brand-img" alt="Gleh Store" style="max-width: 180px;">
                            </a>
                        </div>
                        <span class="login100-form-title" style="text-align: left;padding-bottom:0px">
                            Register
                        </span>
                        <p>
                          Register
                        </p>
                    </div>
                    <hr style="border-top: 1px solid #000;margin:0px">
                    <div class="panel panel-primary">
                        <div class="panel-body tabs-menu-body p-0 pt-5">
                            <div class="tab-content">
                                <div class="tab-pane active">
                                    <label for="">UserID</label>
                                    <div class="wrap-input100 validate-input input-group">
                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                            <i class="zmdi zmdi-account text-muted" aria-hidden="true"></i>
                                        </a>
                                        <input name="user_username" class="input100 border-start-0 form-control ms-0" type="text" id="UserID" placeholder="UserID" autocomplete="off">
                                    </div>
                                    <label for="">Email</label>
                                    <div class="wrap-input100 validate-input input-group">
                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                            <i class="zmdi zmdi-account text-muted" aria-hidden="true"></i>
                                        </a>
                                        <input name="user_email" class="input100 border-start-0 form-control ms-0" type="text" id="Email" placeholder="Email" autocomplete="off">
                                    </div>
                                    <label for="">Nama</label>
                                    <div class="wrap-input100 validate-input input-group">
                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                            <i class="zmdi zmdi-account text-muted" aria-hidden="true"></i>
                                        </a>
                                        <input name="user_nama" class="input100 border-start-0 form-control ms-0" type="text" id="nama" placeholder="Nama" autocomplete="off">
                                    </div>
                                    <div class="mt-5">
                                        <label for="">Password</label>
                                        <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                            </a>
                                            <input name="user_password" class="input100 border-start-0 form-control ms-0" id="UserPassword" type="password" placeholder="Password" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="text-end pt-4">
                                        <p class="mb-0"><a href="<?php echo site_url('login') ?>" class="text-primary ms-1">Login</a></p>
                                    </div>
                                    <div class="container-login100-form-btn">
                                        <button type="submit" class="login100-form-btn" style="background: #c90c25;border:1px solid #f9ca24;color:#fcfafa;font-weight: bold;" id="btn01">REGISTER</button>
                                        <button type="submit" class="login100-form-btn" style="background: #c90c25;border:1px solid #f9ca24;color:#fcfafa;font-weight: bold;" disabled id="btn02">MEMPROSES</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?= form_close(); ?>
                    <script type="text/javascript">
                        jQuery(document).ready(function($) {
                            $('#btn02').hide();
                            $('#registrasi-form').submit(function(event) {
                                event.preventDefault();
                                $('#btn01').hide();
                                $('#btn02').show();
                                console.log($('#registrasi-form').serialize());
                                $('#registrasi-form').loading();
                                $.ajax({
                                        url: '<?php echo site_url('postdata/public_post/auth/do_register') ?>',
                                        type: 'post',
                                        dataType: 'json',
                                        data: $('#registrasi-form').serialize(),
                                    })
                                    .done(function(data) {
                                        updateCSRF(data.csrf_data);
                                        // grecaptcha.reset();
                                        if (data.status) {
                                            location.href = '<?php echo site_url('login') ?>';
                                        } else {
                                            swal({
                                                html: true,
                                                title: data.heading,
                                                text: data.message,
                                                type: data.type
                                            })
                                        }

                                    })

                                    .always(function() {
                                        $('#registrasi-form').loading('stop');
                                    });
                                $('#btn01').show();
                                $('#btn02').hide();


                            });

                        });
                        $(document).ready(function() {
                            if (localStorage.getItem('username') && localStorage.getItem('password')) {
                                $('#UserID').val(localStorage.getItem('username'));
                                $('#UserPassword').val(localStorage.getItem('password'));
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>