<?php

namespace Salute\WelcomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Salute\WelcomeBundle\Entity\Samurai;
use Salute\WelcomeBundle\Entity\AdvancedPhp;
use Symfony\Component\HttpFoundation\Response;

class WelcomeController extends Controller
{//made changes only for creating new branch homeWork3
    public function indexAction($name)
    {
        $number = rand(1, 30);
        $division = ($number % 2);
        return $this->render('SaluteWelcomeBundle:Welcome:index.html.twig',[
            'name' => $name,
            'division' => $division,
            'number' => $number
        ]);
    }
    public function listAction()
    {
        $manager = $this->get('list');
        $items = $manager->listSamurai();

        return $this->render('SaluteWelcomeBundle:Welcome:list.html.twig',['items' => $items]);
    }
    public function createAction()
    {
        $course = new AdvancedPhp();
        $course->setName('Symfony2');

        $samurai = new Samurai();
        $samurai->setName('Zloy Barmaley');
        $samurai->setSkill('7.55');

        $samurai->setAdvancedPhp($course);

        $em = $this->getDoctrine()->getManager();
        $em->persist($samurai);
        $em->persist($course);
        $em->flush();

        return new Response('Created product id: '.$samurai->getId().' and assigned course: '.$course->getName());
    }
    public function showAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $samurai = $em->getRepository('SaluteWelcomeBundle:Samurai')
            ->findAllOrderedByName();

       return $this->render('SaluteWelcomeBundle:Welcome:show.html.twig',['samurai' => $samurai]);
    }
    public function updateAction($id)
    {
        $samurai = $this->getDoctrine()->getRepository('SaluteWelcomeBundle:Samurai')->find($id);


        if (!$samurai) {
            throw $this->createNotFoundException('No product found for id '.$id);
        }

        $samurai->setName('Robert Bobert Barambeck');
        $em = $this->getDoctrine()->getManager();
        $em->persist($samurai);
        $em->flush();

        return new Response('Updated product id '.$samurai->getId());
    }
}

