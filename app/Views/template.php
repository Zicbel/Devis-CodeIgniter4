<!-- app/Views/template.php -->

<!DOCTYPE html>
<html>
    <head>
        <!-- Importe la feuille de style CSS pour la mise en page -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('../style.css'); ?>">
    </head>
    <body>
        <!-- Affiche le contenu dynamique de la vue spécifique qui est injecté ici, 
            le contenu est donné dans les controllers via le content 
        -->
        <?php echo $content; ?>
    </body>
</html>
