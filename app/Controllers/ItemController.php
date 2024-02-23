<?php


namespace App\Controllers; // Déclaration de l'espace de noms pour le contrôleur
use App\Models\ItemModel; // Importation du modèle ItemModel

// Déclaration de la classe ItemController qui étend la classe de base BaseController de CodeIgniter
class ItemController extends BaseController
{
    // Méthode pour afficher la liste des éléments
    public function index(): string
    {
        // Instanciation d'un nouveau modèle ItemModel
        $itemsModel = new ItemModel();

        // Récupération de tous les éléments de la base de données et création d'un tableau qui s'appelle items
        $data['items'] = $itemsModel->findAll();

        // Chargement de la vue 'items/list' dans le template
        $data['content'] = view('items/list', $data);
        return view('template', $data);
    }

    // Méthode pour afficher le formulaire de création d'un nouvel élément
    public function create(): string
    {
        // Chargement de la vue 'items/create' dans le template
        $data['content'] = view('items/createItem');
        return view('template', $data);
    }

    // Méthode pour enregistrer un nouvel élément dans la base de données
    public function store()
    {
        // Instanciation d'un nouveau modèle ItemModel
        $itemsModel = new ItemModel();

        // Récupération des données du formulaire
        $data = [
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price')
        ];

        // Insertion des données dans la base de données
        $itemsModel->insert($data);

        // Redirection vers la liste des éléments
        return redirect()->to('/items');
    }

    // Méthode pour afficher le formulaire de modification d'un élément
    public function edit($id = null): string
    {
        // Instanciation d'un nouveau modèle ItemModel
        $itemsModel = new ItemModel();

        // Récupération des données de l'élément spécifié par l'identifiant
        $data['item'] = $itemsModel->where('id', $id)->first();

        // Chargement de la vue 'items/edit' dans le template
        $data['content'] = view('items/edit', $data);
        return view('template', $data);
    }

    // Méthode pour mettre à jour un élément dans la base de données
    public function update(int $id = null)
    {
        // Instanciation d'un nouveau modèle ItemModel
        $itemsModel = new ItemModel();

        // Récupération des données du formulaire
        $data = [
            'description' => $this->request->getVar('description'),
            'price' => $this->request->getVar('price')
        ];

        // Mise à jour des données dans la base de données
        $itemsModel->update($id, $data);

        // Redirection vers la liste des éléments
        return redirect()->to('/items');
    }

    // Méthode pour supprimer un élément de la base de données
    public function delete($id = null)
    {
        // Vérifier si l'identifiant de l'élément est valide
        if ($id === null) {
            // Gérer l'erreur de l'identifiant manquant
            // Redirection ou affichage d'un message d'erreur par exemple
            return redirect()->to('/items')->with('error', 'L\'identifiant de l\'élément est manquant.');
        }
    
        // Instanciation d'un nouveau modèle ItemModel
        $itemsModel = new ItemModel();
    
        // Vérifier si l'élément existe
        $item = $itemsModel->find($id);
    
        if (!$item) {
            // Gérer l'erreur si l'élément n'est pas trouvé
            // Redirection ou affichage d'un message d'erreur par exemple
            return redirect()->to('/items')->with('error', 'L\'élément spécifié est introuvable.');
        }
    
        // Supprimer l'élément en utilisant la suppression douce
        $itemsModel->delete($id);
    
        // Redirection vers la liste des éléments avec un message de succès
        return redirect()->to('/items')->with('success', 'L\'élément a été supprimé avec succès.');
    }
    
}
