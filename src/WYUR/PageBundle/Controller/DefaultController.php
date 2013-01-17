<?php

namespace WYUR\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use WYUR\ShowsBundle\Entity\Show;
use WYUR\ShowsBundle\Entity\Slot;
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
 * @Route("/")
 * @Template("WYURPageBundle:Default:page.html.twig")
 */
public function homeAction()	{
	
	$slot = $this->getDoctrine()->getRepository('WYURShowsBundle:Slot')->find(12);
	die($slot->getShow()->getName());
	$show = new show();
    $show->setName('A Foo Bar');
    $show->setDescription('I guess it\'s better to be lucky than good. We finished our first sensor sweep of the neutral zone. When has justice ever been as simple as a rule book? Earl Grey tea, watercress sandwiches... and Bularian canapés? Are you up for promotion? Well, that\'s certainly good to know. Your head is not an artifact! But the probability of making a six is no greater than that of rolling a seven. Maybe if we felt any human loss as keenly as we feel one of those close to us, human history would be far less bloody. Sure. You\'d be surprised how far a hug goes with Geordi, or Worf. I\'m afraid I still don\'t understand, sir. Maybe we better talk out here; the observation lounge has turned into a swamp. Wouldn\'t that bring about chaos? Mr. Worf, you do remember how to fire phasers? I\'ve had twelve years to think about it. And if I had it to do over again, I would have grabbed the phaser and pointed it at you instead of them. My oath is between Captain Kargan and myself. Your only concern is with how you obey my orders. Or do you prefer the rank of prisoner to that of lieutenant? In all trust, there is the possibility for betrayal.');
	$show->setSlot($slot);
	
    $em = $this->getDoctrine()->getManager();
    $em->persist($show);
    $em->flush();
	return array('slug' => 'default');
}


}