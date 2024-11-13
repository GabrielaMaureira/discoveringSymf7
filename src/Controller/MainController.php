<?php

namespace App\Controller;

use App\Repository\AlbumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route(path: '/', name: 'homepage')]
    public function homepage( AlbumRepository $albumRepo) // Objeto Response
    {
        $albums = $albumRepo->findAll();
        // $mandoVarAvista = 43; // Estos es una var común
        $mandoVarAvista = count($albums);
        $arrayAssoc = $albums[array_rand($albums)];

       /* $arrayAssoc = [ // Esto es una var assoc
            'name' => 'Gaby',
            'age' => '33',
            'fav_color' => 'black',
        ];*/
       // dd($albums);

        return $this->render('main/homepage.html.twig', [  // Render es un shortcut para renderizar esta plantilla, coger el contenido de ésta y ponerla en un objeto Response.
            'varDesdeController' => $mandoVarAvista,
            'myself' => $arrayAssoc,
            'albums' => $albums,
        ]);
    }
}
