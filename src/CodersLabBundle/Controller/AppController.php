<?php

namespace CodersLabBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class AppController extends Controller
{
    /**
     * @Route("/")
     * @Template
     */
    public function indexAction(){
        $user = $this->getUser();

        if ($user === null){
            return $this->redirectToRoute('fos_user_security_login');
        }

        $repo = $this->getDoctrine()->getRepository('CodersLabBundle:Person');
        $people = $repo->findByUser($user);

        return [
            'people' => $people,
        ];
    }
}
