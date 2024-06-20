<?php

namespace App\Controller;

use App\Entity\Schoolclass;
use App\Repository\SchoolclassRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;


class SchoolclassController extends AbstractController
{
    private $schoolclassRepository;
    private $entityManager;

    public function __construct(SchoolclassRepository $schoolclassRepository, EntityManagerInterface $entityManager)
    {
        $this->schoolclassRepository = $schoolclassRepository;
        $this->entityManager = $entityManager;
    }

    #[Route('/schoolclass', name: 'app_schoolclass')]
    public function index(): Response
    {
        return $this->render('schoolclass/index.html.twig', [
            'controller_name' => 'SchoolclassController',
        ]);
    }

    #[Route('/getClasses', name: 'getClasses')]
    public function getClasses(): Response
    {
        $classes = $this->schoolclassRepository->findAll();

        $response = [];
        foreach ($classes as $class) {
            $response[] = [
                'id' => $class->getId(),
                'name' => $class->getName(),
                'department' => $class->getDepartment()->getName(),
                'studentsamount' => $class->getStudentsamount(),
                'repamount' => $class->getRepamount(),
                'year' => $class->getYear(),

            ];
        }
        return $this->json($response);
    }

    #[Route('/getClassNames', name: 'getClassNames')]
    public function getClassNames(): Response
    {
        $classes = $this->schoolclassRepository->findAll();

        $response = [];
        foreach ($classes as $class) {
            $response[] = [
                'id' => $class->getId(),
                'name' => $class->getName(),
            ];
        }
        return $this->json($response);
    }

    #[Route('/changeClass/{classID}', name: 'changeClass')]
    public function changeClass($classID): Response
    {
        $classID = 1;
        return new Response('Class ' . $classID . ' changed');
    }
    #[Route('deleteClass/{classID}', name: 'deleteClass')]
    public function deleteClass($classID, EntityManagerInterface $em): Response
    {
        $class = $em->getRepository(Schoolclass::class)->find($classID);
        $em->remove($class);
        $em->flush();

        return new Response('Deleted Class');
    }
}
