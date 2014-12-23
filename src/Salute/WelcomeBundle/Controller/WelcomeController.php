<?php

namespace Salute\WelcomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Salute\WelcomeBundle\Entity\Samurai;
use Salute\WelcomeBundle\Entity\AdvancedPhp;
use Salute\WelcomeBundle\Entity\Task;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
//use \DateTime;
use Salute\WelcomeBundle\Form\Type\TaskType;

class WelcomeController extends Controller
{
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
        $em = $this->getDoctrine()->getManager()
//        ;
//        $samurai = $em
            ->getRepository('SaluteWelcomeBundle:Samurai')->findBy([], ['name'=>'asc']);
        ;
/*
SELECT
  t0.id AS id1,
  t0.name AS name2,
  t0.skill AS skill3,
  t0.advancedphp_id AS advancedphp_id4,
  t5.id AS id6,
  t5.name AS name7
FROM
  Samurai t0
  LEFT JOIN AdvancedPhp t5 ON t0.advancedphp_id = t5.id
ORDER BY
  t0.name ASC
*/
//        uasort($samurai, function($a, $b) {
//            return $a->getName() <= $b->getName();
//        });
//        StackOverflow
//create a QueryBuilder instance
/*        $qb = $this->_em->createQueryBuilder();
        $qb->add('select', 'a')
//enter the table you want to query
            ->add('from', 'Members a')
            ->add('where', 'a.id = :id')
//order by username if you like
//->add('orderBy', 'a.username ASC')
//find a row with id=5
            ->setParameter('id', '5');
        query = $qb->getQuery();
//if you dont put 3 or Query::HYDRATE_ARRAY inside getResult() an object is returned and if you put 3 an array is returned
        $accounts = $query->getResult(3);*/
       return $this->render('SaluteWelcomeBundle:Welcome:show.html.twig', [
           'samurai' => $em,
       ]);
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
/*    public function taskAction(Request $request)
    {
        $newTask = new Task();
//        $newTask->setTask('garbage clean');
//        $newTask->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($newTask)
            ->add('task','text')
            ->add('dueDate','date', ['widget' => 'single_text'])
            ->getForm();
        if($request->getMethod() == 'POST') {

            $form->submit($request);
            $form->isValid();
            return $this->redirect($this->generateUrl('success'));
            }
        return $this->render('SaluteWelcomeBundle:Welcome:task.html.twig', [
            'form' => $form->createView(),
        ]);
    }*/
    public function successFormAction()
    {
        return $this->render('SaluteWelcomeBundle:Welcome:successForm.html.twig', [
        ]);
    }
    public function taskAction(Request $request)
    {
        $task = new Task();
        $form = $this->createForm(new TaskType(), $task);
        $form->handleRequest($request); // form return itself
        if($form->isValid()){
            $em = $this->getDoctrine()->getManager();
//            $task = $form->getData(); //get entity object from form object
            $priority = $task->getPriority();
            $em->persist($task);
            $em->persist($priority);
            $em->flush();

            $session = $this->getRequest()->getSession();
            $session->getFlashBag()->add('message', 'Task saved!');

            return $this->redirect($this->generateUrl('success'));
        }

        return $this->render('SaluteWelcomeBundle:Welcome:task.html.twig', [
            'form' => $form->createView(),
        ]);

    }
}

