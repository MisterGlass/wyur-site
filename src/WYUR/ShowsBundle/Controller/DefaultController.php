<?php

namespace WYUR\ShowsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use WYUR\ShowsBundle\Entity\Show;
use WYUR\ShowsBundle\Entity\Hour;
use WYUR\ShowsBundle\Entity\Day;

class DefaultController extends Controller
{


/**
 * @Route("/schedule")
 * @Template
 */
public function scheduleAction()	{
	$hrepository = $this->getDoctrine()->getRepository('WYURShowsBundle:Hour');
	$hours = $hrepository->findAll();
	
	$drepository = $this->getDoctrine()->getRepository('WYURShowsBundle:Day');
	$days = $drepository->findAll();
	return array('hours' => $hours, 'days' => $days);
}

/**
 * @Route("/{slug}")
 * @Template
 */
public function showAction(Show $show)	{
}

}