<?php

namespace App\Controller;

use Psr\Cache\CacheItemInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\Cache\CacheInterface;

class InfoController extends AbstractController{

    #[Route('/',name:"home")]
    public function home(){
        return $this->render('home.html.twig');
    }

    #[Route('/jefes',name:'jefes')]
    public function jefes(){
        $bosses = array(
            array(
                "name" => "Ornstein and Smough",
                "description" => "Dos jefes que luchan juntos en la Sala de la Guardia Real en Anor Londo. Ornstein es rápido y ágil, mientras que Smough es lento pero fuerte. Derrotar a uno de ellos hace que el otro se fortalezca.",
                "image"=>"https://static1.thegamerimages.com/wordpress/wp-content/uploads/2022/02/Screenshot-(23)_ccexpress-(1).jpeg?q=50&fit=contain&w=1140&h=570&dpr=1.5"
            ),
            array(
                "name" => "Gwyndolin, the Dark Sun",
                "description" => "Un jefe opcional que reside en la Catedral Oscura en Anor Londo. Es un mago que usa ataques de largo alcance.",
                "image"=>"https://media.vandal.net/master/5-2018/201857163531_1.jpg"
            ),
            array(
                "name" => "Priscilla, the Crossbreed",
                "description" => "Otra jefa opcional que está encarcelada en el Pintado de Ariamis. Es una luchadora hábil con habilidades de camuflaje.",
                "image"=>"https://oyster.ignimgs.com/mediawiki/apis.ign.com/dark-souls/1/12/20160324191319_1.jpg"
            ),
            array(
                "name" => "Seath the Scaleless",
                "description" => "Un dragón sin escamas que reside en las Cámaras del Cristal en las Profundidades. Es vulnerable a ciertos tipos de daño y estrategias específicas.",
                "image"=>"https://static0.gamerantimages.com/wordpress/wp-content/uploads/2022/08/dark-souls-seath-the-scaleless.jpg"
            ),
            array(
                "name" => "Four Kings",
                "description" => "Cuatro reyes que residen en el Abismo después de derrotar a Sif, el Gran Lobo Gris. Es una batalla cronometrada donde debes derrotar a cada rey antes de que aparezca el siguiente.",
                "image"=>"https://darksouls.wiki.fextralife.com/file/Dark-Souls/four_kings_skewer.jpg?v=1528304785289"
            ),
            array(
                "name" => "Gravelord Nito",
                "description" => "El señor de los muertos que reside en el Cementerio de los Gigantes. Es acompañado por varios esqueletos.",
                "image"=>"https://i.ytimg.com/vi/JrClUJyHY-o/maxresdefault.jpg"
            ),
            array(
                "name" => "Bed of Chaos",
                "description" => "Una criatura que reside en las Ruinas de Izalith. Es un jefe con mecánicas únicas que requiere destreza y paciencia para derrotar.",
                "image"=>"https://darksouls.wiki.fextralife.com/file/Dark-Souls/bed_of_chaos_close_up.jpg?v=1528746195863"
            ),
            array(
                "name" => "Gwyn, Lord of Cinder",
                "description" => "El último jefe del juego que reside en el Kiln of the First Flame. Es un guerrero formidable con ataques rápidos y poderosos.",
                "image"=>"https://darksouls.wiki.fextralife.com/file/Dark-Souls/Boss_0024_Gwyn%20Lord%20of%20Cinder.jpg"
            )
        );

        return $this->render('jefes.html.twig',[
            "jefes"=>$bosses
        ]);

    }

    #[Route('/armas',name:"armas")]
    public function mejoresArmas(HttpClientInterface $httpClient){
        $armasDarkSouls = [
            [
                "nombre" => "Claymore",
                "descripcion" => "Una espada bastarda versátil que ofrece un buen equilibrio entre daño y velocidad. Tiene un rango decente y puede realizar ataques amplios. Se puede encontrar en el puente donde se encuentra el Dragón Rojo.",
                "imagen_url" => "https://i.ytimg.com/vi/hqVckUmLj5s/maxresdefault.jpg"
            ],
            [
                "nombre" => "Great Scythe",
                "descripcion" => "Una guadaña de gran alcance que inflige daño a distancia. Tiene movimientos rápidos y una capacidad de maniobra decente. Se puede obtener al derrotar al Nigromante Pinwheel en la Catacumba.",
                "imagen_url" => "https://staticdelivery.nexusmods.com/mods/162/images/thumbnails/404-1-1369058636.png"
            ],
            [
                "nombre" => "Quelaag's Furysword",
                "descripcion" => "Esta espada curva única escala con la estadística de Humanidad y puede infligir daño de fuego adicional. Se puede crear utilizando la espada recta de Quelaag y la daga Curved Sword al forjarlas juntas.",
                "imagen_url" => "https://i.ytimg.com/vi/bX69HumWaS8/maxresdefault.jpg"
            ],
            [
                "nombre" => "Greatsword of Artorias",
                "descripcion" => "Una gran espada creada a partir de la combinación de la Espada Rota de Straight y el Alma de Sif. Tiene un gran daño y escalas con múltiples estadísticas.",
                "imagen_url" => "https://staticdelivery.nexusmods.com/mods/162/images/thumbnails/304-3-1364559465.jpg"
            ],
            [
                "nombre" => "Gravelord Sword",
                "descripcion" => "Una gran espada única creada al obtener la Espada de Nito de Gravelord Nito. Tiene una gran alcance y puede infligir toxicidad a los enemigos.",
                "imagen_url" => "https://i.ytimg.com/vi/t6W5OkPH2xY/maxresdefault.jpg"
            ]
        ];
        return $this->render("armas.html.twig",[
            "armas"=>$armasDarkSouls
        ]);    
    }

    #[Route('/sponsors',name:"sponsors")]
    public function verSponsors(HttpClientInterface $httpClient,CacheInterface $cache){
        $productos=$cache->get('productos_sponsor',function(CacheItemInterface $cacheItem) use($httpClient){
            $cacheItem->expiresAfter(10);
            $response=$httpClient->request('GET','https://dummyjson.com/products');
            return $response->toArray()['products'];
        });
        //dd($productos);
        return $this->render("productos.html.twig",[
            'productos'=>$productos
        ]);
    }
}