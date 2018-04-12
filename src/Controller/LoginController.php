<?php

namespace App\Controller;


use App\Entity\Eleve;
use App\Entity\Enseignant;
use App\Entity\ResponsablePedago;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LoginController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function index(Request $request)
    {



        $form = $this->createFormBuilder()
            ->add('mail', EmailType::class, [
                'label' => 'Adresse Email',
                'attr' => ['class' => 'form-control','name' => 'email','placeholder' => 'Adresse mail'],
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Mot de passe',
                'attr' => ['class' => 'form-control','name' => 'password','placeholder' => 'Mot de passe'],
            ])
            ->add('statut', ChoiceType::class, [
                'label' => 'Statut:',
                'attr' => ['class' => 'form-control','name' => 'statut'],
                'choices' => array(
                    'Etudiant' => 0,
                    'Intervenant' => 1,
                    'Responsable pédagogique' => 2
                )
            ])
            ->add('connexion', SubmitType::class, [
                'attr' => ['class' => 'btn btn-block bg-pink waves-effect', 'type' => 'submit', 'value' => 'Connexion'],
            ])

            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $user = $form->getData();
            //wis adresse : ecole-wis.net
            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            //$entityManager = $this->getDoctrine()->getManager();
            //$entityManager->
            // $entityManager->persist($task);
            // $entityManager->flush();
            //Verification des données renvoyées par le formulaire.
            //var_dump($user);

            switch ($user['statut'])
            {
                case 0:
                    $repository = $this->getDoctrine()->getRepository(Eleve::class);
                    break;

                case 1:
                    $repository = $this->getDoctrine()->getRepository(Enseignant::class);
                    break;

                case 2:
                    $repository = $this->getDoctrine()->getRepository(ResponsablePedago::class);
                    break;

                default:
                    $repository = null;
                    break;
            }
            if($repository != null) {
                $utilisateur = $repository->findOneBy([
                    'email' => $user['mail'],
                    'motdepasse' => $user['password'],
                ]);
                if($utilisateur != null) {
                    $session = new Session();
                    if(isset($_SESSION['nom'])) {

                    }
                    else{
                        $session->set('nom', $utilisateur->getNom());
                        $session->set('prenom', $utilisateur->getPrenom());
                        $session->set('email', $utilisateur->getEmail());
                        $session->set('statut', $user['statut']);
                    }
                    //$session->set('email', 'Drak');
                    //var_dump($_SESSION['_sf2_attributes']);/*
                    return $this->render('accueil/index.html.twig', array(
                        'session'   => $_SESSION['_sf2_attributes']
                    ));
                }
            }
            else
            {
                return $this->render('login/login.html.twig',array(
                    'form' => $form->createView(),
                    'errorMessage' => 'Identifiants invalides.'
                ));
            }
        }

        return $this->render('login/login.html.twig',array(
            'form' => $form->createView(),
            'errorMessage' => ''
        ));
    }

    public function checkLogin(string $userMail, string $userPass)
    {

    }
}
