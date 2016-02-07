<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Price;
use AppBundle\Entity\Good;
use Doctrine\ORM\Query\Expr;

class GoodsController extends Controller
{
    /**
     * @Route("/goods/")
     */
	
	public function indexAction()
	{					
		$em = $this->getDoctrine()->getManager();
        $goods = $em->createQueryBuilder()
        ->select("g.id","g.title","p.price", "photo.basename")
        ->from("AppBundle:Good", 'g')
		->leftJoin('AppBundle:Price', 'p', Expr\Join::WITH, 'p.good_id = g.id')
        ->leftJoin('AppBundle:Photo', 'photo', Expr\Join::WITH, 'photo.good_id = g.id')
		->where("p.price_type_id = :price_type_id")
        ->setParameter("price_type_id", '1')
        ->getQuery()
		->getResult();
		
		foreach($goods AS $good)
		{
			$goodList[$good['id']]['title'] = $good['title'];
			$goodList[$good['id']]['price'] = $good['price'];
			$goodList[$good['id']]['photo'][] = $good['basename'];
		}
		
		return $this->render(
			'good/index.html.twig',
			array('goodList' => $goodList)
		);
	}
	
	/**
     * @Route("/goods/list")
     */
	
	public function listAction()
	{
		$em = $this->getDoctrine()->getManager();
        $goodList = $em->createQueryBuilder()
        ->select("g")
        ->from("AppBundle:Good", 'g')
        ->from("AppBundle:Price", 'p')
		->where("p.good_id = g.id")
        ->andWhere("p.price_type_id = :price_type_id")
        ->setParameter("price_type_id", '1')
        ->getQuery()
		->getResult();
		
		return $this->render(
			'good/list.html.twig',
			array('goodList' => $goodList)
		);
	}
}
