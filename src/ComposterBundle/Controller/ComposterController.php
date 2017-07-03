<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 02/07/2017
 * Time: 17:14
 */

namespace ComposterBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class ComposterController extends Controller
{
    /**
     * @Route("/composter", name="composter")
     */
    public function indexAction(Request $request)
    {

        return $this->render('ComposterBundle:Composter:list.html.twig');
    }
}
