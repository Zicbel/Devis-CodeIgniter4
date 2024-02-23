<?php include(APPPATH . 'Views/navbar.php'); ?>

<div class="container flex">
    <div class="profile-card column">
        <!-- Titre de la section pour visualiser le client -->
        <h2><?= $client['nom'] ?></h2>

        <div class="flex">
            <!-- Liens pour modifier ou supprimer le client -->
            <a href="/clients/edit/<?= $client['id'] ?>" class="button">Modifier ce Client</a>
            <a href="/clients/delete/<?= $client['id'] ?>" class="button">Supprimer ce Client</a>
        </div>

        <!-- Informations du client avec ID, Nom, Email, Téléphone, Adresse et Date de Création -->
        <div class="profile-info">
            <p><strong>ID:</strong> <?= $client['id'] ?></p>
            <p><strong>Email:</strong> <?= $client['email'] ?></p>
            <p><strong>Téléphone:</strong> <?= $client['telephone'] ?></p>
            <p><strong>Adresse:</strong><br><?= $client['numero'] . ' ' . $client['rue'] . ',<br>' . $client['code_postal'] . ' ' . $client['ville'] ?></p>
        </div>
    </div>
</div>
