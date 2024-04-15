<?php

namespace App\Controller;

use App\Entity\Book;
use App\Entity\Bookorder;
use App\Entity\Department;
use App\Entity\Publisher;
use App\Entity\Schoolgrade;
use App\Entity\Subject;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use PhpOffice\PhpSpreadsheet\IOFactory;

//require '../../vendor/autoload.php';

#[Route('/readExcel', name: 'readExcel.')]
class ReadCSVController extends AbstractController
{
    #[Route('/doRead', name: 'doRead')]
    public function index(EntityManagerInterface $em): Response
    {
        $filePath = "Schulbuchliste_4100_2024_2025.xlsx";

        // Lesen Sie die .xlsx-Datei
        $spreadsheet = IOFactory::load($filePath);

        // Zugriff auf das erste Arbeitsblatt
        $worksheet1 = $spreadsheet->getSheet(0);

        // Durchlaufen Sie die Zeilen des ersten Arbeitsblatts
        foreach ($worksheet1->getRowIterator() as $row) {
            // Zugriff auf die Zellen einer Zeile
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(FALSE); // Alle Zellen, auch leere, durchlaufen

            $data = [];
            foreach ($cellIterator as $cell) {
                $data[] = $cell->getValue();
            }

            if ($data[0] == 'BNR') {
                continue;
            }

            $book = $em->getRepository(Book::class)->findOneBy(['bnr' => $data[0]]);
            //Update the price if the book already exists
            if (!$book == null) {
                $book->setPrice((float)$data[12]);
            } else {
                //Create a new book if it does not exist
                $book = new Book();

                $book->setBnr((int)$data[0]);
                $book->setShorttitle($data[1]);
                $book->setTitle($data[2]);
                $book->setListtype((int)$data[3]);
                $book->setSchoolform((int)$data[4]);

                //@TODO: Create a new Subject and Schoolgrade if needed
                $subject = $em->getRepository(Subject::class)->findByFullName(['name' => $data[5]]);
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
                    $grade = $em->getRepository(Schoolgrade::class)->findByGrade(['grade' => $gradeValue]);
                    //Create a new grade if it does not exist
                    if ($grade === null) {
                        $grade = new Schoolgrade();
                        $grade->setGrade($gradeValue);
                        $em->persist($grade);
                    }
                    $book->addGrade($grade);
                    $grade->addBook($book);
                }

                if ($data[7] == null){
                    $book->setTeacherversion(false);
                } else {
                    $book->setTeacherversion(true);
                }

                $book->setInfo($data[8]);

                $vnr = (int)$data[9];

                $publisher = $em->getRepository(Publisher::class)->findByVnr(['vnr' => $vnr]);
                //Create a new publisher if it does not exist
                if ($publisher == null) {
                    $publisher = new Publisher();
                    $publisher->setVnr($vnr);
                    $publisher->setName($data[10]);
                    $em->persist($publisher);
                }

                $book->setPublisher($publisher);
                $book->setMainbookid($data[11]);
                $book->setBookprice((float)$data[12]);
                if ($data[15] == null){
                    $book->setEbook(false);
                } else {
                    $book->setEbook(true);
                }

                if ($data[16] == null){
                    $book->setEbookplus(false);
                } else {
                    $book->setEbookplus(true);
                }

                // Persist the new Book entity
            }
            $em->persist($book);
            $em->flush(); // Save all changes to the database
        }

        return new Response('Data successfully written to the database');

    }
}
