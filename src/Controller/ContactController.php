<?php

namespace App\Controller;

use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ContactRepository;


class ContactController extends AbstractController
{
    #[Route('/contacts', name: 'contacts')]
    public function listeContact(ContactRepository $repo)
    {
        
        $lesContacts = $repo->findAll();
        //dump($lesContacts); 

        return $this->render('contact/listeContacts.html.twig', [
            'lesContacts'=>$lesContacts
        ]);
    }

    #[Route('/contact/{id}', name: 'contact', methods:['GET'])]
    public function ficheContact($id, ContactRepository $repo)
    {
        
        $leContact = $repo->find($id);
        
        return $this->render('contact/ficheContact.html.twig', [
            'leContact'=>$leContact
        ]);
    }

    #[Route('/contact/sexe/{sexe}', name: 'listeContactSexe', methods:['GET'])]
    public function listeContactSexe($sexe, ContactRepository $repo)
    {
        
        // $lesContacts = $repo->findBy(
        // ['sexe'=>$sexe],
        // ['nom'=>'ASC']
        $lesContacts = $repo->findBySexe($sexe);
        
        return $this->render('contact/listeContacts.html.twig', [
            'lesContacts'=>$lesContacts
        ]);
    }
}
