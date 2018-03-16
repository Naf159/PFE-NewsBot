<?php

namespace App\Controller;

use App\Entity\Actualite;
use App\Repository\ActualiteRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ActualitesController extends Controller
{
    /**
     * @Route("/actualites", name="actualites")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Actualite::class);
        $listActualites= $repository->findAll();

        foreach ($listActualites as $actualite) {
            // $advert est une instance de Advert
            echo $actualite->getContent();
        }

        return $this->render('actualites/liste_actualites.html.twig', [
            'controller_name' => 'ActualitesController', 'actualites' =>$listActualites
        ]);
    }

    /**
     * @Route("/actualites/creation")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function creation()
    {
        $em = $this->getDoctrine()->getManager();

        $actualite = new Actualite();
        $actualite->setTitre('test actualite');
        $actualite->setDescription('descriiiiption');
        $actualite->setUrlActualite('www.teeeeeeeest.com/actualites/concours15963');
        $actualite->setImage('test.jpg');
        $actualite->setPage('page1');
        $actualite->setIdSource(1);
        /*
         * Pas encore validé
         */
        $em->persist($actualite);
        /*
         * ON valide
         */
        $em->flush();

        return $this->render('actualites/creation.html.twig',[
            'controller_name' => 'ActualitesController','actualite' => $actualite,
        ]);
    }

    /**
     * @Route("/actualites/{id}")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function testdb(Actualite $actualite)
    {
        //$actualite = $this->getDoctrine()->getRepository(Actualite::class)->find($idactualite);
        //var_dump($actualite);
        //die();$
        if(! $actualite){
            throw $this->createNotFoundException('L"id saisi n"existe pas, essayez avec un autre id');
        }
        return $this->render('actualites/index.html.twig', [
            'controller_name' => 'ActualitesController', 'actualite' => $actualite,
        ]);
    }

    /*public function modification($idactualite)
    {
        $actualite = $this->getDoctrine()->getRepository()->find($idactualite);
        return $this->render('actualites/modification.html.twig', [
            'controller_name' => 'ActualitesController',
        ]);
    }*/

}
