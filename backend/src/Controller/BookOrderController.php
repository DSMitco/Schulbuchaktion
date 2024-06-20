<?php

namespace App\Controller;

use App\Entity\Book;
use App\Entity\Bookorder;
use App\Entity\Department;
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
    #[Route('order/{id}/{classname}/{rep}', name: 'order')]
    public function index(Request $request, EntityManagerInterface $em, BookRepository $br, $id, $classname, $rep): Response
    {
        $bo = $em->getRepository(Bookorder::class)->findOneBy(['id' => $id]);

        $class = $em->getRepository(Schoolclass::class)->findOneBy(['name' => $classname]);

        $bo->setSchoolclass($class);

        if ($rep == "only") {
            $bo->setCount($class->getRepamount());
        } else if ($rep == "no") {
            $bo->setCount($class->getStudentsamount());
        } else {
            $bo->setCount($class->getStudentsamount() + $class->getRepamount());
        }

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

    #[Route('deleteBook/{bnr}', name: 'deleteBook')]
    public function deleteBook($bnr, EntityManagerInterface $em): Response
    {
        $book = $em->getRepository(Bookorder::class)->find($bnr);
        $em->remove($book);
        $em->flush();

        return new Response('Deleted Book to order');
    }

    #[Route('getBookOrders', name: 'getBooksOrders')]
    public function getBookOrders(EntityManagerInterface $em): Response
    {
        $bookOrders = $em->getRepository(BookOrder::class)->findAll();

        $response = [];
        foreach ($bookOrders as $bookOrder) {
            if($bookOrder->getBook()->getEbook() == 1){
                $ebook = true;
            }else{
                $ebook = false;
            }

            if($bookOrder->getBook()->getEbookplus() == 1){
                $ebookplus = true;
            }else{
                $ebookplus = false;
            }
            $response[] = [
                'id' => $bookOrder->getId(),
                'Buchbezeichnung' => $bookOrder->getBook()->getTitle(),
                'Jahr' => $bookOrder->getSchoolyear(),
                'EBook' => $ebook,
                'EBookPlus' => $ebookplus,
            ];
        }
        return $this->json($response);
    }

    #[Route('getOrderOverview', name: 'getOrderOverview')]
    public function getOrderOverview(EntityManagerInterface $em): Response
    {
        $departments = $em->getRepository(Department::class)->findAll();

        $response = [];
        foreach ($departments as $dep) {
            $price = 0.0;
            $price += $dep->getUsedbudget();
            foreach ($dep->getSchoolclasses() as $class) {
                foreach ($class->getBookorders() as $order) {
                    $price += $order->getBook()->getBookprice() * $order->getCount();
                }
            }

            $response[] = [
                'gesamtbudget' => number_format($dep->getBudget() / 100, 2),
                'preis' => number_format($price / 100, 2),
                'abteilung' => $dep->getName(),
                'prozent' => number_format(($price / $dep->getBudget()) * 100, 2),
            ];

        }
        return $this->json($response);
    }

}
