<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Acts;
use Symfony\Component\HttpFoundation\Request;

class DoctorController extends AbstractController
{
    /**
     * @Route("/home/acts", name="doctor_acts")
     */
    public function getActs(Request $request, EntityManagerInterface $em): Response {
        $db = $em->getRepository(Acts::class);
        $acts = $db->getDoctorUnifinishedActs($this->getUser()->getId());
        // echo $request->headers->get("referer");
        return $this->render("main/doctor/search.html.twig", [
            'acts' => $acts,
        ]);
    }
}
