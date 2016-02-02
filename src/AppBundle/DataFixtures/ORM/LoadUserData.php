<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData implements FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $userManager = $this->container->get('fos_user.user_manager');

        $user = $userManager->createUser();
        $user->setUsername('user1');
        $user->setEmail('user1@wojtowicz.ovh');
        $user->setPlainPassword('123babajagapatrzy');
        $user->setEnabled(true);
        $user->setRoles(array('ROLE_USER'));
        $userManager->updateUser($user, true);

        $user = $userManager->createUser();
        $user->setUsername('user2');
        $user->setEmail('user2@wojtowicz.ovh');
        $user->setPlainPassword('123babajagapatrzy');
        $user->setEnabled(true);
        $user->setRoles(array('ROLE_USER'));
        $userManager->updateUser($user, true);

        $user = $userManager->createUser();
        $user->setUsername('user3');
        $user->setEmail('user3@wojtowicz.ovh');
        $user->setPlainPassword('123babajagapatrzy');
        $user->setEnabled(true);
        $user->setRoles(array('ROLE_USER'));
        $userManager->updateUser($user, true);
    }
}