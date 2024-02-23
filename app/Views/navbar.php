<!-- app/Views/navbar.php -->

<!-- Liens de navigation vers la homepage, et les listes des devis et des items -->
<nav class="flex">
    <ul class="wrap">
        <!-- Lien vers la page d'accueil -->
        <li><a href="/">Accueil</a></li>

        <!-- Lien vers la liste des devis -->
        <li><a href="/devis">Liste des Devis</a></li>

        <!-- Lien vers la création d'un devis -->
        <li><a href="/devis/create">Créer un Devis</a></li>

        <!-- Lien vers la liste des clients -->
        <li><a href="/clients">Liste des Clients</a></li>

        <!-- Lien vers l'ajout des clients -->
        <li><a href="/clients/create">Ajouter des Clients</a></li>   
        
        <!-- Lien vers la liste des items -->
        <li><a href="/items">Liste des Items</a></li>

        <!-- Lien vers la déconnexion -->
        <?php if (session()->get('isLoggedIn')) : ?>
            <li><a href="/users/logout">Déconnexion</a></li>
        <?php endif; ?>
        
    </ul>
</nav>
