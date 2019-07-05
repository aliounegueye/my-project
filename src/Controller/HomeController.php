<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 2019-07-03
 * Time: 15:33
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/essaie", name="essaie")
     */
   public function index(Request $request)
       //recuperation de l'objet Request et je l'instencie en variable.

   { if ($request->query->get('age') > 18)

     {
       return new Response('bonjour');
     }
     else
         {
         return new Response('au revoir');

     }

   }

    /**
     * @Route("/demande_mon_age", name="mon_age")

     */
   public function  age(Request $request)
       //recuperation de toutes les requetes .
       // les supervariables que la methode va traiter

   {
      if ($request->query->get('mon_age') >= 18){
          return new Response('tu es majeur');
      }
      elseif ($request->query->get('mon_age') < 12){
           return new Response ('tu es un gamin');
           // on utilise la classe Response
      }

       else{
           return new Response('tu seras bientot majeur');

       }



   }

    /**
     * @Route("/conflit" , name="conflit")
     */
   public function ind()
   {
       //retourne une reponse en utilisantt laclasse Respons
     return new Response('hello avec veritable reponse');
   }

    /**
     * @Route("/ali" , name="ali")
     */
   public function ali()
   {
       echo 'je m\'appelle alioune'; die;
   }



    /**
     * @Route("/page/{id}", name="wildcard")
     */
    public function list($id)
    {

        return new Response ($id);
        // ...
    }




    /**
     * @Route("/redirect" , name="redirect")
     */
    public function contact()
    {
        return $this->redirectToRoute('mon_age');

    }
     /**
      * @Route("/twig" ,name="twig")
      */
     public function twigBasic()

     {
         //reponse http valide qui appelle un fichier twig et affiche son contenu (html).

         return $this->render("basic.html.twig");
     }

    /**
     * @Route("/testeTwig" ,name="testeTwig")
     */
    public function testeTwig()

    {
        //reponse http valide qui appelle un fichier twig et affiche son contenu (html).

        return $this->render("testerTwig.html.twig");
    }
    /**
     * @Route("/article_show" ,name="article_show")
     */
    public function articleShow()

    {
       // on simule une requete sql pour recuperer un article
        // on enrigigistre le titre de l'article dans une variable
        $article ='je suis un article';

       //on appelle un fichier twig en premier
        //parametre le fichier twig
        return $this->render("article.html.twig",
        // en scond parametre un tableau contenant les variables à envoyer au fichier twig
        // les variables pourront etre appelléesdans le fichier twig
        [
            'variableArticleTwig' => $article
        ])∞;
    }

}
