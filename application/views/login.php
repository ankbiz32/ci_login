<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <title>Login | CI Login & Register</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <style>
        .validation_errors , label.error {
            color: #d00000;
            font-size: 12px;
        }
    </style>
</head>

<body class="container">
    <form class="pt-5" action="Welcome/login_auth" method="POST">
        <h4 class="h4 font-weight-normal">Login</h4>
        <hr>
        <div class="row">
            <div class="form-group col-md-4">
                <label>Email:</label>
                <input type="email" name="email" class="form-control mb-2 email" required>
            </div>

            <div class="form-group col-md-8">
            </div>

            <div class="form-group col-md-4">
                <label>Password:</label>
                <input type="password" name="password" class="form-control mb-2" required>
            </div>
        </div>

        <button class="btn btn-primary  px-5" id="submit" type="submit">Login</button>
    </form>

    <?php if ($this->session->flashdata('validation_errors')) { ?>
        <div class="row mt-3 validation_errors">
            <div class="col-md-4">
                    <?php echo  $this->session->flashdata('validation_errors') ?>
            </div>
        </div>
    <?php } ?>
    <?php if ($this->session->flashdata('error')) { ?>
        <div class="row mt-3">
            <div class="col-md-4">
                <small class="alert alert-danger py-1">
                    <?php echo  $this->session->flashdata('error') ?>
                </small>
            </div>
        </div>
    <?php } ?>

  
    <div class="mt-4">
        Not registered? <a href="<?=base_url('register')?>" class="link">Register now</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script>
        $("form").validate();
    </script>

</body>

</html>