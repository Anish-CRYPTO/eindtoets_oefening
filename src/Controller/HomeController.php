<?php

namespace App\Controller;

use App\Entity\Genre;
use App\Form\GenreType;
use App\Repository\GenreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/genre', name: 'insert')]
    public function genre(GenreRepository $genreRepository): Response
    {
        $genres = $genreRepository->findAll();

        return $this->render('home/index.html.twig', [
            'Genres' => $genres,
        ]);
    }

    #[Route('/add/genre', name: 'add')]
    public function submit(Request $request) : Response
    {
        $genre = new genre();
        $form = $this->createForm(GenreType::class, $genre);

        return $this->renderForm('home/add.html.twig',[
            'genre' => $form,
        ]);
    }
}
