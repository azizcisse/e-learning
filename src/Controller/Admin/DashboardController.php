<?php

namespace App\Controller\Admin;

use App\Entity\Etudiant;
use App\Entity\Formateur;
use App\Entity\Formation;
use App\Entity\Niveau;
use App\Entity\Diplome;
use App\Entity\Grade;
use App\Entity\Specialite;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        // return parent::index();
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(FormationCrudController::class)->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('E-Learning');
    }

    public function configureMenuItems(): iterable
    {
        // yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linktoRoute('Retour au site web', 'fas fa-home', 'homepage');
        yield MenuItem::linkToCrud('Formation', 'fas fa-graduation-cap', Formation::class);
        yield MenuItem::linkToCrud('Formateur', 'fas fa-users', Formateur::class);
        yield MenuItem::linkToCrud('Etudiant', 'fas fa-user-graduate', Etudiant::class);
        yield MenuItem::linkToCrud('Niveau', 'fas fa-list', Niveau::class);
        yield MenuItem::linkToCrud('Diplome', 'fas fa-list', Diplome::class);
        yield MenuItem::linkToCrud('Grade', 'fas fa-list', Grade::class);
        yield MenuItem::linkToCrud('Specialite', 'fas fa-list', Specialite::class);
        
    }
}
