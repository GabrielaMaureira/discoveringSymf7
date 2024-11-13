<?php

namespace App\Controller;

//use App\Model\Album;  El modelo lo hemos pasado al repository
use App\Repository\AlbumRepository;
//use Psr\Log\LoggerInterface;     Lo hemos inyectado en el construct del repository                                        //Servicio
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/albumes')]
class AlbumesApiController extends AbstractController
{
    #[Route('', methods: ['GET'])]
    public function getCollection(/*LoggerInterface $logger*/ AlbumRepository $albumRepo): Response    //Inyectamos el servicio
    {
        //dd($logger);
        //$logger->info('Album collection retrieved');            //Me guarda info en el dev.log
        
        //dd($albumRepo);
        $albumes = $albumRepo->findAll();
      
        return $this->json($albumes); // new Response(json_encode($albumes));
    }
    #[Route('/{id<\d+>}', methods: ['GET'])]
        public function get(int $id, AlbumRepository $albumRepo): Response {
            //dd($id);
            $album = $albumRepo->find($id);

            if (!$album) {
                throw $this->createNotFoundException('Album not found, darling');
            }

            return $this->json($album);
    }
}

