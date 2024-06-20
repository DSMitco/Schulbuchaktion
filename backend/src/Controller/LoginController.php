<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Service\AuthService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\AuthenticationException;

#[Route('/authenticate', name: 'authenticate')]
    class LoginController extends AbstractController
    {
        #[Route('/login', name: 'login')]
        public function loginUser(Request $request, AuthService $authService, UserPasswordHasherInterface $passwordHasher, UserRepository $userRepository): JsonResponse
        {
        $data = json_decode($request->getContent(), true);

        $email = $data['email'] ?? null;
        $password = $data['password'] ?? null;

        if (empty($email) || empty($password)) {
            return new JsonResponse(['error' => 'Email and password are required'], Response::HTTP_BAD_REQUEST);
        }

        $user = $userRepository->loadUserByIdentifier($email);

        if (!$user || !$passwordHasher->isPasswordValid($user, $password)) {
            return new JsonResponse(['error' => 'Invalid login credentials'], Response::HTTP_UNAUTHORIZED);
        }

        try {
            $token = $authService->authenticateByAuthorizationHeader($user);
        } catch (AuthenticationException $e) {
            return new JsonResponse(['error' => $e->getMessage()], Response::HTTP_UNAUTHORIZED);
        }

        return new JsonResponse(['token' => $token]);
    }

    #[Route('/register', name: 'register')]
    public function registerUser(Request $request, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $email = $data['email'] ?? null;
        $password = $data['password'] ?? null;
        $passwordConfirm = $data['passwordconfirm'] ?? null;

        if (empty($email) || empty($password) || empty($passwordConfirm)) {
            return new JsonResponse(['error' => 'All fields are required'], Response::HTTP_BAD_REQUEST);
        }

        if ($password !== $passwordConfirm) {
            return new JsonResponse(['error' => 'Passwords do not match'], Response::HTTP_BAD_REQUEST);
        }

        $existingUser = $entityManager->getRepository(User::class)->findOneBy(['email' => $email]);
        if ($existingUser) {
            return new JsonResponse(['error' => 'Email already registered'], Response::HTTP_CONFLICT);
        }

        $user = new User();
        $user->setEmail($email);
        $user->setPassword($passwordHasher->hashPassword($user, $password));

        preg_match('/^([a-zA-Z0-9._-]+)@/', $email, $matches);
        $shortname = $matches[1];
        $user->setShortname($shortname);
        $user->setToken("empty");

        $entityManager->persist($user);
        $entityManager->flush();

        return new JsonResponse(['success' => 'User registered successfully'], Response::HTTP_OK);
    }
}