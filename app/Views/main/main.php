<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=  base_url('public/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?=  base_url('public/css/styles.css'); ?>">
    <link rel="stylesheet" href="<?=  base_url('public/css/all.min'); ?>">
    <title>Mini Ferre</title>
</head>

<body>
    <script>
    var path = '<?= base_url(); ?>';
    </script>
    <?php if(isset($header)): ?>
    <header>
        <?= view($header); ?>
    </header>
    <?php endif; ?>
    <?php if(isset($content)): ?>
    <main class="m-auto">
        <?= view($content); ?>
    </main>
    <?php endif;?>
    <?php if(isset($footer)):  ?>
    <footer>
        <?= view($footer) ?>
    </footer>
    <?php endif; ?>
    <script src="https://kit.fontawesome.com/937f402df2.js" crossorigin="anonymous"></script>
    <script src="<?= base_url('public/js/jquery-3.7.1.min.js'); ?>"></script>
    <script src="<?= base_url('public/js/bootstrap.min.js'); ?>"> </script>
</body>

</html>