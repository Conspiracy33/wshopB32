<?php

namespace App\Controller;

use App\Entity\Eleve;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AddGroupsController extends Controller
{
    /**
     * @Route("/add/groups", name="add_groups")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Eleve::class);
        $eleves = $repository->findAll();

        return $this->render('add_groups/index.html.twig', [
            'controller_name' => 'AddGroupsController',
            'eleves' => $eleves
        ]);
    }
}
