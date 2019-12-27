<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        for($i=0 ; $i<30 ; $i++)
        {
            $article = new Article();
            $article->setTitle("Titre article n~ $i")
                ->setContent("<p>Contenu article numero $i</p>")
                ->setImage("image$i")
                ->setCreatedAt(new \DateTime());

            $manager->persist($article);
        }

        $manager->flush();
    }
}
