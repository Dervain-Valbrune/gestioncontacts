<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    #[Route('/categories', name: 'categories')]
    public function listeCategorie(CategorieRepository $repo)
    {
        $categories = $repo->findAll();

        return $this->render('categorie/listeCategories.html.twig', [
            'categories'=>$categories
        ]);
    }
    
    #[Route('/categorie/{id}', name: 'categorie', methods:['GET'])]
    public function ficheCategorie($id, CategorieRepository $repo)
    {
        
        $laCategorie = $repo->find($id);
        
        return $this->render('categorie/ficheCategorie.html.twig', [
            'laCategorie'=>$laCategorie
        ]);
    }

    #[Route('/nbContact', name: 'nbContact')]
    public function nbContact(CategorieRepository $repo)
    {
        $categories = $repo->nbContactParCat();

        // dd($categories);

        return $this->render('categorie/nbContact.html.twig', [
            'categories'=>$categories
        ]);
    }
    
}
