<?php
// src/Controller/Admin/DashboardController.php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Footballer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\Security\Core\User\UserInterface;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'app_admin_dashboard_index')]
    public function index(): Response
    {
        // Option 1: Vous pouvez utiliser le tableau de bord par défaut d'EasyAdmin
        return $this->render('@EasyAdmin/page/content.html.twig');

        // Option 2: Ou utiliser votre template personnalisé (commenté pour l'instant)
        // return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Golden Goat - Administration')
            ->setFaviconPath('images/logo_goldengoat.png');
    }

    public function configureUserMenu(UserInterface $user): UserMenu
    {
        return UserMenu::new()
            ->displayUserName()
            ->displayUserAvatar()
            ->setName($user instanceof User ? $user->getEmail() : (string)$user->getUserIdentifier());
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::section('Utilisateurs');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-users', User::class);

        yield MenuItem::section('Contenu');
        yield MenuItem::linkToCrud('Footballeurs', 'fas fa-futbol', Footballer::class);

        yield MenuItem::section('Liens');
        yield MenuItem::linkToRoute('Retour au site', 'fas fa-arrow-left', 'home');
    }

    public function configureAssets(): Assets
    {
        return Assets::new()
            ->addCssFile('build/app.css');
    }

    public function configureCrud(): Crud
    {
        return Crud::new()
            ->setDateFormat('dd/MM/yyyy')
            ->setTimeFormat('HH:mm')
            ->setDateTimeFormat('dd/MM/yyyy HH:mm')
            ->setTimezone('Europe/Paris')
            ->setNumberFormat('%.2f');
    }
}
