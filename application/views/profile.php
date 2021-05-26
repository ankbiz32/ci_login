<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <title>Profile | CI Login & Register</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body class="container">
    <form class="pt-5" action="" method="POST">
        <h4 class="h4 font-weight-normal">Profile</h4>
        <hr>
        <div class="row">
            <div class="form-group col-md-4">
                <label>Name:</label>
                <p class="font-weight-bold"><?=$this->session->user->name ?></p>
            </div>
            <div class="form-group col-md-4">
                <label>Email:</label>
                <p class="font-weight-bold"><?=$this->session->user->email?></p>
            </div>
            <div class="form-group col-md-4">
            </div>
            <div class="form-group col-md-4">
                <label>Contact no:</label>
                <p class="font-weight-bold"><?=$this->session->user->contact?></p>
            </div>
            <div class="form-group col-md-4">
                <label>Registered on:</label>
                <p class="font-weight-bold"><?=date('d-M-Y',strtotime($this->session->user->created_at))?></p>
            </div>
        </div>

        <a class="btn btn-outline-danger" href="<?= base_url('logout') ?>">Logout</a>
    </form>

    <?php if ($this->session->flashdata('success')) { ?>
        <div class="row mt-3">
            <div class="col-md-4">
                <small class="alert alert-success py-1">
                    <?= $this->session->flashdata('success') ?>
                </small>
            </div>
        </div>
    <?php } ?>

</body>

</html>