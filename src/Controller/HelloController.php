<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HelloController extends AbstractController {

    public function demo1(){
        return new Response('Yes, ça marche !');
    }

    public function demo2($name){
        return new Response('Bonjour '.$name.' !');
    }

    public function demo3(int $id){
        return new Response('Voici votre id: '.$id);
    }
}