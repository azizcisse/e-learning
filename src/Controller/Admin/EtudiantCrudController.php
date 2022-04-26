<?php

namespace App\Controller\Admin;

use App\Entity\Etudiant;
use App\Entity\Niveau;
use App\Entity\Diplome;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

class EtudiantCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Etudiant::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('prenom'),
            TextField::new('nom'),
            TextField::new('sexe'),
            DateField::new('dateNaissance'),
            EmailField::new('email'),
            TelephoneField::new('telephone'),
            TextField::new('pays')->onlyOnIndex(),
            TextField::new('pseudo')->hideOnIndex(),
            TextField::new('password')->hideOnIndex(),
            AssociationField::new('niveau'),
            AssociationField::new('diplome'),
            DateTimeField::new('createdAt')->onlyOnDetail(),
            DateTimeField::new('updatedAt')->onlyOnDetail(),
        ];
        
    }
}
