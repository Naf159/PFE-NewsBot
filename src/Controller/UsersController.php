<?php

namespace App\Controller;
use App\Entity\Utilisateur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class UsersController extends Controller
{
    /**
     * @Route("/users", name="users")
     */
    public function index()
    {
        /**get by id
         * $advert = $this->getDoctrine()
        ->getManager()
        ->getRepository('OCPlatformBundle:Advert')
        ->find($id)
        ;*/
        return $this->render('users/liste_users.html.twig', [
            'controller_name' => 'UsersController',
        ]);
    }

    /**
     * @Route("/users/creation", name="userscreate")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function creation()
    {
        return $this->render('users/creation.html.twig', [
            'controller_name' => 'UsersController',
        ]);
    }
    /**
     * @Route("/users/modification", name="usersmodif")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function modification($id)
    {
        $user = ["1","test@gmail.com"];
        return $this->render('users/modification.html.twig', [
            'controller_name' => 'UsersController','user' => $user
        ]);
    }

    /**
     * @Route ("/users/new")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function new(Request $request)
    {
        // creates a task and gives it some dummy data for this example
        $user = new Utilisateur();
        $user->setUsername('usernum1');
        $user->setNomcomplet('nom prenom');
        $user->setEmail('email@email.com');
        $user->setPrivilege('admin');
        //$task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($user)
            ->add('username', TextType::class, array('required' => false))
            ->add('nomcomplet', TextType::class)
            ->add('email', TextType::class, array('required' => false))
            ->add('privilege',  ChoiceType::class, [
                'privilege' => [
                    'Administrateur principal',
                    'Administrateur',
                    'Contributeur',
                    'Autres',
                ]], array('required' => false))
            ->add('save', SubmitType::class, array('label' => 'Ajouter utilisateur'))
            ->getForm();

        $form->handleRequest($request);

        $succes = null;
        $erreur= null;
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $succes = true;
            $user = $form->getData();
            $this->addFlash("success", "Teeeeeeeeeeest success");
            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            // print ('enregistrement ajouté avec succès');
            //return $this->redirectToRoute('task_success');
            $erreur = false;
        }
        else
            $succes = false;
        return $this->render('users/new.html.twig', array(
            'form' => $form->createView(),'succes'=>$succes
        ));
    }
}
