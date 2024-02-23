<!-- app/Views/clients/list.php -->

<?php include(APPPATH . 'Views/navbar.php'); ?>

<div class="container column">

    <!-- Lien vers l'ajout des clients -->
    <a href="/clients/create" class="button">Ajouter des Clients</a>

    <!-- Titre de la section de liste des clients -->
    <h2>Liste des Clients</h2>

    <!-- Tableau pour afficher la liste des clients -->
    <table>
        <!-- En-tête du tableau avec les colonnes ID, Nom, Email, Téléphone, Adresse, Date de Création, Actions -->
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Adresse</th>
            <th>Actions</th>
        </tr>

        <!-- Boucle pour afficher chaque client à partir du tableau $clients -->
        <?php foreach ($clients as $client): ?>
            <tr>
                <!-- Cellule pour afficher l'ID du client -->
                <td><?= $client['id'] ?></td>

                <!-- Cellule pour afficher le nom du client -->
                <td><?= $client['nom'] ?></td>

                <!-- Cellule pour afficher l'email du client -->
                <td><?= $client['email'] ?></td>

                <!-- Cellule pour afficher le téléphone du client -->
                <td><?= $client['telephone'] ?></td>

                <!-- Cellule pour afficher l'adresse du client -->
                <td><?= $client['numero'] . ' ' . $client['rue'] . ', ' . $client['code_postal'] . ' ' . $client['ville'] ?></td>

                <!-- Cellule pour afficher les liens d'actions pour chaque client -->
                <td>
                    <a href="/clients/view/<?= $client['id'] ?>">Voir</a> |
                    <a href="/clients/edit/<?= $client['id'] ?>">Modifier</a> |
                    <a href="/clients/delete/<?= $client['id'] ?>">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>