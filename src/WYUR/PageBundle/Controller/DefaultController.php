<?php

namespace WYUR\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use WYUR\PageBundle\Entity\Page;

class DefaultController extends Controller
{

/**
 * @Route("/{slug}")
 * @Template
 */
public function pageAction(Page $page)	{
}

/**
 * @Template("WYURPageBundle:Default:page.html.twig")
 */
public function homeAction()	{
	$page = $this->getDoctrine()->getRepository('WYURPageBundle:Page')->findOneBySlug('homepage');
	//die($page[0]);
	return array('page' => $page);
}


}