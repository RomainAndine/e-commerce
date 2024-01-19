<?php

namespace App\Controller;


use App\Entity\Produit;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommandeController extends AbstractController
{

    public function __construct(private EntityManagerInterface $em)
    {
        
    }
    #[Route('/commande', name: 'app_commande_add', methods: ['GET', 'POST'])]
    public function index(Request $request): Response
    {
        $panier = $request->getSession()->get('panier', []);
        return $this->render('commande/index.html.twig', [
            'panier' => $panier,
        ]);

}
     #[Route('/ajouter-au-panier/{id}', name: 'app_add_to_cart', methods: ['GET', 'POST'])]
    public function ajouterAuPanier(Produit $produit, Request $request)
    {
        $panier = $request->getSession()->get('panier', []);
        $panier[$produit->getId()] = $produit;
        $request->getSession()->set('panier', $panier);
        return $this->redirectToRoute('app_produit_index');
    }
}

