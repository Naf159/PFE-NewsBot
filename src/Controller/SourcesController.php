<?php

namespace App\Controller;

use App\Entity\Source;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Utilisateur;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
class SourcesController extends Controller
{
    /**
     * @Route("/sources", name="sources")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Source::class);
        $listSources = $repository->findAll();

        foreach ($listSources as $source) {
            // $advert est une instance de Advert
            echo $source->getContent();
        }

        return $this->render('sources/liste_sources.html.twig', [
            'controller_name' => 'SourcesController','sources' => $listSources
        ]);
    }
    /**
     * @Route("/sources/creation", name="creation")
     */
    public function cration()
    {
        $source = new Source();

        // On crée le FormBuilder grâce au service form factory
        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $source);

        // On ajoute les champs de l'entité que l'on veut à notre formulaire
        $formBuilder
            ->add('nom_site',      DateType::class)
            ->add('url_site',     TextType::class)
            ->add('description_site',   TextareaType::class)
            ->add('categorie_site',    TextType::class)
            ->add('pattern_titre', CheckboxType::class)
            ->add('pattern_description',      SubmitType::class)
            ->add('pattern_page_suivante',   TextareaType::class)
            ->add('pattern_lien_actualite',    TextType::class)
            ->add('pattern_image', CheckboxType::class)
            ->add('pattern_date_pub',    TextType::class)
            ->add('pattern_date_modif', CheckboxType::class)
            ->add('save',      SubmitType::class)
        ;
        return $this->render('sources/creation.html.twig', [
            'controller_name' => 'SourcesController',
        ]);
    }
    /**
     * @Route("/sources/modification", name="modification")
     */
    public function modification()
    {
        return $this->render('sources/modification.html.twig', [
            'controller_name' => 'SourcesController',
        ]);
    }
}
