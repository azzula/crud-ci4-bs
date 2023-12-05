<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Post</title>

    <!-- CSS Here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <?php if(!empty(session()->getFlashdata('message'))) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo session()->getFlashdata('message');?>
                    </div>  
                <?php endif ?>

                <a href="<?php echo base_url('post/create') ?>" class="btn btn-md btn-primary mb-3">Tambah Data</a>

                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Judul</th>
                            <th>Konten</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($posts as $key => $post) : ?>
                            <tr>
                                <td><?php echo $post['title'] ?></td>
                                <td><?php echo $post['content'] ?></td>
                                <td class="text-center">
                                    <a href="<?php echo base_url('post/edit/'.$post['id']) ?>" class="btn btn-sm btn-success">Edit</a>
                                    <a href="<?php echo base_url('post/remove/'.$post['id']) ?>" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                            </tr>

                        <?php endforeach ?>
                    </tbody>
                </table>
                
                <?php echo $pager->links('post', 'bootstrap_pagination') ?>
            </div>
        </div>
    </div>

    <!-- JS Here -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
</body>
</html>
