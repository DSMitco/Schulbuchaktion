<?php

namespace App\Controller;

use App\Entity\Book;
use App\Entity\Publisher;
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

class ReadCSVController extends AbstractController {

    #[Route(path: '/list', name: 'list', methods: ['GET'])]
    public function list(Request $request, EntityManagerInterface $em, BookRepository $br): Response
    {

        try {
            $books = $em->getRepository(Book::class)->findAll();
        } catch (\Exception $e) {

            return new Response($e);
        }
        return new Response('Data successfully written to the database');
    }

    #[Route('/doRead', name: 'doRead')]
    public function index(Request $request, EntityManagerInterface $em, BookRepository $br): Response
    {
        $file = $request->files->get('file'); // get the file from the sent request

        if ($file == null) {
            //return new Response('No file was uploaded');
            $file = 'Schulbuchliste_4100_2023_2024.xlsx';
        }

        $fileFolder = __DIR__ . '/../../public/uploads/';  //choose the folder in which the uploaded file will be stored

        $filePathName = md5(uniqid()) . '.' . $file->getClientOriginalExtension();

        try {
            $file->move($fileFolder, $filePathName);
        } catch (FileException $e) {
            return new Response('Error moving file: ' . $e->getMessage());
        }
        $filePath = $fileFolder . $filePathName;
        // Lesen Sie die .xlsx-Datei
        try {
            $spreadsheet = IOFactory::load($filePath);
        } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
            return new Response('Error loading file: ' . $e->getMessage());
        }

        // Zugriff auf das erste Arbeitsblatt
        $worksheet1 = $spreadsheet->getSheet(0);

        try {
            $books = $em->getRepository(Book::class)->findAll();
        } catch (\Exception $e) {

            return new Response($e);
        }

        // Durchlaufen Sie die Zeilen des ersten Arbeitsblatts
        foreach ($worksheet1->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(FALSE); // Alle Zellen, auch leere, durchlaufen

            $data = [];
            foreach ($cellIterator as $cell) {
                $data[] = $cell->getValue();
            }

            if ($data[0] == 'BNR') {
                continue;
            }

            $exist = false;

            foreach ($books as $tempBook) {
                if ($tempBook->getBnr() == $data[0]) {
                    $exist = true;
                    break;
                }
            }

            //Update the price if the book already exists
            if ($exist) {
                $book = $em->getRepository(Book::class)->findBookByBnr($data[0]);
                $book->setBookprice((float)$data[12]);
            } else {
                //Create a new book if it does not exist
                $book = new Book();

                $book->setBnr((int)$data[0]);
                $book->setShorttitle($data[1]);
                $book->setTitle($data[2]);
                $book->setListtype((int)$data[3]);
                $book->setSchoolform((int)$data[4]);

                //@TODO: Create a new Subject and Schoolgrade if needed
                $subject = $em->getRepository(Subject::class)->findByFullName([$data[5]]);
                //Create a new subject if it does not exist
                if ($subject == null) {
                    $subject = new Subject();
                    $subject->setFullname($data[5]);
                    $em->persist($subject);
                }
                $book->setSubject($subject);

                //Splitts the grades if there are multiple --> format of grade like 1=2=3 etc.
                $grades = explode('=', $data[6]);


                //Add the grades to the book
                foreach ($grades as $gradeValue) {
                    $grade = $em->getRepository(Schoolgrade::class)->findByGrade($gradeValue);
                    //Create a new grade if it does not exist
                    if (!$grade) {
                        $grade = new Schoolgrade();
                        $grade->setGrade($gradeValue);
                        $em->persist($grade);
                    }
                    $book->addGrade($grade);
                    $grade->addBook($book);
                }



                if ($data[7] == null) {
                    $book->setTeacherversion(false);
                } else {
                    $book->setTeacherversion(true);
                }

                $book->setInfo($data[8]);

                $vnr = (int)$data[9];

                $publisher = $em->getRepository(Publisher::class)->findByVnr([$vnr]);
                //Create a new publisher if it does not exist
                if ($publisher == null) {
                    $publisher = new Publisher();
                    $publisher->setVnr($vnr);
                    $publisher->setName($data[10]);
                    $em->persist($publisher);
                }

                $book->setPublisher($publisher);

                if ($data[11] == null) {
                    $book->setMainbookid(null);
                } else {
                    $book->setMainbookid($data[11]);
                }

                $book->setBookprice((float)$data[12]);
                if ($data[15] == null) {
                    $book->setEbook(false);
                } else {
                    $book->setEbook(true);
                }

                if ($data[16] == null) {
                    $book->setEbookplus(false);
                } else {
                    $book->setEbookplus(true);
                }

                // Persist the new Book entity
                $em->persist($book);
            }
        }
        $em->flush(); // Save all changes to the database
        // Die datei nach dem Bearbeiten löschen

        return new Response('Data successfully written to the database');
    }



}
