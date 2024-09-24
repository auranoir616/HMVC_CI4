<h1>dashboard</h1>
<?= $greeting; ?>
<?= $islogin; ?>
<?php 
$session = \Config\Services::session();
$user = userdata();
print_r($data_group);
echo $user->username;
echo $session->get('admin_userid') ?? 'kosong';
print_r(get_user_info($user->id));
?>
<a href="<?= site_url('logout') ?>">Logout</a>

<a data-bs-href="<?php echo base_url('modal/admin/admin-modal') ?>" data-bs-title="UPDATE MEMBER" data-bs-remote="false" data-bs-toggle="modal" data-bs-target="#dinamicModal" data-bs-backdrop="static" data-bs-keyboard="false" title="UPDATE MEMBER" class="btn btn-sm btn-primary text-white mb-1" style="min-width: 75px;">
     Modal admin
    </a>
<a data-bs-href="<?php echo base_url('modal/member/member-modal') ?>" data-bs-title="UPDATE MEMBER" data-bs-remote="false" data-bs-toggle="modal" data-bs-target="#dinamicModal" data-bs-backdrop="static" data-bs-keyboard="false" title="UPDATE MEMBER" class="btn btn-sm btn-primary text-white mb-1" style="min-width: 75px;">
     Modal member
    </a>

