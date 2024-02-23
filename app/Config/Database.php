<?php

// Déclaration de l'espace de noms (namespace) Config pour la classe Database
namespace Config;

// Utilisation de la classe Config pour étendre la configuration de la base de données
use CodeIgniter\Database\Config;

// Déclaration de la classe Database qui hérite de la classe Config
class Database extends Config
{
    // Chemin vers les fichiers de migration et de semence de la base de données
    public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

    // Groupe par défaut pour la configuration de la base de données
    
    public string $defaultGroup = 'default';
    //public string $defaultGroup = 'O2switch';

    // Configuration par défaut de la base de données 
    // LES DONNEES SONT TRANSMISES DANS LE FICHIER .env
    public array $default = [
        'DSN'          => '',            // Chaîne de connexion (DSN) (non utilisée dans cet exemple)
        'hostname'     => '',   // Adresse du serveur de base de données
        'username'     => '',        // Nom d'utilisateur de la base de données
        'password'     => '',            // Mot de passe de la base de données
        'database'     => '', // Nom de la base de données
        'DBDriver'     => '',      // Pilote de la base de données (MySQLi dans cet exemple)
        'DBPrefix'     => '',            // Préfixe des tables de la base de données
        'pConnect'     => false,         // Connexion persistante (désactivée dans cet exemple)
        'DBDebug'      => true,          // Mode débogage activé
        'charset'      => 'utf8',        // Encodage des caractères
        'DBCollat'     => 'utf8_general_ci', // Collation de la base de données
        'swapPre'      => '',            // Préfixe de remplacement (non utilisé dans cet exemple)
        'encrypt'      => false,         // Chiffrement (désactivé dans cet exemple)
        'compress'     => false,         // Compression (désactivée dans cet exemple)
        'strictOn'     => false,         // Mode strict (désactivé dans cet exemple)
        'failover'     => [],            // Serveurs de basculement en cas d'échec de connexion
        'port'         => '',          // Port du serveur de base de données
        'numberNative' => false,         // Utilisation de fonctions natives pour les nombres (désactivée dans cet exemple)
    ];

    // Configuration de la base de données pour les tests
    public array $tests = [
        'DSN'         => '',            // Chaîne de connexion (DSN) pour les tests (non utilisée dans cet exemple)
        'hostname'    => '127.0.0.1',    // Adresse du serveur de base de données pour les tests
        'username'    => '',            // Nom d'utilisateur de la base de données pour les tests
        'password'    => '',            // Mot de passe de la base de données pour les tests
        'database'    => ':memory:',     // Base de données en mémoire pour les tests
        'DBDriver'    => 'SQLite3',      // Pilote de la base de données pour les tests (SQLite3 dans cet exemple)
        'DBPrefix'    => 'db_',          // Préfixe des tables de la base de données pour les tests
        'pConnect'    => false,         // Connexion persistante (désactivée dans cet exemple)
        'DBDebug'     => true,          // Mode débogage activé pour les tests
        'charset'     => 'utf8',        // Encodage des caractères pour les tests
        'DBCollat'    => 'utf8_general_ci', // Collation de la base de données pour les tests
        'swapPre'     => '',            // Préfixe de remplacement (non utilisé dans cet exemple)
        'encrypt'     => false,         // Chiffrement (désactivé dans cet exemple)
        'compress'    => false,         // Compression (désactivée dans cet exemple)
        'strictOn'    => false,         // Mode strict (désactivé dans cet exemple)
        'failover'    => [],            // Serveurs de basculement en cas d'échec de connexion pour les tests
        'port'        => 3306,          // Port du serveur de base de données pour les tests
        'foreignKeys' => true,          // Activation des clés étrangères pour les tests
        'busyTimeout' => 1000,          // Temps d'attente en cas de surcharge (millisecondes) pour les tests
    ];

    // Constructeur de la classe Database
    public function __construct()
    {
        // Appel du constructeur de la classe parente Config
        parent::__construct();

        // Si l'environnement est défini comme 'testing', utilise le groupe de configuration 'tests'
        if (ENVIRONMENT === 'testing') {
            $this->defaultGroup = 'tests';
        }
    }
}
