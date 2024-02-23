<?php

// Déclaration de l'espace de noms (namespace) App\Models
namespace App\Models;

// Utilisation de la classe de base Model de CodeIgniter
use CodeIgniter\Model;

// Déclaration de la classe ClientModel qui étend la classe Model
class ClientModel extends Model
{
    // Nom de la table dans la base de données
    protected $table = 'clients';

    // Clé primaire de la table
    protected $primaryKey = 'id';

    // Activer la suppression douce pour pouvoir supprimer un ITEM, mais garder l'ITEM présent dans les précedents devis
    protected $useSoftDeletes = true; 
    
    // Champs autorisés à être assignés lors de l'utilisation des méthodes insert ou update
    protected $allowedFields = ['nom', 'email', 'telephone', 'numero', 'rue', 'code_postal', 'ville'];
    // Activer l'utilisation des timestamps pour suivre la création et la mise à jour des enregistrements.
    protected $useTimestamps = true;

    // Nom de la colonne enregistrant la date et l'heure de création des enregistrements.
    protected $createdField = 'created_at';

    // Nom de la colonne enregistrant la date et l'heure de la dernière mise à jour des enregistrements.
    protected $updatedField = 'updated_at';

    // Nom de la colonne pour la suppression douce, enregistrant la date et l'heure de "suppression".
    protected $deletedField = 'deleted_at';
    protected $dateFormat = 'datetime';

}
