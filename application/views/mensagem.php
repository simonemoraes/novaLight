<div class="container">
    <div class="col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10 col-xs-12">
        <?php if ($this->session->flashdata("danger")) : ?>
        <h4 class="alert alert-danger alert-dismissible mensagemAlert">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?= $this->session->flashdata("danger") ?>
            </h4>
        <?php endif ?>

        <?php if ($this->session->flashdata("success")) : ?>
            <h4 class="alert alert-success alert-dismissible mensagemAlert">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?= $this->session->flashdata("success") ?>
            </h4>
            <?php endif
        ?>
    </div>

</div>


