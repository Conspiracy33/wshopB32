<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SeeMoreController extends Controller
{
    /**
     * @Route("/see/more", name="see_more")
     */
    public function index()
    {
        return $this->render('see_more/index.html.twig', [
            'controller_name' => 'SeeMoreController',
            'session'   => $_SESSION['_sf2_attributes'],
        ]);
    }
}
