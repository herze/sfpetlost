<?php
namespace Petlost\UsuarioBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Petlost\UsuarioBundle\Util\Util;
use Petlost\UsuarioBundle\Entity\Usuario;
use Petlost\UsuarioBundle\Entity\Zona;
use Petlost\FrontBundle\Entity\Mascota;
use Petlost\FrontBundle\Entity\Anuncio;
use Petlost\FrontBundle\Entity\Perdido;
use Petlost\CiudadBundle\Entity\Ciudad;
use Petlost\FrontBundle\Entity\Foto;
use Petlost\UsuarioBundle\Entity\Mensaje;

/**
 * Fixtures de la entidad Usuario.
 * Crea usuarios de prueba con información muy realista.
 */
class Usuarios extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

    public function getOrder()     {
        return 10;
    }

    private $container;

    public function setContainer(ContainerInterface $container = null)     {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)     {
        
        $ciudades= array('Cochabamba','Santa Cruz','La Paz','Oruro');
        
         $nombres = array('Adán', 'Adolfo', 'Agustin', 'Albert', 'Alberto', 'Alejandro',
                         'Andrés', 'Antonio', 'Ariel', 'Benjamin', 'Bernardo', 'Carles',
                         'Carlos', 'Cayetano', 'César', 'Cristian', 'Daniel', 'David',
                         'Diego', 'Dimas', 'Eduardo', 'Eneko', 'Esteban', 'Fernando',
                         'Francisco', 'Gonzalo', 'Gregorio', 'Guillermo', 'Haritz', 'Iago',
                         'Ignacio', 'Iker', 'Isaïes', 'Isis', 'Iván', 'Jacob', 'Javier',
                         'Joan', 'Jordi', 'Jorge', 'Jose', 'Juan', 'Kevin', 'Luis', 'Marc',
                         'Marta', 'Miguel', 'Moisés', 'Oriol', 'Oscar', 'Pablo', 'Pedro',
                         'Pereira', 'Rafael', 'Raúl', 'Rebeca', 'Rosa', 'Rubén', 'Salvador',
                         'Santiago', 'Sergio', 'Susana', 'Verónica', 'Vicente', 'Víctor',
                         'Victoria', 'Vidal','Val','Vilma','Violeta','Vladimir');
        //apellidos 66
        $apellidos = array('García', 'Fernández', 'González', 'Rodríguez', 'López', 'Martínez',
                           'Sánchez', 'Pérez', 'Martín', 'Gómez', 'Jiménez', 'Ruiz', 'Hernández',
                           'Díaz', 'Moreno', 'Álvarez', 'Muñoz', 'Romero', 'Alonso', 'Gutiérrez',
                           'Navarro', 'Torres', 'Domínguez', 'Vázquez', 'Gil', 'Ramos', 'Serrano',
                           'Blanco', 'Ramírez', 'Molina', 'Suárez', 'Ortega', 'Delgado', 'Morales',
                           'Castro', 'Rubio', 'Ortíz', 'Marín', 'Sanz', 'Iglesias', 'Núñez',
                           'Garrido', 'Cortés', 'Medina', 'Santos', 'Lozano', 'Cano', 'Castillo',
                           'Gerrero', 'Prieto','Zapata','Moral','Morelelo','Vega',
                            'Aguirre','Luna','Vargas','Bravo','Toledo','Soto',
                            'Arce','Dias','Reyes','Ramires','Sandoval','Alarcon',
                            'Padilla','Villa','Villegas','Rosas','Ortuño','Herbas');
        
        $mascotas=array(
            array('nombre'=>'Rex','categoria'=>'perro','raza'=>'pastor aleman','sexo'=>'macho','identificacion'=>'collar','enfermedad'=>'ninguno'),
            array('nombre'=>'Fido','categoria'=>'perro','raza'=>'boxer','sexo'=>'hembra','identificacion'=>'tatuaje','enfermedad'=>'ninguno'),
            array('nombre'=>'Asrael','categoria'=>'gato','raza'=>'siames','sexo'=>'macho','identificacion'=>'chip','enfermedad'=>'ninguno'),
            array('nombre'=>'Nana','categoria'=>'perro','raza'=>'san bernardo','sexo'=>'hembra','identificacion'=>'tatuaje','enfermedad'=>'ninguno'),
            array('nombre'=>'Iluminada','categoria'=>'gato','raza'=>'comun','sexo'=>'hembra','identificacion'=>'ninguno','enfermedad'=>'ninguno'),
            array('nombre'=>'Agata','categoria'=>'gato','raza'=>'angora','sexo'=>'hembra','identificacion'=>'collar','enfermedad'=>'ninguno'),
            array('nombre'=>'Auron','categoria'=>'gato','raza'=>'persa','sexo'=>'macho','identificacion'=>'chip','enfermedad'=>'ninguno'),
            array('nombre'=>'Nacho','categoria'=>'perro','raza'=>'dalmata','sexo'=>'macho','identificacion'=>'tatuaje','enfermedad'=>'ninguno'),
            array('nombre'=>'Astro','categoria'=>'perro','raza'=>'cocker','sexo'=>'macho','identificacion'=>'collar','enfermedad'=>'ninguno'),
            array('nombre'=>'Nena','categoria'=>'perro','raza'=>'pastor aleman','sexo'=>'hembra','identificacion'=>'ninguno','enfermedad'=>'ninguno'),
            array('nombre'=>'Gancho','categoria'=>'perro','raza'=>'pitbull','sexo'=>'macho','identificacion'=>'ninguno','enfermedad'=>'ninguno'),
            array('nombre'=>'Gemma','categoria'=>'gato','raza'=>'comun','sexo'=>'hembra','identificacion'=>'tatuaje','enfermedad'=>'ninguno'),
            array('nombre'=>'Onix','categoria'=>'perro','raza'=>'rotwaller','sexo'=>'macho','identificacion'=>'collar','enfermedad'=>'ninguno'),
        );
        $fotos=array(
            'petlost-01.jpg','petlost-02.jpg','petlost-03.jpg','petlost-04.jpg','petlost-05.jpg',
            'petlost-06.jpg','petlost-07.jpg','petlost-08.jpg','petlost-09.jpg','petlost-10.jpg',
            'petlost-11.jpg','petlost-12.jpg','petlost-13.jpg','petlost-14.jpg'
        );
        
        $zonas=array(
            array('latitud'=>'-17.38306492507535','longitud'=>'-66.16818257945806','direccion'=>'Av. Martin de la Rocha'),
            array('latitud'=>'-17.38077141115087','longitud'=>'-66.1798340953369','direccion'=>'Costa Rojas'),
            array('latitud'=>'-17.3589611192879','longitud'=>'-66.1832029498596','direccion'=>'Av. Simon Lopez'),
            array('latitud'=>'-17.356052884117194','longitud'=>'-66.1777097857971','direccion'=>'Av. Circunvalacion'),
            array('latitud'=>'-17.3566877819645','longitud'=>'-66.16509267459105','direccion'=>'Hernan Siles Suazo'),
            array('latitud'=>'-17.372354789736317','longitud'=>'-66.16474935183714','direccion'=>'Av. America'),
            array('latitud'=>'-17.373931655920256','longitud'=>'-66.16219588885497','direccion'=>'Av. Libertador Simon Bolivar'),
            array('latitud'=>'-17.3800137262318','longitud'=>'-66.15481444964598','direccion'=>'Av. Uyuni'),
            array('latitud'=>'-17.384436924256082','longitud'=>'-66.15138122210692','direccion'=>'Av. Oquendo'),
            array('latitud'=>'-17.390482242987567','longitud'=>'-66.15350553164672','direccion'=>'Colombia'),
            array('latitud'=>'-17.37309657854477','longitud'=>'-66.15337678430433','direccion'=>'America'),
            array('latitud'=>'-17.393778984486072','longitud'=>'-66.17562839029188','direccion'=>'Blanco Galindo'),
            array('latitud'=>'-17.414110990314644','longitud'=>'-66.15131684909056','direccion'=>'Av. Republica'),
        );
        
        $zonasu=array(
            array('latitud'=>'-17.368292403664057','longitud'=>'-66.17820739746094','direccion'=>'Wuayno, Cochabamba, Bolivia'),
            array('latitud'=>'-17.378879908130706','longitud'=>'-66.18893623352051','direccion'=>'Av J.Manuel Villa Vicencio, Cochabamba, Bolivia'),
            array('latitud'=>'-17.381275834831424','longitud'=>'-66.19904279708862','direccion'=>'Av Tadeo Haenke, Cochabamba, Bolivia'),
            array('latitud'=>'-17.35287082379379','longitud'=>'-66.1867904663086','direccion'=>'Av. Centenario, Cochabamba, Bolivia'),
            array('latitud'=>'-17.368312882986892','longitud'=>'-66.1462140083313','direccion'=>'Avenida Circunvalacion, Cochabamba, Bolivia'),
            array('latitud'=>'-17.380497674042417','longitud'=>'-66.14591360092163','direccion'=>'S.De Ugarte, Cochabamba, Bolivia'),
            array('latitud' => '-17.384634175023916', 'longitud' => '-66.14522695541382', 'direccion' => 'Avenida Papa Paulo, Cochabamba, Bolivia'),
            array('latitud' => '-17.392333551608854', 'longitud' => '-66.14861726760864', 'direccion' => 'Pasteur, Cochabamba, Bolivia'),
            array('latitud' => '-17.393398333503487', 'longitud' => '-66.1552906036377', 'direccion' => '25 de Mayo, Cochabamba, Bolivia'),
            array('latitud' => '-17.396428832659836', 'longitud' => '-66.15638494491577', 'direccion' => 'Calama, Cochabamba, Bolivia'),
            
            array('latitud' => '-17.40226444969661', 'longitud' => '-66.15659952163696', 'direccion' => 'Punata, Cochabamba, Bolivia'),
            array('latitud' => '-17.404434842194036', 'longitud' => '-66.14580631256104', 'direccion' => 'Circuito Bolivia, Cochabamba, Bolivia'),
            array('latitud' => '-17.39876310182484', 'longitud' => '-66.13954067230225', 'direccion' => 'R.Torrico, Cochabamba, Bolivia'),
            array('latitud' => '-17.395794070102273', 'longitud' => '-66.14481925964355', 'direccion' => 'M.Ricardo Terrazas, Cochabamba, Bolivia'),
            array('latitud' => '-17.390388260988207', 'longitud' => '-66.15346670150757', 'direccion' => 'Colombia E-950, Cochabamba, Bolivia'),
            array('latitud' => '-17.392026401833526', 'longitud' => '-66.16923809051514', 'direccion' => 'Andres, Cochabamba, Bolivia'),
            array('latitud' => '-17.398967860856295', 'longitud' => '-66.17082595825195', 'direccion' => 'Avenida Kilometro 7, Cochabamba, Bolivia'),
            array('latitud' => '-17.400708303365402', 'longitud' => '-66.15441083908081', 'direccion' => 'I.Montes, Cochabamba, Bolivia'),
            array('latitud' => '-17.393295950898345', 'longitud' => '-66.15310192108154', 'direccion' => 'Lanza, Cochabamba, Bolivia'),
            array('latitud' => '-17.39593740377559', 'longitud' => '-66.15312337875366', 'direccion' => 'Calama, Cochabamba, Bolivia'),
            
            array('latitud' => '-17.394647396671466', 'longitud' => '-66.17230653762817', 'direccion' => 'Alto De La Alianza, Cochabamba, Bolivia'),
            array('latitud' => '-17.39700216468902', 'longitud' => '-66.17779970169067', 'direccion' => 'Padilla, Cochabamba, Bolivia'),
            array('latitud' => '-17.405909056362677', 'longitud' => '-66.17674827575684', 'direccion' => 'Guillermo Sanchez, Cochabamba, Bolivia'),
            array('latitud' => '-17.40410723743069', 'longitud' => '-66.18844270706177', 'direccion' => 'Anaximandro, Cochabamba, Bolivia'),
            array('latitud' => '-17.390203969225123', 'longitud' => '-66.20314121246338', 'direccion' => 'Arz A.Gutierrez G, Cochabamba, Bolivia'),
            array('latitud' => '-17.382647847111308', 'longitud' => '-66.20011568069458', 'direccion' => 'Issac Aranibar, Cochabamba, Bolivia'),
            array('latitud' => '-17.376504428479333', 'longitud' => '-66.19048118591309', 'direccion' => 'Chiriguano, Cochabamba, Bolivia'),
            array('latitud' => '-17.371917208142925', 'longitud' => '-66.1870265007019', 'direccion' => 'Baure, Cochabamba, Bolivia'),
            array('latitud' => '-17.35688506511865', 'longitud' => '-66.18080377578735', 'direccion' => 'Yawar Wacajj, Cochabamba, Bolivia'),
            array('latitud' => '-17.391084472639903', 'longitud' => '-66.27180576324463', 'direccion' => 'Marcelo Quiroga, Quillacollo, Bolivia'),
            
            array('latitud' => '-17.402039218810632', 'longitud' => '-66.2800669670105', 'direccion' => 'Avenida Circunvalación, Quillacollo, Bolivia'),
            array('latitud' => '-17.412522398583533', 'longitud' => '-66.28113985061646', 'direccion' => 'Avenida Virgen de Urkupiña, Quillacollo, Bolivia'),
            array('latitud' => '-17.399807370487917', 'longitud' => '-66.29040956497192', 'direccion' => 'Max Bascope, Quillacollo, Bolivia'),
            array('latitud' => '-17.3807843652443', 'longitud' => '-66.27942323684692', 'direccion' => 'Jacaranda, Quillacollo, Bolivia'),
            array('latitud' => '-17.386927640228393', 'longitud' => '-66.25648498535156', 'direccion' => 'Carlos Peña St, Quillacollo, Bolivia'),
            array('latitud' => '-17.384183669552613', 'longitud' => '-66.1476731300354', 'direccion' => 'Venezuela, Cochabamba, Bolivia'),
            array('latitud' => '-17.375398591231754', 'longitud' => '-66.14074230194092', 'direccion' => 'Froilan Z, Cochabamba, Bolivia'),
            array('latitud' => '-17.372060560517756', 'longitud' => '-66.12089395523071', 'direccion' => 'Aldunate, Cochabamba, Bolivia'),
            array('latitud' => '-17.385043724490032', 'longitud' => '-66.10965013504028', 'direccion' => 'Innominada, Bolivia'),
            array('latitud' => '-17.38146013558638', 'longitud' => '-66.09033823013306', 'direccion' => 'Avenida Alan Jameson, Bolivia'),
            
            array('latitud' => '-17.387070980849252', 'longitud' => '-66.1042857170105', 'direccion' => 'Los Pinos, Bolivia'),
            array('latitud' => '-17.405253851533498', 'longitud' => '-66.04250907897949', 'direccion' => 'Porvenir, Sacaba, Bolivia'),
            array('latitud' => '-17.398312631148485', 'longitud' => '-66.0316514968872', 'direccion' => 'Sacaba, Bolivia'),
            array('latitud' => '-17.39130971701876', 'longitud' => '-66.03229522705078', 'direccion' => 'San Rafael, Bolivia'),
            array('latitud' => '-17.416473909869694', 'longitud' => '-66.04177951812744', 'direccion' => 'Bolivar, Sacaba, Bolivia'),
            array('latitud' => '-17.40384105812812', 'longitud' => '-66.04860305786133', 'direccion' => 'Porvenir, Sacaba, Bolivia'),
            array('latitud' => '-17.378163171827637', 'longitud' => '-66.06261491775513', 'direccion' => 'Av. Primera, Bolivia'),
            array('latitud' => '-17.404926248238095', 'longitud' => '-66.17391586303711', 'direccion' => 'Arquímedes, Cochabamba, Bolivia'),
            array('latitud' => '-17.4206505438894', 'longitud' => '-66.14155769348145', 'direccion' => 'Avenue Republica de Suecia, Cochabamba, Bolivia'),
            array('latitud' => '-17.43406016900327', 'longitud' => '-66.12655878067017', 'direccion' => 'Avenida Siglo XX, Cochabamba, Bolivia'),
            
            array('latitud' => '-17.42795942354203', 'longitud' => '-66.1205506324768', 'direccion' => 'Sebastian de Castrilla, Cochabamba, Bolivia'),
            array('latitud' => '-17.423393967193782', 'longitud' => '-66.12653732299805', 'direccion' => 'Guayacan, Cochabamba, Bolivia'),
            array('latitud' => '-17.424663298355608', 'longitud' => '-66.1430811882019', 'direccion' => 'Versalles, Cochabamba, Bolivia'),
            array('latitud' => '-17.41057732277712', 'longitud' => '-66.14604234695435', 'direccion' => '22 de Julio, Cochabamba, Bolivia'),
            array('latitud' => '-17.46177709351071', 'longitud' => '-66.1190915107727', 'direccion' => 'La Habana, Bolivia'),
            array('latitud' => '-17.44710034009552', 'longitud' => '-66.1388111114502', 'direccion' => 'Av. DE LOS DERECHOS HUMANOS, Cochabamba, Bolivia'),
            array('latitud' => '-17.429638172498088', 'longitud' => '-66.1602258682251', 'direccion' => 'Virgin De Loreto, Cochabamba, Bolivia'),
            array('latitud' => '-17.421878947480298', 'longitud' => '-66.16084814071655', 'direccion' => 'N.Rios, Cochabamba, Bolivia'),
            array('latitud' => '-17.418766975666614', 'longitud' => '-66.16861581802368', 'direccion' => 'Luis E. Rivera, Cochabamba, Bolivia'),
            array('latitud' => '-17.408939348142688', 'longitud' => '-66.17086887359619', 'direccion' => 'Mama Ocllo, Cochabamba, Bolivia'),
            
            array('latitud' => '-17.408980297687513', 'longitud' => '-66.17702722549438', 'direccion' => 'Rojas Enrique Rojas, Cochabamba, Bolivia'),
            array('latitud' => '-17.408693650681116', 'longitud' => '-66.18402242660522', 'direccion' => 'Av. Cnl. Amalia Villa de la Tapia, Cochabamba, Bolivia'),
            array('latitud' => '-17.355021321148488', 'longitud' => '-66.158766746521', 'direccion' => 'Miguel De Los S.Taborga, Cochabamba, Bolivia'),
            array('latitud' => '-17.358994554663195', 'longitud' => '-66.14848852157593', 'direccion' => 'Flor De Romero, Cochabamba, Bolivia'),
            array('latitud' => '-17.36546623515512', 'longitud' => '-66.12608671188354', 'direccion' => 'Avenida Circunvalación II, Cochabamba, Bolivia'),
            array('latitud' => '-17.37324833302123', 'longitud' => '-66.1177396774292', 'direccion' => 'Luis Lara, Cochabamba, Bolivia'),
        );
        
        $zonasmens=array(
            array('latitud'=>'-17.39888595727123','longitud'=>'-66.16818257945806','direccion'=>'Avenida Aroma, Cochabamba, Bolivia'),
            array('latitud'=>'-17.36542527587073','longitud'=>'-66.15330643951893','direccion'=>'Las Violetas, Cochabamba, Bolivia'),
        );
        
        $factory = $this->container->get('security.encoder_factory');
        $d1=new \DateTime("2012-08-26 11:14:15");
        $d2=new \DateTime("2012-08-27 11:14:15");
        $d3=new \DateTime("2012-08-28 11:14:15");
        $d4=new \DateTime("2012-08-29 11:14:15");
        $d5=new \DateTime("2012-08-30 11:14:15");
        $d6=new \DateTime("2012-08-31 11:14:15");
        $d7=new \DateTime("2012-09-01 11:14:15");
        $d8=new \DateTime("2012-09-01 12:14:16");
        $d9=new \DateTime("2012-09-01 13:14:17");
        $d10=new \DateTime("2012-09-04 11:14:15");
        $d11=new \DateTime("2012-09-04 11:15:17");
        $d12=new \DateTime("2012-09-05 11:14:15");
        $d13=new \DateTime("2012-09-06 11:14:15");
        $dias=array($d1,$d2,$d3,$d4,$d5,$d6,$d7,$d8,$d9,$d10,$d11,$d12,$d13);
        $j=0;
        
        $usuarioaux=new Usuario();
        foreach (range(1, 65) as $i)
        {
            $zona=new Zona();
            $zonau=new Zona();
            $zonamen=new Zona();
            $anuncio=new Anuncio();
            $perdido=new Perdido();
            $mascota=new Mascota();
            $foto=new Foto();
            $usuario=new Usuario();
            $mensaje=new Mensaje();
            $usuario->setNombre($nombres[$i]);
            $usuario->setApellidos($apellidos[$i]);
            $apenor=Util::getNormal($apellidos[$i]);
            $email=strtolower($apenor)."@gmail.com";
            $usuario->setEmail($email);
            $usuario->setSalt(base_convert(sha1(uniqid(mt_rand(), true)), 16, 36));
            $codificador = $factory->getEncoder($usuario);
            $password = $codificador->encodePassword("usuario", $usuario->getSalt());
            $usuario->setPassword($password);
            
            $zonau->setLatitude($zonasu[$i-1]['latitud']);
            $zonau->setLongitude($zonasu[$i-1]['longitud']);
            $zonau->setDireccion($zonasu[$i-1]['direccion']);
            $zonau->setUsuario($usuario);
            if($i==4){
                $usuarioaux=$usuario;
            }
            
            if($i%5==0){
                //Agregar Mascota
                $cont=$i/5;
                //echo "".$mascotas[$cont-1]['categoria'];
                $mascota->setNombre($mascotas[$cont-1]['nombre']);
                $mascota->setCategoria($mascotas[$cont-1]['categoria']);
                $mascota->setRaza($mascotas[$cont-1]['raza']);
                $mascota->setSexo($mascotas[$cont-1]['sexo']);
                $mascota->setIdentificacion($mascotas[$cont-1]['identificacion']);
                $mascota->setEnfermedad($mascotas[$cont-1]['enfermedad']);
                $foto->setDescripcion('Foto de la mascota perdida');
                $foto->setUrl($fotos[$j]);
                $j++;
                $foto->setMascota($mascota);
                if($i==10)
                {
                    $manager->persist($foto);
                    $foto=new Foto();
                    $foto->setDescripcion('Foto de la mascota perdida');
                    $foto->setUrl($fotos[$j]);
                    $j++;
                    $foto->setMascota($mascota);
                }
                
                $contf=rand(0, 5);
                
                //Para agregar los anuncios
                $anuncio->setCreated($dias[$cont-1]);
                $anuncio->setUpdated($dias[$cont-1]);
                $anuncio->setTitulo('Se Busca Mascota '.$mascota->getNombre());
                $anuncio->setDescripcion('El martes 14 de agosto por la tarde se perdió mi perrita en el parque de las Cruces de Carabanchel (Madrid) a la altura del Polideportivo. Se llama Zara y tiene 13 años. Es de color marrón con tonos negros y blancos, y lleva un arnés verde.
Por favor, si alguien la encuentra o la ha visto ruego se ponga en contacto con Noelia en alguno de estos dos teléfonos:
650259874
653061182
Muchas Gracias.');
                $perdido->setFechaExtravio($dias[$cont-1]);
                
                $perdido->setCelular('71752256');
                
                $perdido->setAnuncio($anuncio);
                $perdido->setUsuario($usuario);
                
                $anuncio->setMascota($mascota);
                $zona->setLatitude($zonas[$cont-1]['latitud']);
                $zona->setLongitude($zonas[$cont-1]['longitud']);
                $zona->setDireccion($zonas[$cont-1]['direccion']);
                $zona->setAnuncio($anuncio);
                
                if($i==10 || $i==20){
                $zonamen->setLatitude($zonasmens[0]['latitud']);
                $zonamen->setLongitude($zonasmens[0]['longitud']);
                $zonamen->setDireccion($zonasmens[0]['direccion']);
                $mensaje->setDescripcion('vi algo pero tienes que contactarme');
                $mensaje->setAnuncio($anuncio);
                $mensaje->setUsuario($usuarioaux);
                $zonamen->setMensaje($mensaje);
                $manager->persist($mensaje);
                $manager->persist($zonamen);
                }
                
                $manager->persist($foto);
                $manager->persist($mascota);
                $manager->persist($anuncio);
                $manager->persist($perdido);
                $manager->persist($zona);

                
                //echo " FExtra==".$anuncio->getFechaExtravio()->format("d/m/y")." Nombre".$mascota->getNombre();
                
            }
            //$usuario->setTipo(false);
            //$usuario->setVermensaje(false)
            $usuario->setCreated(new \DateTime('now'));
            $usuario->setUpdated(new \DateTime('now'));
            
            
            
            $manager->persist($usuario); 
            $manager->persist($zonau);
                
                
                //echo " FExtra==".$anuncio->getFechaExtravio()->format("d/m/y")." Nombre".$mascota->getNombre();
                
        }
        
        
        foreach ($ciudades as $valor) {
            $ciudad=new Ciudad();
            $ciudad->setNombre($valor);
            $manager->persist($ciudad);
        }
        
            
            
               
        
        /*
        foreach($mascotas as $mascota)
        {
            $entidad=new Mascota();
            $entidad->setNombre($mascota['nombre']);
            $entidad->setCategoria($mascota['categoria']);
            $entidad->setRaza($mascota['raza']);
            $entidad->setSexo($mascota['sexo']);
            $entidad->setIdentificacion($mascota['identificacion']);
            $entidad->setEnfermedad($mascota['enfermedad']);
            $manager->persist($entidad);
        }
        
        */
        

        $manager->flush();
    }

}