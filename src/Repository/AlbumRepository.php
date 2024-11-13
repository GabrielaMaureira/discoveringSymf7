<?php   

namespace App\Repository;

use App\Model\Album;
use App\Model\AlbumStatusEnum;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Helper\ProgressBar;

class AlbumRepository // 'Repository' consiste en obtener un tipo de datos
{
    public function __construct(private LoggerInterface $logger)    // Inyectado/autowireado en el construc es una property asíq no olvidar el private/public/protected
    {
        $this->logger->info('Album collection retrieved');
    }

    public function findAll() : array 
    {
        return [
            new Album(
                1,
                'Abbey Road',
                'The Beatles',
                1969,
                'Rock',
                [
                    "Come Together",
                    "Something",
                    "Octopus's Garden",
                    "Here Comes the Sun"
                ],
                AlbumStatusEnum::INPROGRESS
            ),
            new Album(
                2,
                "Thriller",
                "Michael Jackson",
                1982,
                "Pop",
                [
                    "Wanna Be Startin' Somethin'",
                    "Thriller",
                    "Beat It",
                    "Billie Jean"
                ],
                AlbumStatusEnum::WAITING
            ),
            new Album(
                3,
                "Back in Black",
                "AC/DC",
                1980,
                "Hard Rock",
                [
                    "Hells Bells",
                    "Shoot to Thrill",
                    "Back in Black",
                    "You Shook Me All Night Long"
                ],
                AlbumStatusEnum::COMPLETE
            ),
        ];
    } 
    
    public function find(int $id) : ?Album
    {
        foreach ($this->findAll() as $album){
            if ($album->getId() === $id){
                return $album;
            }
        }
        return null;
    }
} 