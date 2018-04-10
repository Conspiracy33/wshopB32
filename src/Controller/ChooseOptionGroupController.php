<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ChooseOptionGroupController extends Controller
{
    /**
     * @Route("/choose/option/group", name="choose_option_group")
     */
    public function index()
    {
        return $this->render('choose_option_group/index.html.twig', [
            'controller_name' => 'ChooseOptionGroupController',
        ]);
    }
}
