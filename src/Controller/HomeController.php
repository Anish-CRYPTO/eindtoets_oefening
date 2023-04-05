<?php

namespace App\Controller;

use App\Repository\GenreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/genre', name: 'app_home')]
    public function genre(GenreRepository $genreRepository): Response
    {
        $genres = $genreRepository->findAll();

        return $this->render('home/index.html.twig', [
            'Genre' => $genres,
        ]);
    }
}
