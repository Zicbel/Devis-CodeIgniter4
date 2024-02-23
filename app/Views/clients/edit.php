<!-- app/Views/clients/edit.php -->

<?php include(APPPATH . 'Views/navbar.php'); ?>

<div class="container column">

    <!-- Titre de la section pour modifier le client -->
    <h2>Modifier le Client</h2>

    <!-- Formulaire de modification avec action pointant vers "/clients/update/ID" et méthode "post" -->
    <form action="/clients/update/<?= $client['id'] ?>" method="post" class="column">
        <!-- Champ de saisie pour le nom du client avec libellé et valeur actuelle du client -->
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" value="<?= $client['nom'] ?>" required>

        <!-- Champ de saisie pour l'email du client avec libellé et valeur actuelle du client -->
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?= $client['email'] ?>" required>

        <!-- Champ de saisie pour le téléphone du client avec libellé et valeur actuelle du client -->
        <label for="telephone">Téléphone</label>
        <input type="text" name="telephone" id="telephone" value="<?= $client['telephone'] ?>" required>

        <!-- Champ de saisie pour le numéro de l'adresse du client avec libellé et valeur actuelle du client -->
        <label for="numero">Numéro</label>
        <input type="text" name="numero" id="numero" value="<?= $client['numero'] ?>" required>

        <!-- Champ de saisie pour la rue de l'adresse du client avec libellé et valeur actuelle du client -->
        <label for="rue">Rue</label>
        <input type="text" name="rue" id="rue" value="<?= $client['rue'] ?>" required>

        <!-- Champ de saisie pour le code postal de l'adresse du client avec libellé et valeur actuelle du client -->
        <label for="code_postal">Code Postal</label>
        <input type="text" name="code_postal" id="code_postal" value="<?= $client['code_postal'] ?>" required>

        <!-- Champ de saisie pour la ville de l'adresse du client avec libellé et valeur actuelle du client -->
        <label for="ville">Ville</label>
        <input type="text" name="ville" id="ville" value="<?= $client['ville'] ?>" required>

        <!-- Ajoutez d'autres champs si nécessaire -->

        <!-- Bouton de soumission du formulaire -->
        <input type="submit" value="Mettre à jour">
    </form>
</div>