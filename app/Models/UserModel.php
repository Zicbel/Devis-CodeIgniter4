<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users'; // Nom de la table des utilisateurs
    protected $primaryKey = 'id'; // Clé primaire de la table des utilisateurs

    protected $useSoftDeletes = true; // Activer la suppression douce pour pouvoir supprimer un USER, mais garder le USER présent dans la BDD

    protected $allowedFields = ['username', 'password']; // Champs autorisés à être assignés lors de l'utilisation des méthodes insert ou update
}
