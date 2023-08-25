<?php

namespace App\Controller;

use App\Entity\Message;
use App\Repository\MessageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MessageController extends AbstractController
{
    private EntityManagerInterface $entityManager; // Déclarez la dépendance

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager; // Injectez l'EntityManager dans le constructeur
    }

    #[Route('/', name: 'admin_messages_index')]
    public function index(): Response
    {
        $messages = $this->entityManager->getRepository(Message::class)->findAll();

        return $this->render('admin/message/index.html.twig', [
            'messages' => $messages,
        ]);
    }
    
    #[Route('/admin/messages', name: 'admin_messages')]
    public function listMessages(MessageRepository $messageRepository): Response
    {
        $messages = $messageRepository->findAll();

        return $this->render('admin/messages/list.html.twig', [
            'messages' => $messages,
        ]);
    }

    #[Route('/admin/messages/{id}', name: 'admin_message_show')]
    public function showMessage(Message $message): Response
    {
        return $this->render('admin/messages/show.html.twig', [
            'message' => $message,
        ]);
    }

    #[Route('/admin/messages/{id}/delete', name: 'admin_message_delete')]
    public function deleteMessage(Message $message): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($message);
        $entityManager->flush();

        $this->addFlash('success', 'Le message a été supprimé avec succès.');

        return $this->redirectToRoute('admin_messages');
    }
}
