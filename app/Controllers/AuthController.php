<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{

    public function createUser()
    {
        // Récupérer les données du formulaire
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Vérifier si l'utilisateur existe déjà
        $userModel = new UserModel();
        $existingUser = $userModel->where('username', $username)->first();

        if ($existingUser) {
            // Afficher un message d'erreur si l'utilisateur existe déjà
            echo "Cet utilisateur existe déjà.";
        } else {
            // Hasher le mot de passe
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Créer un nouvel utilisateur
            $userData = [
                'username' => $username,
                'password' => $hashedPassword
            ];

            // Insérer l'utilisateur dans la base de données
            $userModel->insert($userData);

            // Afficher un message de succès
            echo "Utilisateur créé avec succès.";
        }
    }
    
    public function store()
    {
        // Appeler la fonction pour créer un nouvel utilisateur
        $this->createUser();
        // Rediriger l'utilisateur vers la page de connexion après l'inscription
        return redirect()->to('users/auth');
    }

    public function showForm()
    {
        // Charge la vue du formulaire de connexion ou d'inscription
        $data['content'] = view('users/auth');
        return view('template', $data);
    }

    public function login()
    {
        // Vérifiez si les informations de connexion sont valides
        $userModel = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Authentification réussie, démarrez la session et redirigez l'utilisateur
            session()->set('isLoggedIn', true);
            session()->set('username', $user['username']);
            return redirect()->to('/');
        } else {
            // Authentification échouée, affichez un message d'erreur
            echo "Nom d'utilisateur ou mot de passe incorrect";
        }
    }

    public function logout()
    {
        // Déconnectez l'utilisateur en détruisant la session
        session()->destroy();
        return redirect()->to('/users/auth');
    }
}
