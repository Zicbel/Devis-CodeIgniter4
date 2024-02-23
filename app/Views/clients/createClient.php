<!-- app/Views/clients/createClient.php -->

<?php include(APPPATH . 'Views/navbar.php'); ?>

<div class="container column">

    <!-- Titre de la section de création d'un client -->
    <h2>Créer un nouveau Client</h2>

    <!-- Formulaire de création avec action pointant vers "/clients/store" et méthode "post" -->
    <form action="/clients/store" method="post" class="column">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="telephone">Téléphone:</label>
        <input type="text" name="telephone" required>

        <label for="numero">Numéro:</label>
        <input type="text" name="numero" required>

        <label for="rue">Rue:</label>
        <input type="text" name="rue" required>

        <label for="code_postal">Code Postal:</label>
        <input type="text" name="code_postal" required>

        <label for="ville">Ville:</label>
        <input type="text" name="ville" required>

        <!-- Ajoutez d'autres champs si nécessaire -->

        <input type="submit" value="Créer le Client">
    </form>
</div>
