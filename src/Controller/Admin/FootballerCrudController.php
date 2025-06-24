<?php

namespace App\Controller\Admin;

use App\Entity\Footballer;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ColorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class FootballerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Footballer::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Footballer')
            ->setEntityLabelInPlural('Footballers')
            ->setPageTitle('index', 'Liste des footballeurs')
            ->setPageTitle('new', 'Ajouter un footballeur')
            ->setPageTitle('edit', 'Modifier un footballeur');
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->onlyOnIndex();
        yield TextField::new('firstName', 'Prénom');
        yield TextField::new('lastName', 'Nom');
        yield TextField::new('team', 'Équipe');
        yield TextField::new('nationality', 'Nationalité');
        yield TextField::new('origin', 'Origine')->hideOnIndex();

        yield ImageField::new('image', 'Photo')
            ->setBasePath('uploads/footballers')
            ->setUploadDir('public/uploads/footballers')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setFormTypeOptions([
                'attr' => [
                    'accept' => 'image/*'
                ]
            ])
            ->setRequired(false);

        yield ImageField::new('flagImage', 'Drapeau')
            ->setBasePath('uploads/flags')
            ->setUploadDir('public/uploads/flags')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setFormTypeOptions([
                'attr' => [
                    'accept' => 'image/*'
                ]
            ])
            ->setRequired(false);

        yield ColorField::new('color', 'Couleur');
    }
}
