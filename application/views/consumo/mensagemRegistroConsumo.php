
<?php if ($this->session->flashdata("danger")) : ?>
    <p style="margin-top: 20px;" class="alert alert-danger text-center">
        <strong><?= $this->session->flashdata("danger") ?></strong>
    </p>
<?php endif ?>
<?php if ($this->session->flashdata("success")) : ?>
    <p style="margin-top: 20px;" class="alert alert-success text-center">
        <strong><?= $this->session->flashdata("success") ?></strong>
    </p>
<?php endif ?>

