<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Artist;
use App\Repository\ArtistRepository;

#[Route('/artist')]
class ArtistController extends AbstractController
{
    #[Route('/', name:'app_artist_index', methods: ['GET'])]
    public function index(ArtistRepository $artistRepository): Response
    {
        $artists = $artistRepository->findAll();

        return $this->render('artist/index.html.twig', [
            'artists' => $artists,
            'title' => 'Liste des artistes',
        ]);
    }

    #[Route('/{id}', name:'app_artist_show', methods: ['GET'])]
    public function show(Artist $artist): Response
    {
        return $this->render('artist/show.html.twig', [
            'artist' => $artist,
            'title' => 'Fiche d\'un artiste',
        ]);
    }
}
