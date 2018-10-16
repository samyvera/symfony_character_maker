<?php

namespace App\Controller;

use App\Repository\StatsModifierRepository;
use App\Repository\StatsRepository;
use App\Repository\UnitClassRepository;
use App\Repository\UnitRepository;
use App\Entity\Unit;
use App\Entity\UnitClass;
use App\Entity\Stats;

use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class MainController extends AbstractController
{
    /**
     * @Route("/main", name="main")
     */
    public function index(StatsModifierRepository $statModifRepo, StatsRepository $statRepo,
    UnitClassRepository $unitClassRepo, UnitRepository $unitRepo)
    {
        $viewData = [
            'units'=>$unitRepo->findAll(),
            'classes' => $unitClassRepo->findAll(),
            'stats' =>$statRepo->findAll(),
            'statsModif'=>$statModifRepo->findAll()
        ];

        return $this->render('main/index.html.twig', $viewData);
    }

    /**
     * @Route("/main/new", name="new")
     */
    public function form(ObjectManager $manager, Request $request)
    {
        $unit = new Unit();

        $form = $this->createFormBuilder($unit)
            ->add('name', TextType::class, array('attr' => array('maxlength' => 7,)))
            ->add('sex', ChoiceType::class, array(
                'choices' => array('Male' => true, 'Female' => false), 'expanded' => true))
            ->add('unitClass', EntityType::class, array(
                'class' => UnitClass::class, 'choice_label' => 'name'))
            ->add('create', SubmitType::class, array('label' => 'Create'))
            ->getForm();
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $unitStats = new Stats();
            $unitStats->setHealth(rand(15, 20));
            $unitStats->setAttack(rand(4, 8));
            $unitStats->setMagic(rand(2, 5));
            $unitStats->setDefense(rand(2, 5));
            $unitStats->setResistance(rand(0, 5));

            if($unit->getSex()) { $unit->setMugshot('img/mug01.png'); }
            else { $unit->setMugshot('img/mug02.png'); }
            $unit->setLevel('1');
            $unit->setStats($unitStats);
            $unitStats->setUnit($unit);

            $manager->persist($unitStats);
            $manager->persist($unit);
            $manager->flush();
            return $this->redirectToRoute('main');
        }

        return $this->render('main/new.html.twig', ['formUnit' => $form->createView()]);
    }

    /**
     * @Route("/{id}", name="chara")
     */
    public function chara($id, StatsModifierRepository $statModifRepo, StatsRepository $statRepo,
    UnitClassRepository $unitClassRepo, UnitRepository $unitRepo)
    {
        $viewData = [
            'units'=>$unitRepo->findById($id),
            'classes' => $unitClassRepo->findAll(),
            'stats' =>$statRepo->findAll(),
            'statsModif'=>$statModifRepo->findAll()
        ];

        return $this->render('main/chara.html.twig', $viewData);
    }
}
