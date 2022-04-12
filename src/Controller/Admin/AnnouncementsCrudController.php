<?php

namespace App\Controller\Admin;

use App\Entity\Announcements;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AnnouncementsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Announcements::class;
    }

    public function configureFields(string $pageName): iterable
    {

        return [
            NumberField::new('id'),
            TextField::new('title'),
            TextField::new('description'),
            NumberField::new('price'),
            BooleanField::new('active'),
            NumberField::new('views'),
        ];
    }
}