<!-- app/Views/items/createItem.php -->

<?php include(APPPATH . 'Views/navbar.php'); ?>

<div class="container column">

    <!-- Titre de la section de créer un Item -->
    <h2>Créer un nouvel Item</h2>

    <!-- Formulaire de création avec action pointant vers "/items/save" et méthode "post" -->
    <form action="/items/store" method="post" class="column">

        <label for="description">Description:</label>
        <input type="text" name="description" required>

        <label for="price">Prix:</label>
        <input type="text" name="price" required>

        <!-- Ajoutez d'autres champs si nécessaire -->

        <input type="submit" value="Créer l'Item">
    </form>
</div>