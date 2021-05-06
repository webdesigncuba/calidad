<?php

namespace App\Controller\Admin;

use App\Entity\TipoDoc;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TipoDocCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TipoDoc::class;
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
