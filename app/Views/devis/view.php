<?php include(APPPATH . 'Views/navbar.php'); ?>

<div class="container">

    <!-- Titre de la section pour visualiser le devis -->
    <h2 class="flex">Devis n°<?= $devis['id'] ?></h2>

    <div class="flex">
        <a href="/devis/edit/<?= $devis['id'] ?>" class="button">Modifier ce Devis</a>
        <a href="/devis/delete/<?= $devis['id'] ?>" class="button">Supprimer ce Devis</a>
    </div>

    <div class="">
        <table class="">
            <!-- Informations du devis avec ID, Nom du Client et Date Créée -->
            <tr>
                <td>ID</td>
                <td><?= $devis['id'] ?></td>
            </tr>
            <tr>
                <td>Nom du Client</td>
                <td><?= $devis['client_name'] ?></td>
            </tr>
            <tr>
                <td>Date Créée</td>
                <td><?= $devis['date_created'] ?></td>
            </tr>
        </table>

        <!-- Vérification si des items sont disponibles pour le devis -->
        <?php if (!empty($items)): ?>
            <!-- Tableau des items -->
            <table class="">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Description</th>
                        <th>Quantité</th>
                        <th>Prix</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $total = 0; // Initialisez le total à zéro
                    foreach ($items as $item): 
                        // Calcul du montant pour cet item
                        $montantItem = $item['quantity'] * $item['price'];
                        // Ajout du montant de cet item au total
                        $total += $montantItem;
                    ?>
                        <tr>
                            <td><?= $item['id']; ?></td>
                            <td><?= $item['description']; ?></td>
                            <td><?= $item['quantity']; ?></td>
                            <td><?= $item['price']; ?> €</td>
                        </tr>
                    <?php endforeach; ?>
                    <!-- Ligne affichant le total -->
                    <tr>
                        <td colspan="3" style="text-align: right;"><strong>Total :</strong></td>
                        <td><?= $total; ?> €</td>
                    </tr>
                </tbody>
            </table>
        <?php else: ?>
            <!-- Message s'il n'y a aucun item associé à ce devis -->
            <p>Aucun item trouvé pour ce devis.</p>
        <?php endif; ?>

    </div>
</div>
