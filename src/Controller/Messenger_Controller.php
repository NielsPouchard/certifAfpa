<?php
namespace App\Controller;

use App\Database\DB;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Chat\ChatMessage;

class Messenger_Controller
{
    public function messenger(Request $request)
    {
        if (!isset($_SESSION['user']) || null === $_SESSION['user']) {
            return new RedirectResponse('/login');
        }
        if (array_key_exists("task", $request->attributes->all())) {
            $task = $request->request->get('task');
            $task === "write"
                ? $this->postMessage($request)
                : $this->getMessage()
            ;
        }
        return render_twig($request, 'messenger');
    }

    private function getMessage()
    {
        $bdd = DB::getDb();
// 2-On crée une function (requête bdd) pour afficher les 20 derniers messages
        $result = $bdd->prepare('SELECT * FROM chat WHERE user_iduser = ? ORDER BY created_at DESC LIMIT 20');
        $result->execute((int)[$_SESSION['user']['id']]);
// 3-On traite les résultas
        $messages = $result->fetchAll();
// 4-On affiche les données sous forme de JSON
        return new JsonResponse([$messages], Response::HTTP_OK);
    }

    private function postMessage(Request $request)
    {
        $bdd = DB::getDb();

// 2- Traiter les paramètres passés en POST	(pseudo + content)
        if(!array_key_exists('pseudo', $request->request->all()) || !array_key_exists('content', $request->request->all())) {
            return new JsonResponse(["status" => "error", "message" => "Message non envoye"], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        $chatMessage = new ChatMessage($request);
// 3-Créer une requête pour insérer dans la bdd
        $query = $bdd->prepare("INSERT INTO chat(created_at, pseudo, content, user_iduser) VALUES (:created_at, :pseudo, :content, :user_iduser)");
        $query->execute([
            "pseudo" => $chatMessage->pseudo,
            "content" => $chatMessage->content,
            "created_at" => $chatMessage->createdAt,
            "user_iduser" => $_SESSION['user']['id']
        ]);
// 4-Donner un statut du succes ou d'erreur au format JSON
        return new JsonResponse([$query->fetchObject()], Response::HTTP_OK);
    }

}
