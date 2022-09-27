<?php

namespace App\Controller;

use App\Form\SmsType;
use App\Service\Notification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SmsController extends AbstractController
{
    /**
     * @Route("/sms", name="app_sms")
     */
    public function index(Request  $request, Notification $notification): Response
    {
        $form = $this->createForm(SmsType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $isSmsSended =$notification->sendSms($request->request->get('sms')['phone']);
            if ($isSmsSended){
                $this->addFlash('success','Sms envoyé avec succèes');
            }
        }

        return $this->render('sms/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
