<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use Symfony\Component\Serializer\Context\Normalizer\ObjectNormalizerContextBuilder;


class ArticlesController extends AbstractController
{
    #[Route(path: '/articles', name: 'articles', methods: ['GET'])]
    public function list(Request $request, EntityManagerInterface $registry, ArticleRepository $articlerepository): Response
    //public function list(): Response
    {

        $file = 'test.txt';
        try {


            // Create a context object for the ObjectNormalizer that specifies the serialization groups to use
            $context = (new ObjectNormalizerContextBuilder())
                ->withGroups("articles")
                ->toArray();
            // Get the BookOrder entity with the given book id from the database


            $articles = $registry->getRepository(Article::class)->findAll();
        } catch (\Exception $e) {

            return new Response($e);
        }

        $response = array("articles"=>$articles);
        return new Response(json_encode($response));

        //return $this->json($articles, status: Response::HTTP_OK, context: $context);

//        json(
    }

    #[Route(path: '/article/{id}', name: 'articlesById', methods: ['GET'])]
    public function listById(string $id): Response
    {
        return new Response('Artikel ' + $id + '.');
    }
}
