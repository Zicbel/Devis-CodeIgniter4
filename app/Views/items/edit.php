<!-- app/Views/items/edit.php -->

<?php include(APPPATH . 'Views/navbar.php'); ?>


<div class="container column">

    <!-- Titre de la section pour modifier l'item -->
    <h2>Modifier l'Item</h2>

    <!-- Formulaire de modification avec action pointant vers "/items/update/ID" et méthode "post" -->
    <form action="/items/update/<?= $item['id'] ?>" method="post" class="column">
        <!-- Champ de saisie pour le nom de l'Item avec libellé et valeur actuelle de l'Item -->
        <label for="description">Nom de l'Item</label>
        <input type="text" name="description" id="description" value="<?= $item['description'] ?>" required>

        <!-- Champ de saisie pour le nom de l'Item avec libellé et valeur actuelle de l'Item -->
        <label for="price">Prix de l'Item</label>
        <input type="text" name="price" id="price" value="<?= $item['price'] ?>" required>
        
        <!-- Ajoutez d'autres champs si nécessaire -->

        <!-- Bouton de soumission du formulaire -->
        <input type="submit" value="Mettre à jour">
    </form>
</div>