<?php
namespace Salute\WelcomeBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Salute\WelcomeBundle\Entity\Samurai;

class LoadUserData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $samurai = new Samurai();
        $samurai->setName('Vasia');
        $samurai->setSkill('9.99');

        $manager->persist($samurai);
        $manager->flush();
    }
}