<?php

namespace App\Controller\Admin;

use App\Entity\Entrepot;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EntrepotCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Entrepot::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
