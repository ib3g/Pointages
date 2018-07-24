<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class logoutController extends Controller
{
    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction()
    {
        if ($this->getUser())
        {
            session_destroy();
            return $this->redirectToRoute('homepage');
        }
    }
}