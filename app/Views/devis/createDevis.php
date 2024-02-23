<!-- app/Views/devis/createDevis.php -->

<?php include(APPPATH . 'Views/navbar.php'); ?>

<div class="container column">

    <!-- Titre de la section de composition d'un devis -->
    <h2>Composer un Devis</h2>

    <!-- Formulaire de composition avec action pointant vers "/devis/store" et méthode "post" -->
    <form action="/devis/store" method="post" class="column">

        <!-- Sélection du client avec libellé -->
        <label for="client_name">Sélectionner un Client:</label>
        <select name="client_name" id="client_name" required>
            <!-- Boucle pour afficher les options de clients à partir du tableau $clients -->
            <?php foreach ($clients as $client): ?>
                <option value="<?= $client['nom'] ?>"><?= $client['nom'] ?></option>
            <?php endforeach; ?>
        </select>

        <!-- Sous-titre pour la section d'ajout d'items au devis -->
        <h3>Ajouter des Items au Devis</h3>

        <div class="wrap">

            <!-- Boucle pour afficher les options d'items à partir du tableau $items -->
            <?php foreach ($items as $item): ?>
                <div class="column items">
                    <!-- Libellé de l'item -->
                    <label><?= $item['description'] ?></label>

                    <!-- Case à cocher pour l'item -->
                    <input type="checkbox" name="items[]" value="<?= $item['id'] ?>">

                    <!-- Libellé et champ de saisie pour la quantité -->
                    <label for="quantity">Quantité:</label>
                    <input type="number" name="quantities[<?= $item['id'] ?>]" min="1" value="1">
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Bouton de soumission du formulaire -->
        <input type="submit" value="Créer le Devis">
    </form>
</div>