<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(UserRepository $userRepository): Response
    {
        if (!$this->getUser()) return $this->redirectToRoute('app_login');

        $user = $userRepository->findOneBy(['username' => $this->getUser()->getUserIdentifier()]);

        return $this->render('dashboard/index.html.twig', [
            'user' => $user,
            'accounts' => $user->getAccounts(),
        ]);
    }
}
