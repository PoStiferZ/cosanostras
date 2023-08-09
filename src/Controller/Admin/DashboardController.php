<?php

namespace App\Controller\Admin;

use App\Entity\Entrepot;
use App\Entity\Objet;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{


    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('admin/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setFaviconPath('assets/img/cosanostraslogo-flashworld.png')
            ->setTitle('Cosa Nostras');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Membres', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Entrepots', 'fas fa-building', Entrepot::class);
        yield MenuItem::linkToCrud('Objets', 'fas fa-briefcase', Objet::class);
    }
}
