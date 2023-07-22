<?php
// Configuration de la base de données
$db_host = 'localhost';
$db_name = 'todo_list';
$db_user = 'root';
$db_pass = 'root';

try {
    // Connexion à la base de données
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    require_once 'controllers/TodoController.php';

    // Vérifier si une action est spécifiée dans l'URL
    if (isset($_SERVER['PATH_INFO'])) {
        $url = explode('/', $_SERVER['PATH_INFO']);
        $action = $url[1];

        // Si l'action est "add", "delete" ou "update"
        if (in_array($action, array('add', 'delete', 'update'))) {
            // Récupérer les autres paramètres de l'URL
            $id = isset($url[2]) ? $url[2] : null;
            $status = isset($url[3]) ? $url[3] : null;

            // Traiter l'action et les paramètres ici
            $controller = new TodoController($db);
            switch ($action) {
                case 'add':
                    // Traitement de l'ajout de tâche
                    // ...
                    break;
                case 'delete':
                    // Traitement de la suppression de tâche
                    // ...
                    break;
                case 'update':
                    // Traitement de la mise à jour du statut de tâche
                    // ...
                    break;
                default:
                    // Action invalide
                    // ...
                    break;
            }
        } else {
            // Action non valide
            // ...
        }
    } else {
        // Pas d'action spécifiée, afficher la liste des tâches par défaut
        $controller = new TodoController($db);
        $controller->index();
    }

} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>
