<?php

// Déclaration de l'espace de noms pour le contrôleur
namespace App\Controllers;

// Importation des modèles nécessaires
use App\Models\DevisModel;
use App\Models\DevisItemModel;
use App\Models\ItemModel;
use App\Models\ClientModel;


// Déclaration de la classe DevisController qui étend la classe de base BaseController de CodeIgniter
class DevisController extends BaseController
{
    // Méthode pour afficher la liste des devis
    public function index(): string
    {
        // Instanciation d'un nouveau modèle DevisModel
        $devisModel = new DevisModel();

        // Récupération de tous les devis de la base de données et création d'un tableau qui s'appelle devis
        $data['devis'] = $devisModel->findAll();

        // Chargement de la vue 'devis/list' dans le template
        $data['content'] = view('devis/list', $data);
        return view('template', $data);
    }

    // Méthode pour afficher les détails d'un devis spécifique
    public function view($id = null): string
    {
        // Instanciation des modèles DevisModel
        $devisModel = new DevisModel();
        
        // Récupération des détails du devis spécifié par l'identifiant
        $data['devis'] = $devisModel->where('id', $id)->first();

        // Vérification de l'existence du devis, sinon, une exception est déclenchée
        if (empty($data['devis'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the devis with id: ' . $id);
        }

        // Récupération des items associés au devis
        $data['items'] = $devisModel->getDevisItemsWithDetails($id); // Cette méthode doit être définie dans DevisModel

        // Chargement de la vue 'devis/view' dans le template
        $data['content'] = view('devis/view', $data);
        return view('template', $data);
    }

    // Méthode pour afficher le formulaire de création d'un nouveau devis
    public function create(): string
    {
        // Instanciation des modèles DevisModel et ItemModel
        $devisModel = new DevisModel();
        $itemModel = new ItemModel();
        $clientModel = new ClientModel();

        // Récupération des clients distincts de la base de données
        $data['clients'] = $clientModel->select('nom')->distinct()->findAll();

        // Récupération de tous les items de la base de données
        $data['items'] = $itemModel->findAll();

        // Chargement de la vue 'devis/create' dans le template
        $data['content'] = view('devis/createDevis', $data);
        return view('template', $data);
    }

    // Méthode pour enregistrer un nouveau Devis dans la base de données
    public function store()
    {
        // Instanciation des modèles DevisModel et DevisItemModel
        $devisModel = new DevisModel();
        $devisItemModel = new DevisItemModel();
        $itemModel = new ItemModel();

        // Récupération des données du formulaire
        $client_name = $this->request->getVar('client_name');
        $items = $this->request->getVar('items');
        $quantities = $this->request->getVar('quantities');

        // Création du devis
        $devisData = [
            'client_name' => $client_name,
            'date_created' => date("Y-m-d H:i:s") // Date et heure actuelles
        ];
        $devisModel->save($devisData);
        $devis_id = $devisModel->getInsertID(); // Récupère l'ID du devis nouvellement créé

        // Boucle sur les items pour créer les devis items associés
        foreach ($items as $item_id) {
            $quantity = isset($quantities[$item_id]) ? $quantities[$item_id] : 1;

            // Récupération de l'ID de l'item
            $item = $itemModel->find($item_id);

            $devisItemData = [
                'devis_id' => $devis_id,
                'item_id' => $item['id'],
                'item_name' => $item['description'],
                'quantity' => $quantity
                // 'custom_price' => ... si vous avez un prix personnalisé
            ];
            $devisItemModel->save($devisItemData);
        }

        // Redirection vers la liste des devis
        return redirect()->to('/devis');
    }


    // Méthode pour afficher le formulaire de modification d'un devis
    public function edit($devis_id)
    {
        // Instanciation des modèles DevisModel, DevisItemModel et ItemModel
        $devisModel = new DevisModel();
        $devisItemModel = new DevisItemModel();
        $itemModel = new ItemModel();
        $clientModel = new ClientModel();
    
        // Récupération des informations sur le devis à modifier
        $data['devis'] = $devisModel->find($devis_id);
    
        // Récupération des items associés à ce devis
        $items = $devisItemModel->where('devis_id', $devis_id)->findAll();
    
        // Création d'un tableau pour stocker les IDs des items associés à ce devis
        $devisItems = [];
        foreach ($items as $item) {
            $devisItems[] = $item['item_id'];
        }
    
        // Ajout du tableau des items associés à ce devis aux données passées à la vue
        $data['devis']['items'] = $devisItems;
    
        // Récupération de tous les items de la base de données
        $data['items'] = $itemModel->findAll();

        // Récupération de tous les clients de la base de données
        $data['clients'] = $clientModel->findAll();
    
        // Chargement de la vue 'devis/edit' dans le template
        $data['content'] = view('devis/edit', $data);
        return view('template', $data);
    }
    

    // Méthode pour mettre à jour un devis dans la base de données
    public function update($devis_id)
    {
        // Instanciation des modèles DevisModel et DevisItemModel
        $devisModel = new DevisModel();
        $devisItemModel = new DevisItemModel();
        $itemModel = new ItemModel();
    
        // Récupération des données du formulaire
        $client_name = $this->request->getVar('client_name');
        $items = $this->request->getVar('items');
        $quantities = $this->request->getVar('quantities');
    
        // Mise à jour des données du devis
        $devisData = [
            'client_name' => $client_name,
            'date_updated' => date("Y-m-d H:i:s") // Date et heure actuelles
        ];
        $devisModel->update($devis_id, $devisData);
    
        // Suppression des anciens items associés au devis
        $devisItemModel->where('devis_id', $devis_id)->delete();
    
        // Boucle sur les nouveaux items pour créer les devis items associés
        foreach ($items as $item_id) {
            $quantity = isset($quantities[$item_id]) ? $quantities[$item_id] : 1;
    
            // Récupération de l'ID de l'item
            $item = $itemModel->find($item_id);
    
            $devisItemData = [
                'devis_id' => $devis_id,
                'item_id' => $item['id'],
                'item_name' => $item['description'],
                'quantity' => $quantity
                // 'custom_price' => ... si vous avez un prix personnalisé
            ];
            $devisItemModel->save($devisItemData);
        }
    
        // Redirection vers la liste des devis ou toute autre destination souhaitée
        return redirect()->to('/devis');
    }


    // Méthode pour supprimer un devis de la base de données
    public function delete(int $id = null)
    {
        // Vérifier si l'identifiant du devis est valide
        if ($id === null) {
            // Gérer l'erreur de l'identifiant manquant
            // Redirection ou affichage d'un message d'erreur par exemple
            return redirect()->to('/devis')->with('error', 'L\'identifiant du devis est manquant.');
        }
    
        // Instanciation d'un nouveau modèle DevisModel
        $devisModel = new DevisModel();
    
        // Vérifier si le devis existe
        $devis = $devisModel->find($id);
    
        if (!$devis) {
            // Gérer l'erreur si le devis n'est pas trouvé
            // Redirection ou affichage d'un message d'erreur par exemple
            return redirect()->to('/devis')->with('error', 'Le devis spécifié est introuvable.');
        }
    
        // Supprimer les éléments de devis associés
        $devisItemModel = new DevisItemModel();
        $devisItemModel->where('devis_id', $id)->delete();
    
        // Supprimer le devis lui-même
        $devisModel->delete($id);
    
        // Redirection vers la liste des devis avec un message de succès
        return redirect()->to('/devis')->with('success', 'Le devis a été supprimé avec succès.');
    }
   
}