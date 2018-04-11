<?php

namespace App\Controller;

use App\Entity\Eleve;
use App\Repository\EleveRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AddGroupsController extends Controller
{
    /**
     * @Route("/add/groups", name="add_groups")
     */
    public function index()
    {
        return $this->render('add_groups/index.html.twig', [
            'controller_name' => 'AddGroupsController',
        ]);
    }
}
