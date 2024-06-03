<?php

namespace App\Controller;

use App\Repository\PublisherRepository;
use App\Repository\SubjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\BookRepository;

class BookController extends AbstractController
{

    public function __construct(BookRepository $bookRepository, EntityManagerInterface $entityManager, SubjectRepository $subjectRepository, PublisherRepository $publisherRepository)
    {
        $this->bookRepository = $bookRepository;
        $this->entityManager = $entityManager;
        $this->subjectRepository = $subjectRepository;
        $this->publisherRepository = $publisherRepository;
    }

    #[Route('/book', name: 'app_book')]
    public function index(): Response
    {
        return $this->render('book/index.html.twig', [
            'controller_name' => 'BookController',
        ]);
    }

    #[Route('/getBookNames', name: 'getBookNames')]
    public function getBookNames(): Response
    {
        $books = $this->bookRepository->findAll();
        $response = [];
        foreach ($books as $book) {
            $response[] = [
                'id' => $book->getId(),
                'name' => $book->getShorttitle() . ' | BNR: ' . $book->getBnr(),
                'code' => $book->getShorttitle(). ' | BNR: ' . $book->getBnr(),
            ];
        }
        return $this->json($response);
    }

    #[Route('/getBooksOverview', name: 'getBooksOverview')]
    public function  getBooksOverview(): Response
    {
        $books = $this->bookRepository->findAll();
        $response = [];
        foreach ($books as $book) {
            $subject = $this->subjectRepository->find($book->getSubject());
            $publisher = $this->publisherRepository->find($book->getPublisher());
            $response[] = [
                'id' => $book->getId(),
                'bnr' => $book->getBnr(),
                'subject' => $subject->getFullname(),
                'publisher' => $publisher->getName(),
                'title' => $book->getTitle(),
                'price' => $book->getBookprice(),
                'ebook' => ($book->getEbook() == 1),
                'ebookplus' => ($book->getEbookplus() == 1),
            ];
        }
        return $this->json($response);
    }

}
