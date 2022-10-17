<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\MicroPost;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
  public function load(ObjectManager $manager): void
  {
    $microPost1 = new MicroPost();
    $microPost1->setTitle('Welcome to Switzerland!');
    $microPost1->setText('Welcome to Switzerland!');
    $microPost1->setCreated(new DateTime());
    $manager->persist($microPost1);

    $microPost2 = new MicroPost();
    $microPost2->setTitle('Welcome to Germany!');
    $microPost2->setText('Welcome to Germany!');
    $microPost2->setCreated(new DateTime());
    $manager->persist($microPost2);

    $microPost3 = new MicroPost();
    $microPost3->setTitle('Welcome to Japan!');
    $microPost3->setText('Welcome to Japan!');
    $microPost3->setCreated(new DateTime());
    $manager->persist($microPost3);

    $manager->flush();
  }
}
