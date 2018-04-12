<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProjetController extends Controller
{
    /**
     * @Route("/projet", name="projet")
     */
    public function index()
    {
        return $this->render('projet/projet.html.twig', [
            'controller_name' => 'HelpController',
            'session'   => $_SESSION['_sf2_attributes']
        ]);
    }
}
