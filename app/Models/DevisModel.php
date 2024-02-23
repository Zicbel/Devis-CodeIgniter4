<?php

// Déclaration de l'espace de noms (namespace) App\Models
namespace App\Models;

// Utilisation de la classe de base Model de CodeIgniter
use CodeIgniter\Model;

// Déclaration de la classe DevisModel qui étend la classe Model
class DevisModel extends Model
{
    // Nom de la table dans la base de données
    protected $table = 'devis'; 

    // Clé primaire de la table
    protected $primaryKey = 'id'; 

    // Champs autorisés à être assignés lors de l'utilisation des méthodes insert ou update
    protected $allowedFields = ['client_name', 'date_created']; 

    // Obtient les détails des articles associés à un devis spécifique en utilisant une jointure
    public function getDevisItemsWithDetails(int $devisId): array
    {
        // Exemple de jointure (ajustez selon votre structure de base de données)
        return $this->db->table('devis_items')
            ->join('items', 'items.id = devis_items.item_id')
            ->where('devis_items.devis_id', $devisId)
            ->select('items.id, items.description, devis_items.quantity, items.price')
            ->get()
            ->getResultArray();
    }
}
