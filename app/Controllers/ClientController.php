<?php

// Déclaration de l'espace de noms pour la classe ClientController dans le fichier App\Controllers.
namespace App\Controllers;

// Importation de la classe ClientModel.
use App\Models\ClientModel;

// Définition de la classe ClientController qui étend la classe de base BaseController.
class ClientController extends BaseController
{
    // Méthode pour afficher la liste des clients.
    public function index()
    {
        // Instanciation d'un nouvel objet de modèle ClientModel.
        $clientModel = new ClientModel();

        // Récupération de tous les clients à partir du modèle et stockage dans un tableau associatif.
        $data['clients'] = $clientModel->findAll();

        // Chargement de la vue 'clients/list' dans le template
        $data['content'] = view('clients/list', $data);
        return view('template', $data);
    }

    // Méthode pour afficher les détails d'un client spécifique.
    public function view($id = null)
    {
        // Instanciation d'un nouvel objet de modèle ClientModel.
        $clientModel = new ClientModel();

        // Récupération des données du client spécifié par son ID et stockage dans un tableau associatif.
        $data['client'] = $clientModel->find($id);

        // Vérification si le client existe. Si non, une exception est levée.
        if (empty($data['client'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the client with id: ' . $id);
        }

        // Chargement de la vue 'clients/view' dans le template
        $data['content'] = view('clients/view', $data);
        return view('template', $data);
    }

    // Méthode pour afficher le formulaire de création d'un nouveau client.
    public function create()
    {
        // Chargement de la vue 'clients/createClient' dans le template
        $data['content'] = view('clients/createClient');
        return view('template', $data);
    }

    // Méthode pour enregistrer un nouveau client dans la base de données.
    public function store()
    {
        // Instanciation d'un nouvel objet de modèle ClientModel.
        $clientModel = new ClientModel();

        // Récupération des données du formulaire et stockage dans un tableau associatif.
        $clientData = [
            'nom' => $this->request->getVar('nom'),
            'email' => $this->request->getVar('email'),
            'telephone' => $this->request->getVar('telephone'),
            'numero' => $this->request->getVar('numero'),
            'rue' => $this->request->getVar('rue'),
            'code_postal' => $this->request->getVar('code_postal'),
            'ville' => $this->request->getVar('ville')
        ];

        // Insertion des données du client dans la base de données.
        $clientModel->insert($clientData);

        // Redirection vers la liste des clients.
        return redirect()->to('/clients');
    }

    // Méthode pour afficher le formulaire de modification d'un client.
    public function edit($id)
    {
        // Instanciation d'un nouvel objet de modèle ClientModel.
        $clientModel = new ClientModel();

        // Récupération des données du client spécifié par son ID et stockage dans un tableau associatif.
        $data['client'] = $clientModel->find($id);

        // Vérification si le client existe. Si non, une exception est levée.
        if (empty($data['client'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the client with id: ' . $id);
        }

        // Chargement de la vue 'clients/edit' dans le template
        $data['content'] = view('clients/edit', $data);
        return view('template', $data);
    }

    // Méthode pour mettre à jour les informations d'un client dans la base de données.
    public function update($id)
    {
        // Instanciation d'un nouvel objet de modèle ClientModel.
        $clientModel = new ClientModel();

        // Récupération des données du formulaire et stockage dans un tableau associatif.
        $clientData = [
            'nom' => $this->request->getVar('nom'),
            'email' => $this->request->getVar('email'),
            'telephone' => $this->request->getVar('telephone'),
            'numero' => $this->request->getVar('numero'),
            'rue' => $this->request->getVar('rue'),
            'code_postal' => $this->request->getVar('code_postal'),
            'ville' => $this->request->getVar('ville')
        ];

        // Mise à jour des données du client dans la base de données.
        $clientModel->update($id, $clientData);

        // Redirection vers la liste des clients.
        return redirect()->to('/clients');
    }

    // Méthode pour supprimer un client de la base de données.
    public function delete($id)
    {
        // Instanciation d'un nouvel objet de modèle ClientModel.
        $clientModel = new ClientModel();

        // Suppression du client spécifié par son ID.
        $clientModel->delete($id);

        // Redirection vers la liste des clients.
        return redirect()->to('/clients');
    }
}