<?php

namespace App\Controller;

use App\Entity\Node;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ServerController extends AbstractController
{
    /**
     * @Route("/server", name="app_server")
     */
    public function index()
    {
        $user = $this->getUser();
        $nodes = $this->getDoctrine()->getRepository(Node::class)->findBy([
            'user'=>$user
        ]);

        return $this->render('server/index.html.twig', [
            'controller_name' => 'ServerController',
            'nodes' => $nodes
        ]);
    }

    /**
     * @Route("/server/view/{id}", name="app_server_view")
     */
    public function view($id)
    {
        $user = $this->getUser();
        $node = $this->getDoctrine()->getRepository(Node::class)->findBy([
            'user'=>$user,
            'id'=>$id
        ]);

        return $this->render('server/index.html.twig', [
            'controller_name' => 'ServerController',
            'nodes' => $node
        ]);
    }
}
