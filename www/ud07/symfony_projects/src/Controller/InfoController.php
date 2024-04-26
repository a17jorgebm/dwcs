<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InfoController extends AbstractController{

    #[Route('/',name:"home")]
    public function home(){
        return $this->render('home.html.twig');
    }

    #[Route('/jefes',name:'jefes')]
    public function jefes(){
        $bosses = array(
            array(
                "name" => "Iron Golem",
                "description" => "Un golem de hierro que defiende la entrada a Anor Londo en la Fortaleza de Sen. Es un enemigo lento pero poderoso.",
                "image"=>"images\bosses\iron-golem.PNG"
            ),
            array(
                "name" => "Ornstein and Smough",
                "description" => "Dos jefes que luchan juntos en la Sala de la Guardia Real en Anor Londo. Ornstein es rápido y ágil, mientras que Smough es lento pero fuerte. Derrotar a uno de ellos hace que el otro se fortalezca.",
                "image"=>"images\bosses\ornstein-smougth.PNG"
            ),
            array(
                "name" => "Gwyndolin, the Dark Sun",
                "description" => "Un jefe opcional que reside en la Catedral Oscura en Anor Londo. Es un mago que usa ataques de largo alcance.",
                "image"=>"images\bosses\windolin.jpg"
            ),
            array(
                "name" => "Priscilla, the Crossbreed",
                "description" => "Otra jefa opcional que está encarcelada en el Pintado de Ariamis. Es una luchadora hábil con habilidades de camuflaje.",
                "image"=>"images\bosses\priscilla.PNG"
            ),
            array(
                "name" => "Seath the Scaleless",
                "description" => "Un dragón sin escamas que reside en las Cámaras del Cristal en las Profundidades. Es vulnerable a ciertos tipos de daño y estrategias específicas.",
                "image"=>"images\bosses\seath.PNG"
            ),
            array(
                "name" => "Four Kings",
                "description" => "Cuatro reyes que residen en el Abismo después de derrotar a Sif, el Gran Lobo Gris. Es una batalla cronometrada donde debes derrotar a cada rey antes de que aparezca el siguiente.",
                "image"=>"images\bosses/four-kings.PNG"
            ),
            array(
                "name" => "Gravelord Nito",
                "description" => "El señor de los muertos que reside en el Cementerio de los Gigantes. Es acompañado por varios esqueletos.",
                "image"=>"images/bosses/nito.PNG"
            ),
            array(
                "name" => "Bed of Chaos",
                "description" => "Una criatura que reside en las Ruinas de Izalith. Es un jefe con mecánicas únicas que requiere destreza y paciencia para derrotar.",
                "image"=>"images\bosses\bed-of-chaos.PNG"
            ),
            array(
                "name" => "Gwyn, Lord of Cinder",
                "description" => "El último jefe del juego que reside en el Kiln of the First Flame. Es un guerrero formidable con ataques rápidos y poderosos.",
                "image"=>"images\bosses\gwin.PNG"
            )
        );

        return $this->render('jefes.html.twig',[
            "jefes"=>$bosses
        ]);

    }

    #[Route('/armas',name:"armas")]
    public function mejoresArmas(){
        $armasDarkSouls = [
            [
                "nombre" => "Espada recta Balder",
                "descripcion" => "Esta espada recta tiene un alto potencial de daño y una velocidad de ataque rápida. Se puede obtener como una gota rara de los Caballeros Balder en el Undead Parish.",
                "imagen_url" => "images/armas/balder.PNG"
            ],
            [
                "nombre" => "Claymore",
                "descripcion" => "Una espada bastarda versátil que ofrece un buen equilibrio entre daño y velocidad. Tiene un rango decente y puede realizar ataques amplios. Se puede encontrar en el puente donde se encuentra el Dragón Rojo.",
                "imagen_url" => "images/armas/claymore.PNG"
            ],
            [
                "nombre" => "Great Scythe",
                "descripcion" => "Una guadaña de gran alcance que inflige daño a distancia. Tiene movimientos rápidos y una capacidad de maniobra decente. Se puede obtener al derrotar al Nigromante Pinwheel en la Catacumba.",
                "imagen_url" => "images/armas/scythe.PNG"
            ],
            [
                "nombre" => "Uchigatana",
                "descripcion" => "Una katana de alta velocidad con un gran alcance y una habilidad de movimientos rápidos. Se puede obtener al matar al Mercader Shiva o al encontrarla en el Cementerio de los Gigantes.",
                "imagen_url" => "images/armas/uchigatana.PNG"
            ],
            [
                "nombre" => "Zweihander",
                "descripcion" => "Una espada ultra grande con un alcance masivo y un poderoso golpe. Tiene una tasa de ataque lenta pero inflige un gran daño. Se puede encontrar cerca del Cementerio de los Gigantes.",
                "imagen_url" => "images/armas/Zweihander.PNG"
            ],
            [
                "nombre" => "Quelaag's Furysword",
                "descripcion" => "Esta espada curva única escala con la estadística de Humanidad y puede infligir daño de fuego adicional. Se puede crear utilizando la espada recta de Quelaag y la daga Curved Sword al forjarlas juntas.",
                "imagen_url" => "images/armas/Quelaag's Furysword.PNG"
            ],
            [
                "nombre" => "Black Knight Halberd",
                "descripcion" => "Una halberd excepcionalmente poderosa que se puede obtener como una gota rara de los Black Knights en varias ubicaciones del juego. Tiene un gran daño y un alcance largo.",
                "imagen_url" => "images/armas/Black Knight Halberd.PNG"
            ],
            [
                "nombre" => "Black Knight Sword",
                "descripcion" => "Otra arma obtenida como una gota rara de los Black Knights. Tiene un poderoso ataque y una buena estabilidad, haciéndola efectiva en combate cuerpo a cuerpo.",
                "imagen_url" => "images/armas/Black Knight Sword.PNG"
            ],
            [
                "nombre" => "Greatsword of Artorias",
                "descripcion" => "Una gran espada creada a partir de la combinación de la Espada Rota de Straight y el Alma de Sif. Tiene un gran daño y escalas con múltiples estadísticas.",
                "imagen_url" => "images/armas/Greatsword of Artorias.PNG"
            ],
            [
                "nombre" => "Gravelord Sword",
                "descripcion" => "Una gran espada única creada al obtener la Espada de Nito de Gravelord Nito. Tiene una gran alcance y puede infligir toxicidad a los enemigos.",
                "imagen_url" => "images/armas/Gravelord Sword.jpg"
            ]
        ];
        return $this->render("armas.html.twig",[
            "armas"=>$armasDarkSouls
        ]);    
    }
}