<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Categorie;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $encoder;
    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        $user = new User();
        $user->setEmail('user@test.com')
            ->setPrenom($faker->firstName())
            ->setNom($faker->lastName())
            ->setRoles(['ROLE_REDACTRICE'])
            ->setTelephone($faker->phoneNumber());

        $password = $this->encoder->hashPassword($user, 'password');
        $user->setPassword($password);
        $manager->persist($user);

        for($i=0; $i < 20; $i++){
            $article = new Article();

            $article->setTitle($faker->words(3, true))
                ->setCreatedAt($faker->dateTimeBetween('-6 month', 'now'))
                ->setContent($faker->text(350))
                ->setSlug($faker->slug(3))
                ->setUser($user)
                ->setFile($faker->imageUrl());

            $manager->persist($article);
        }

        for($c=0; $c < 5; $c++){
            $categorie = new Categorie();
            $categorie->setNom($faker->word())
                ->setDescription($faker->words(10, true))
                ->setSlug($faker->slug());

            $manager->persist($categorie);

            for($i=0; $i < 20; $i++){
                $article = new Article();

                $article->setTitle($faker->words(3, true))
                    ->setCreatedAt($faker->dateTimeBetween('-6 month', 'now'))
                    ->setContent($faker->text(350))
                    ->setSlug($faker->slug(3))
                    ->setUser($user)
                    ->addCategorie($categorie)
                    ->setFile($faker->imageUrl());

                $manager->persist($article);
            }
        }


        $manager->flush();
    }
}
