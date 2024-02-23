<!-- app/Views/devis/list.php -->

<?php include(APPPATH . 'Views/navbar.php'); ?>

<div class="container column">

    <!-- Lien vers la création d'un devis -->
    <a href="/devis/create" class="button">Créer un Devis</a>

    <!-- Titre de la section de liste des devis -->
    <h2>Liste des Devis</h2>

    <!-- Tableau pour afficher la liste des devis -->
    <table class="">
        <!-- En-tête du tableau avec les colonnes ID, Nom du Client, Date Créée, Actions -->
        <tr>
            <th>ID</th>
            <th>Nom du Client</th>
            <th>Date Créée</th>
            <th>Actions</th>
        </tr>

        <!-- Boucle pour afficher chaque devis à partir du tableau $devis -->
        <?php foreach ($devis as $devis_item): ?>
            <tr>
                <!-- Cellule pour afficher l'ID du devis -->
                <td><?= $devis_item['id'] ?></td>

                <!-- Cellule pour afficher le nom du client du devis -->
                <td><?= $devis_item['client_name'] ?></td>

                <!-- Cellule pour afficher la date de création du devis -->
                <td><?= $devis_item['date_created'] ?></td>

                <!-- Cellule pour afficher les liens d'actions pour chaque devis -->
                <td>
                    <a href="/devis/view/<?= $devis_item['id'] ?>">Voir</a> |
                    <a href="/devis/edit/<?= $devis_item['id'] ?>">Modifier</a> |
                    <a href="/devis/delete/<?= $devis_item['id'] ?>">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>