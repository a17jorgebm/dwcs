<?php

namespace App\Controller;

use Psr\Cache\CacheItemInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\Cache\CacheInterface;

class PetsController extends AbstractController{
    #[Route('/pets',name:"home")]
    public function home(HttpClientInterface $httpClient){
        $productos=$httpClient->request('GET','https://dummyjson.com/products')->toArray()['products'];
        return $this->render("productos.html.twig",[
            'productos'=>$productos
        ]);
    }

    #[Route('/petscache',name:"homeCache")]
    public function homeCache(HttpClientInterface $httpClient,CacheInterface $cache){
        $productos=$cache->get('pets_cache',function(CacheItemInterface $cacheItem) use($httpClient){
            $cacheItem->expiresAfter(2);
            $response=$httpClient->request('GET','https://dummyjson.com/products');
            return $response->toArray()['products'];
        });
        return $this->render("productos.html.twig",[
            'productos'=>$productos
        ]);
    }
}
