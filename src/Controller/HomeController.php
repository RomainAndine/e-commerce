<?php

namespace App\Controller;

use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{

    public function __construct(private EntityManagerInterface $em)
    {
        
    }
    #[Route('/home', name: 'app_home', methods: ['GET', 'POST'])]
    #[Route('/accueil', name: 'app_accueil')]
    public function index(Request $request): Response
    {
         $form = $this->createForm(UserType::class);
         $form->handleRequest($request);
         if ($form->isSubmitted() && $form->isValid()) {
             $user = $form->getData();
             $this->em->persist($user);
             $this->em->flush();
             return $this->redirectToRoute('app_home');
         }
         return $this->render('home/index.html.twig', [
             'form' => $form,
         ]);
        
    }
}

