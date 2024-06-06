<?php

namespace App\Controller;

use App\Entity\Book;
use App\Entity\Bookorder;
use App\Entity\Publisher;
use App\Entity\Schoolclass;
use App\Entity\Schoolgrade;
use App\Entity\Subject;
use App\Repository\BookRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use PhpOffice\PhpSpreadsheet\IOFactory;


use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Serializer\Context\Normalizer\ObjectNormalizerContextBuilder;

class BookOrderController extends AbstractController
{
    #[Route('order', name: 'order')]
    public function index(Request $request, EntityManagerInterface $em, BookRepository $br): Response
    {
        //$classId= $request->get('classId');
        $classId = 1;
        //$bookIds = $request->get('bookIds');
        $bookId = 1;
        $rep = "ja";
        $ebook = true;
        $ebookplus = false;
        $teacherCopy = false;

        $book = $em->getRepository(Book::class)->find($bookId);

        $class = $em->getRepository(Schoolclass::class)->find($classId);

        $bo = new BookOrder();

        $bo->setBook($book);
        $bo->setSchoolclass($class);

        if ($rep == "only") {
            $bo->setCount($class->getRepamount());
        } else if ($rep == "no") {
            $bo->setCount($class->getStudentsamount());
        } else {
            $bo->setCount($class->getStudentsamount() + $class->getRepamount());
        }

        $bo->setEbook($ebook);
        $bo->setEbookplus($ebookplus);
        $bo->setTeacherCopy($teacherCopy);

        $em->persist($bo);
        $em->flush();

        return new Response('Books ordered successfully');
    }

    #[Route('addBook/{bnr}', name: 'addBook')]
    public function addBook($bnr, EntityManagerInterface $em): Response
    {
        $book = $em->getRepository(Book::class)->findOneBy(['bnr' => $bnr]);

        $bo = new BookOrder();
        $bo->setBook($book);

        //Gets the current schoolyear
        $currentYear = date("Y");
        //Gets the next year
        $nextYear = (int)$currentYear + 1;
        //Gets the last two digits of the next year
        $nextYearShort = substr($nextYear, 2);
        //Combines the current year and the next year to create a string
        $yearString = $currentYear . '/' . $nextYearShort;

        $bo->setSchoolyear($yearString);

        $em->persist($bo);
        $em->flush();

        return new Response('Added Book to order');
    }

    #[Route('getBookOrders', name: 'getBooksOrders')]
    public function getBookOrders(EntityManagerInterface $em): Response
    {
        $bookOrders = $em->getRepository(BookOrder::class)->findAll();

        $response = [];
        foreach ($bookOrders as $bookOrder) {
            $response[] = [
                'id' => $bookOrder->getId(),
                'Buchbezeichnung' => $bookOrder->getBook()->getTitle(),
                'Jahr' => $bookOrder->getSchoolyear(),
            ];
        }
        return $this->json($response);
    }
}
