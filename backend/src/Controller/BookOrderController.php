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
}
