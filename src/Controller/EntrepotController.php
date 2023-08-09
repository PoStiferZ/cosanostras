<?php

namespace App\Controller;

use App\Entity\Entrepot;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EntrepotController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)  {
        $this->entityManager = $entityManager;
    }

    #[Route('/entrepots', name: 'app_entrepots')]
    public function index(): Response
    {
        $entrepots = $this->entityManager->getRepository(Entrepot::class)->findAll();

        return $this->render('entrepot/index.html.twig', [
            'entrepots' => $entrepots
        ]);
    }

    #[Route('/entrepot/{id}', name: 'app_entrepot')]
    public function show($id): Response
    {
        $entrepot = $this->entityManager->getRepository(Entrepot::class)->find($id);


        if (!$entrepot) {
            return $this->redirectToRoute('app_entrepots');
        }

        return $this->render('entrepot/show.html.twig', [
            'entrepot' => $entrepot
        ]);
    }
}
