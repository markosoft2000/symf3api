<?php

namespace Acme\ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LibraryController extends FOSRestController
{
    public function getHelloAction()
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }

        $user = $this->get('security.token_storage')->getToken()->getUser();
        $isAdmin = $user->hasRole('admin');

        $data = array("hello" => "there", "user" => $user->getUserName(), "isAdmin" => $isAdmin);
        $view = $this->view($data, Response::HTTP_OK);

        return $this->handleView($view); //return $this->json($data);
    }

    /**
     * @Rest\Post("/test")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function postTestAction(Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }

        $data = array("Request" => $request->get('id'));

        return $this->json($data, Response::HTTP_OK);
    }
}