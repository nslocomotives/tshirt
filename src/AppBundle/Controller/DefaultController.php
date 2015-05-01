<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Subscriber\Log\LogSubscriber;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/app/example", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }
	
	/**
	* @Route("/app/apitest", name="api_test")
	*/
	public function apiAction()
	{
        #$restClient = $this->container->get('ci.restclient');

		#$all_products[] = array($restClient->get(' https://api.theprintful.com/products' array(CURLOPT_HTTPHEADER => 'Authorization: Basic awadc882-62it-ntz6:x29q-30oxgdxkco4k')));
	
		$client   = $this->get('guzzle.client');
		$response = $client->get('/products');
		$json = $response->json();
	
    	return $this->render('default/apitest.html.twig',  array(
		'results' => $json['result'],
		));
	}

}
