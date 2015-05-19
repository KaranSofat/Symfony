<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TestController extends Controller
{
    public function indexAction()
    {
        /*
         * @Route("/stripe")
         * The action's view can be rendered using render() method
         * or @Template annotation as demonstrated in DemoController.
         *
         */
        return $this->render('AcmeDemoBundle:Test:index.html.twig');
    }
}
