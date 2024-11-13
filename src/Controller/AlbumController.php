<?php

namespace App\Controller;

use App\Repository\AlbumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AlbumController extends AbstractController{
    
    #[Route('/albums/{id<\d+>}', 'app_album_show')]
    public function show(int $id, AlbumRepository $albumRepo): Response{
        //dd($id);
        $album = $albumRepo->find($id);

        if(!$album){
            return throw new \Exception('Album not found, darling');
        }

        return $this->render('album/show.html.twig', [
            'album' => $album,
        ]);
        
    }
}