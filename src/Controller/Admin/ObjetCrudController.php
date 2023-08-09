<?php

namespace App\Controller\Admin;

use App\Entity\Objet;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ObjetCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Objet::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),

            ImageField::new('photo')
                ->setBasePath('uploads/')
                ->setUploadDir('public/uploads/')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),

            AssociationField::new('entrepot')
        ];
    }

}
