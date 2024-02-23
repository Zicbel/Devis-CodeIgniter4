<!-- app/Views/devis/edit.php -->

<?php include(APPPATH . 'Views/navbar.php'); ?>

<div class="container column">

    <!-- Titre de la section de modification d'un devis -->
    <h2>Modifier un Devis</h2>

    <!-- Formulaire de modification avec action pointant vers "/devis/update" et méthode "post" -->
    <form action="/devis/update/<?= $devis['id'] ?>" method="post" class="column">

        <!-- Sélection du client avec libellé -->
        <label for="client_name">Client:</label>
        <select name="client_name" id="client_name" required>
            <!-- Boucle pour afficher les options de clients à partir du tableau $clients -->
            <?php foreach ($clients as $client): ?>
                <option value="<?= $client['nom'] ?>"><?= $client['nom'] ?></option>
            <?php endforeach; ?>
        </select>

        <!-- Sous-titre pour la section de modification d'items au devis -->
        <h3>Modifier les Items du Devis</h3>

        <div class="wrap">

            <!-- Boucle pour afficher les options d'items à partir du tableau $items -->
            <?php foreach ($items as $item): ?>
                <div class="column items">
                    <!-- Libellé de l'item -->
                    <label><?= $item['description'] ?></label>

                    <!-- Case à cocher pour l'item, coché si l'item fait partie du devis -->
                    <input type="checkbox" name="items[]" value="<?= $item['id'] ?>" <?= in_array($item['id'], $devis['items']) ? 'checked' : '' ?>>

                    <!-- Libellé et champ de saisie pour la quantité -->
                    <label for="quantity">Quantité:</label>
                    <input type="number" name="quantities[<?= $item['id'] ?>]" min="1" value="<?= $devis['quantities'][$item['id']] ?? 1 ?>">
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Bouton de soumission du formulaire -->
        <input type="submit" value="Mettre à Jour le Devis">
    </form>
</div>
