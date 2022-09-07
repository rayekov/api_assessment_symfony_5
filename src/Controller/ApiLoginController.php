<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiLoginController extends AbstractController
{
    #[Route('/api/login', name: 'api_login')]

    public function index(#[CurrentUser] ?User $user): Response
    {
        $this->getUser()->setEmail("test@gmail.com");
         if (null === $user) {
             return $this->json([
                 'message' => 'missing or invalid credentials',
             ], Response::HTTP_UNAUTHORIZED);
         }

         $token = ""; //  we will generate an API token for $user
                return $this->json([ 
                    'user'  => $user->getUserIdentifier(),
                    'token' => $token,
                ]);
            }
}
