<?php

namespace App\Controller\Admin;

use App\Entity\Documento;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Entity\File;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;


class DocumentoCrudController extends AbstractCrudController
{
    private $params;
    
    public static function getEntityFqcn(): string
    {
        return Documento::class;
    }
    
    public function __construct(ParameterBagInterface$params)
    {
        $this->params=$params;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            DateField::new('fechadoc', 'Fecha')->setFormat('dd-MM-Y'),
            TextField::new('nombre','Nombre'),
            AssociationField::new('tipo', 'Tipo'),
            AssociationField::new('area', 'Area'),
            TextareaField::new('ficheroFile', 'Fichero')->setFormType(VichFileType::class, ['delete_label'=> 'suprimir','constraints'=>[new File(['mimeTypes'=> ['application/pdf']])]])->onlyOnForms(),
            BooleanField::new('estado', 'Activo - No Activo'),
           // TextField::new('fichero', 'Documento')->setTemplatePath('doc.html.twig')->setCustomOption('base_path', $this->params->get('app.path.docs'))->onlyOnIndex(),
        ];
    }
    
}
