<?php

namespace App\Controller\Admin;

use App\Entity\Documentos;
use Doctrine\DBAL\Types\TextType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Vich\UploaderBundle\Form\Type\VichFileType;

class DocumentosCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Documentos::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('Id')->hideOnForm(),
            DateField::new('Fecha')->setHelp('Fecha del Documento'),
            TextField::new('Nombre'),
            AssociationField::new('tipo','Tipo de Documento'),
            AssociationField::new('area', 'Area'),
            TextField::new('documentoFile')->setFormType(VichFileType::class)->onlyOnForms(),
           // TextField::new('documento', 'Documento')->onlyOnDetail(),
            BooleanField::new('estado','Activo'),
        ];
    }

}
