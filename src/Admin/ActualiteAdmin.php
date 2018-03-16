<?php
namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Created by PhpStorm.
 * User: naf159
 * Date: 16/03/18
 * Time: 03:27 م
 */


class ActualiteAdmin extends AbstractAdmin{
    protected function configureFormFields(FormMapper $form)
    {
        $form->add('nomcomplet', TextType::class);
        $form->add('username', TextType::class);
        $form->add('email', EmailType::class);
        $form->add('privilege',ChoiceType::class, array(
                'choices'  => array(
                    'Administrateur (Principal)' => null,
                    'Administrateur' => true,
                    'Conributeur' => false,
                ))
        );
    }

    protected function configureListFields(ListMapper $list)
    {
        parent::configureListFields($list);
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        parent::configureDatagridFilters($filter);
    }


}