<?php

// Déclaration de l'espace de noms (namespace) App\Controllers
namespace App\Controllers;

// Déclaration de la classe Home qui étend la classe de base BaseController
class Home extends BaseController
{
    // Déclaration de la méthode index qui renvoie une chaîne de caractères
    public function index()
    {
        // Vérifiez si l'utilisateur est connecté
        if (!session()->get('isLoggedIn')) {
            // Si l'utilisateur n'est pas connecté, redirigez-le vers la page de connexion
            return redirect()->to('/users/auth');
        }
    
        // Chargement de la vue 'homepage' dans le template
        $data['content'] = view('homepage');
        return view('template', $data);
    }
    
}

