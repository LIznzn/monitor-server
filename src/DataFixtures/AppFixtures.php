<?php

namespace App\DataFixtures;

use App\Entity\Node;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Constraints\DateTime;

class AppFixtures extends Fixture
{
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail("ww@acgmiao.com");
        $user->setRoles(["ROLE_ADMIN"]);
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'password'));
        $manager->persist($user);
        $node = new Node();
        $node->setName("测试服务器")
            ->setCreateTime(new \DateTime('2017-01-01 08:00:00'))
            ->setUser($user);
        $manager->persist($node);
        $node1 = new Node();
        $node1->setName("测试服务器1")
            ->setCreateTime(new \DateTime('2017-01-01 08:00:00'))
            ->setUser($user);
        $manager->persist($node1);
        $node2 = new Node();
        $node2->setName("测试服务器2")
            ->setCreateTime(new \DateTime('2017-01-01 08:00:00'))
            ->setUser($user);
        $manager->persist($node2);
        $node3 = new Node();
        $node3->setName("测试服务器3")
            ->setCreateTime(new \DateTime('2017-01-01 08:00:00'))
            ->setUser($user);
        $manager->persist($node3);
        $node4 = new Node();
        $node4->setName("测试服务器4")
            ->setCreateTime(new \DateTime('2017-01-01 08:00:00'))
            ->setUser($user);
        $manager->persist($node4);

        $manager->flush();
    }
}
