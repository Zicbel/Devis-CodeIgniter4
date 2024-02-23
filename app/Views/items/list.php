<!-- app/Views/items/list.php -->

<?php include(APPPATH . 'Views/navbar.php'); ?>

<div class="container column">

    <!-- Lien vers la création d'un item -->
    <a href="/items/create" class="button">Créer un Item</a>

    <!-- Titre de la section de liste des Items -->
    <h2>Liste des Items</h2>

    <!-- Tableau pour afficher la liste des items -->
    <table>
        <!-- En-tête du tableau avec les colonnes ID, Description & Prix -->
        <tr>
            <th>ID</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Actions</th>
        </tr>

        <!-- Boucle pour afficher chaque item à partir du tableau $item -->
        <?php foreach ($items as $item): ?>
            <tr>
                <!-- Cellule pour afficher l'ID de l'item -->
                <td><?= $item['id'] ?></td>

                <!-- Cellule pour afficher la description de l'item -->
                <td><?= $item['description'] ?></td>

                <!-- Cellule pour afficher le prix de l'item -->
                <td><?= $item['price'] ?></td>

                <!-- Cellule pour afficher les liens d'actions pour chaque items -->
                <td>
                    <a href="/items/edit/<?= $item['id'] ?>">Modifier</a> |
                    <a href="/items/delete/<?= $item['id'] ?>">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
