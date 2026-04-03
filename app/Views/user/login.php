<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8f9fa; /* Warna background abu-abu terang */
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        #login-wrapper {
            background-color: #ffffff;
            padding: 40px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Efek bayangan kotak */
            border-radius: 5px;
            width: 100%;
            max-width: 450px;
            border: 1px solid #e3e3e3;
        }
        h1 {
            font-size: 28px;
            font-weight: 600;
            color: #555;
            margin-bottom: 20px;
        }
        .btn-custom {
            background-color: #b5b5b5; /* Warna tombol abu-abu sesuai gambar kiri */
            border-color: #b5b5b5;
            color: #333;
        }
        .btn-custom:hover {
            background-color: #9e9e9e;
            color: black;
        }
    </style>
</head>
<body>

<div id="login-wrapper">
    <h1>Sign In</h1>
    
    <?php if(session()->getFlashdata('flash_msg')):?>
        <div class="alert alert-danger"><?= session()->getFlashdata('flash_msg') ?></div>
    <?php endif;?>
    
    <form action="" method="post">
        <div class="mb-3">
            <label for="InputForEmail" class="form-label text-muted">Email address</label>
            <input type="email" name="email" class="form-control" id="InputForEmail" value="<?= set_value('email') ?>">
        </div>
        <div class="mb-3">
            <label for="InputForPassword" class="form-label text-muted">Password</label>
            <input type="password" name="password" class="form-control" id="InputForPassword">
        </div>
        <button type="submit" class="btn btn-custom">Login</button>
    </form>
</div>

</body>
</html>