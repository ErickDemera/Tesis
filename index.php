<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html lang="es">
  <?php require_once('inc/header.php') ?>
<?php if ($_settings->chk_flashdata('success')) : ?>
    <script>
        $(function () {
            alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success')
        })
    </script>
<?php endif; ?>
<body>
<?php require_once('inc/topBarNav.php') ?>
<?php $page = isset($_GET['p']) ? $_GET['p'] : 'home'; ?>
<?php
if (!file_exists($page . ".php") && !is_dir($page)) {
    include '404.html';
} else {
    if (is_dir($page))
        include $page . '/index.php';
    else
        include $page . '.php';

    }

    if ($page === 'home') {
      include 'inc/contenido.php';
      include 'inc/clientes.php';
  }
  
?>
<?php require_once('inc/footer.php') ?>
</body>
