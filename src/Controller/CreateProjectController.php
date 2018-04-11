<?php

namespace App\Controller;

use App\Entity\Project;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CreateProjectController extends Controller
{
    /**
     * @Route("/create/project", name="create_project")
     */
    public function index(Request $request)
    {
        $project = new Project();
        $form = $this->createFormBuilder($project)
            ->add('nom', TextType::class, array('label' => 'Nom du Projet : '))
            ->add('nbJetons', IntegerType::class, array('label' => 'Nombre de Jetons : '))
            ->add('Valider', SubmitType::class, array('label' => 'Valider'))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $project = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($project);
            $entityManager->flush();
            return $this->redirectToRoute('addGroups', array(
                'idProjet'=>$project->getId()));
        }

        return $this->render('create_project/index.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
