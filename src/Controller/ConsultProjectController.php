<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ConsultProjectController extends Controller
{
    /**
     * @Route("/consult/project", name="consult_project")
     */
    public function index()
    {
        return $this->render('consult_project/index.html.twig', [
            'controller_name' => 'ConsultProjectController',
            'session'   => $_SESSION['_sf2_attributes']
        ]);
    }
}
