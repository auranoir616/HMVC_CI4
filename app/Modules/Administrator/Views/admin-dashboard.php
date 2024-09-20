<h1>admin dashboard</h1>
<?= $greeting; ?>
<?= $islogin; ?>
<?php 
$user = userdata();
echo $user->username
?>
<a href="<?= site_url('logout') ?>">Logout</a>

<a data-bs-href="<?php echo base_url('modal/admin/admin-modal') ?>" data-bs-title="UPDATE MEMBER" data-bs-remote="false" data-bs-toggle="modal" data-bs-target="#dinamicModal" data-bs-backdrop="static" data-bs-keyboard="false" title="UPDATE MEMBER" class="btn btn-sm btn-primary text-white mb-1" style="min-width: 75px;">
     Modal admin
    </a>
<a data-bs-href="<?php echo base_url('modal/member/member-modal') ?>" data-bs-title="UPDATE MEMBER" data-bs-remote="false" data-bs-toggle="modal" data-bs-target="#dinamicModal" data-bs-backdrop="static" data-bs-keyboard="false" title="UPDATE MEMBER" class="btn btn-sm btn-primary text-white mb-1" style="min-width: 75px;">
     Modal member
    </a>

