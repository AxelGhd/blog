<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HelloController extends AbstractController {

    public const HISTORY_DEPTH = 5;

    public function demo1(){
        return new Response('Yes, ça marche !');
    }
    public function demo2(string $name, Request $request){
        $httpMethod = $request->getMethod();
        // query-string
        $option = $request->query->get('city', 'Nantes');

        // body
        $data = $request->request->get('country', 'FR');

        $request->getSession()->get('locale', 'fr');

        return new Response('Bonjour '.$name.' !');
    }

    public function demo3(int $id, Request $request){
        $lastIds = $request->getSession()->get('article-history', []);

        if (empty($lastIds)){
            $historyMessage = 'Votre historique est vide.<br>';
        } else {
            $historyMessage = 'Vous avez visités les articles : '.implode(', ', $lastIds).'<br>';
        }

        array_push($lastIds, $id);
        $lastIds = array_slice($lastIds, -self::HISTORY_DEPTH);

        $request->getSession()->set('article-history', $lastIds);

        $response = new Response($historyMessage.'L\'article numéro: '.$id);

        $response->headers->set('Content-Type', 'text/html');
        $response->setStatusCode(Response::HTTP_ACCEPTED);
        $response->setContent('<p>'.$response->getContent().'</p></body>');

        return $response;
    }
}