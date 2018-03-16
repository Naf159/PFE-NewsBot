<?php
/**
 * Created by PhpStorm.
 * User: naf159
 * Date: 16/03/18
 * Time: 03:26 م
 */

namespace App\Admin;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserAdmin extends AbstractAdmin{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('nomcomplet', TextType::class);
        $formMapper->add('username', TextType::class);
        $formMapper->add('email', EmailType::class);
        $formMapper->add('privilege',ChoiceType::class, array(
            'choices'  => array(
                'Administrateur (Principal)' => null,
                'Administrateur' => true,
                'Conributeur' => false,
            ))
        );
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('nomcomplet');
        $datagridMapper->add('username');
        $datagridMapper->add('email');
        $datagridMapper->add('privilege');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('nomcomplet');
        $listMapper->addIdentifier('username');
        $listMapper->addIdentifier('email');
        $listMapper->addIdentifier('privilege');
    }
}