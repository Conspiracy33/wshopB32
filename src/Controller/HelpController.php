<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HelpController extends Controller
{
    /**
     * @Route("/help", name="help")
     */
    public function index()
    {
        return $this->render('help/help.html.twig', [
            'controller_name' => 'HelpController',
            'session'   => $_SESSION['_sf2_attributes']
        ]);
    }
}
