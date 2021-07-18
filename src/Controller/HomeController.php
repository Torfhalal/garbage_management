<?php

namespace App\Controller;

use App\Entity\Garbage;
use App\Form\GarbageType;
use App\Repository\GarbageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    /**
     * @var GarbageRepository
     */
    private $garbage;

    public function __construct(GarbageRepository $garbage)
    {
        $this->garbage = $garbage;
    }


    /**
     * @Route("/",name="home")
     * @return Response
     */

    public function index(Request $request): Response
    {

        $entityManager = $this->getDoctrine()->getManager();

        $repository = $entityManager->getRepository('App:garbage');
        $lastSubmit = $repository->findOneBy ([], ['reference' => 'desc']);
        $lastReference = $lastSubmit->getReference();

        $garbage = new Garbage();
        $form = $this->createForm(GarbageType::class, $garbage);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $garbage->setReference($lastReference+1);
            $garbage->setCreation(new \DateTime('now'));
            $entityManager->persist($garbage);
            $entityManager->flush();
            return $this->redirect($request->getUri());
        }

        $queries = $repository->findAll();
        return $this->render('pages/home.html.twig', [
            'queries'=> $queries,
            'form'=> $form->createView()
        ]);
    }


    /**
     * @Route("/dowload",name="garbage_download")
     */

    public function download()
    {
        return $this->render('pages/garbage_download.html.twig');
    }

}