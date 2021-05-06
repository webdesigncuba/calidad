<?php

namespace App\Controller\Admin;

use App\Entity\Tipo;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TipoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tipo::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nombre'),   
        ];
    }
    
}
