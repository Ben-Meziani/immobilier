<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController 
{

public function __construct(PropertyRepository $repository, ObjectManager $em)
{
    $this->repository = $repository;
}

    /**
     * @Route("/biens", name="property.index")
     * @return Response
     */

    public function index(): Response
    { 
        $property = $this->repository->findAllvisible();
        dump($property);
        $this->em->flush();
        return $this->render('property/index.html.twig', [
            'current_menu' => 'properties'
        ]);
    }
}

