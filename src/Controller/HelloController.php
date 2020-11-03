<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HelloController extends AbstractController {

    public function demo1(){
        return new Response('Let\'s live a dream together Matéo, we can be happy and have a great life together, i\'ll make you happy i promise !');
    }

    public function demo2(string $name){
        return new Response('Bonjour '.$name.' !');
    }

    public function demo3(int $id){
        return new Response('Voici votre id: '.$id);
    }
}