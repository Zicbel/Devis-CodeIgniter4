<?php
// Déclaration de l'espace de noms (namespace) App\Models
namespace App\Models;
// Utilisation de la classe de base Model de CodeIgniter
use CodeIgniter\Model;

// Déclaration de la classe DevisItemModel qui étend la classe Model
class DevisItemModel extends Model
{
    // Nom de la table dans la base de données
    protected $table = 'devis_items'; 

    // Nom de la clé primaire de la table
    protected $primaryKey = 'id'; 

    // Champs autorisés à être assignés lors de l'utilisation des méthodes insert ou update
    protected $allowedFields = ['devis_id', 'item_id', 'quantity', 'custom_price']; 

    // Si vous avez des dates dans votre table, vous pouvez les gérer automatiquement :
    // Désactivation de l'utilisation des timestamps (created_at et updated_at)
    protected $useTimestamps = false;

    // Nom du champ pour la date de création (non utilisé dans cet exemple)
    protected $createdField = ''; 

    // Nom du champ pour la date de mise à jour (non utilisé dans cet exemple)
    protected $updatedField = ''; 

    // Autres propriétés et méthodes selon vos besoins...
}
