<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as Factory;

class ContactsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create("fr_FR"); 

        $categories = [];
        $categorie = new Categorie();
        $categorie->setLibelle("Professionnel")
                  ->setDescription("Lorem ipsum dolor sit amet. Non enim pariatur est dignissimos doloremque vel amet eaque ea sint deserunt est quidem similique qui animi placeat eos totam nihil. Et dolores quia rem mollitia optio ut internos distinctio. In galisum omnis est itaque ratione vel architecto soluta et consequatur nisi et laboriosam maiores aut Quis")
                  ->setImage("/img/business.jpg");    
        $manager->persist($categorie);
        $categories[] = $categorie;

        $categorie = new Categorie();
        $categorie->setLibelle("Sport")
                  ->setDescription("Lorem ipsum dolor sit amet. Non enim pariatur est dignissimos doloremque vel amet eaque ea sint deserunt est quidem similique qui animi placeat eos totam nihil. Et dolores quia rem mollitia optio ut internos distinctio. In galisum omnis est itaque ratione vel architecto soluta et consequatur nisi et laboriosam maiores aut Quis")
                  ->setImage("/img/football.jpg");    
        $manager->persist($categorie);
        $categories[] = $categorie;

        $categorie = new Categorie();
        $categorie->setLibelle("Prive")
                  ->setDescription("Lorem ipsum dolor sit amet. Non enim pariatur est dignissimos doloremque vel amet eaque ea sint deserunt est quidem similique qui animi placeat eos totam nihil. Et dolores quia rem mollitia optio ut internos distinctio. In galisum omnis est itaque ratione vel architecto soluta et consequatur nisi et laboriosam maiores aut Quis")
                  ->setImage("/img/white.jpg");    
        $manager->persist($categorie);
        $categories[] = $categorie;

        $genres = ["male","female"];
        
        
        for ($i=0; $i<100; $i++){
            $sexe = mt_rand(0,1);
            if($sexe==0){
                $type = 'men';
            }else{
                $type = 'women';
            }
            $contact = new Contact();
            $contact->setNom($faker->lastName())
                    ->setPrenom($faker->firstname($genres[mt_rand(0,1)]))
                    ->setRue($faker->streetAddress())
                    ->setCp($faker->numberBetween(75000, 90000))
                    ->setVille($faker->city())
                    ->setAvatar("https://randomuser.me/api/portraits/".$type."/".$i.".jpg")
                    ->setMail($faker->email())
                    ->setCategorie($categories[mt_rand(0,2)])
                    ->setSexe($sexe);
        $manager->persist($contact);
        }
        $manager->flush();
    }
}
