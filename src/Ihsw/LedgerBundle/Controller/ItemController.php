<?php

namespace Ihsw\LedgerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Ihsw\LedgerBundle\Entity\Item;

class ItemController extends Controller
{
    public function indexAction()
    {
        sleep(1);

        // services
        $request = $this->get('request');
        $doctrine = $this->get('doctrine');

        // repositories
        $em = $doctrine->getManager();
        $itemRepository = $em->getRepository('IhswLedgerBundle:Item');

        // fetching items
        $items = $itemRepository->findAll();
        $keys = array_map(function($item){
            return $item->getId();
        }, $items);
        $items = array_combine($keys, $items);

        return new JsonResponse($items);
    }

    public function createAction()
    {
        sleep(1);

        // services
        $request = $this->get('request');
        $doctrine = $this->get('doctrine');

        // repositories
        $em = $doctrine->getManager();
        $itemRepository = $em->getRepository('IhswLedgerBundle:Item');

        // inserting the item
        $content = json_decode($request->getContent(), true);
        $item = new Item();
        $item->setName($content['name']);
        $em->persist($item);
        $em->flush();

        return new JsonResponse($item);
    }

    /**
     * @ParamConverter("item")
     */
    public function destroyAction($item)
    {
        sleep(1);

        // services
        $request = $this->get('request');
        $doctrine = $this->get('doctrine');

        // repositories
        $em = $doctrine->getManager();
        $itemRepository = $em->getRepository('IhswLedgerBundle:Item');

        // deleting the item
        $em->remove($item);
        $em->flush();

        return new Response();
    }
}