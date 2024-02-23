<!-- app/Views/users/auth.php -->

<div class="container column">
    <!-- Afficher le choix de connexion ou d'inscription -->
    <h2>Choisissez une action</h2>
    <a href="#" onclick="showLoginForm()" class="button">Se connecter</a>
    <a href="#" onclick="showSignInForm()" class="button">S'inscrire</a>

    <!-- Formulaire de connexion -->
    <form id="loginForm" action="/users/login" method="post" class="column" style="display: none;">
        <h2>Connexion</h2>
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" name="username" required>
        <label for="password">Mot de passe:</label>
        <input type="password" name="password" required>
        <div class="column">
            <input type="submit" value="Se connecter">
        </div>
    </form>

    <!-- Formulaire d'inscription -->
    <form id="signInForm" action="/users/signIn" method="post" class="column" style="display: none;">
        <h2>Inscription</h2>
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" name="username" required>
        <label for="password">Mot de passe:</label>
        <input type="password" name="password" required>
        <div class="column">
            <input type="submit" value="S'inscrire">
        </div>
    </form>
</div>

<script>
    // Fonction pour afficher le formulaire de connexion et masquer le formulaire d'inscription
    function showLoginForm() {
        document.getElementById('loginForm').style.display = 'block';
        document.getElementById('signInForm').style.display = 'none';
    }

    // Fonction pour afficher le formulaire d'inscription et masquer le formulaire de connexion
    function showSignInForm() {
        document.getElementById('loginForm').style.display = 'none';
        document.getElementById('signInForm').style.display = 'block';
    }
</script>
