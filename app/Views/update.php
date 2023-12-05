<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>

    <!-- CSS Here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <?php if(isset($validation)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $validation->listErrors() ?>
                    </div>
                <?php } ?>

                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo base_url('post/update/'.$post['id']) ?>" method="post">
                            <div class="mb-3">
                                <label for="title" class="form-label">Judul</label>
                                <input type="text" name="title" id="title" value="<?php echo $post['title'] ?>" placeholder="Masukkan Title" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Konten</label>
                                <textarea name="content" id="content" placeholder="Masukkan Konten" class="form-control" rows="4"><?php echo $post['content'] ?></textarea>
                            </div>

                            <button type="submit" class="btn btn-success">Perbarui</button>
                            <a href="<?php echo base_url('post') ?>" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Here -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
</body>
</html>
