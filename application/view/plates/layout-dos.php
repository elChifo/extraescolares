<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $titulo ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- JS -->
   <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- define the project's URL (to make AJAX calls possible, even when using this in sub-folders etc) -->
    <script>
        var url = "<?php echo URL; ?>";
    </script>

    <!-- our JavaScript -->
    <script src="<?php echo URL; ?>js/application.js"></script>
    <!-- CSS -->
    <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
</head>
<body>
    <!-- logo -->
    <div class="logo">
        <a href="http://www.activatumundo.es/">
            <img src="../img/image.png" alt="activatumundo.es" height="110" width="110" border="0" fixed> 
        </a> 
        
        <img src="../img/extraescolares.png" alt="Extraescolares" height="90" width="787">

        <a href="http://www.activatumundo.es/">
            <img src="../img/image.png" alt="activatumundo.es" height="110" width="110" border="0" fixed> 
        </a> 
    </div>

    <!-- navigation -->
<?php $this->insert('partials/menu') ?>

<?= $this->section('content') ?>

    <!-- jQuery, loaded in the recommended protocol-less way -->
    <!-- more http://www.paulirish.com/2010/the-protocol-relative-url/ -->
    
</body>
</html>

