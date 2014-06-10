<?php
/**
 * PageController.php
 * User: Utilisateur
 * Date: 06/06/14
 * Time: 13:53
 */

namespace Gastro\MenuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MenuController extends Controller
{
    public function indexAction()
    {
        $restaurant = $this->container->get('security.context')->getToken()->getUser()->getRestaurant();
        $recipes = $this->get('gastro_data.recipe.provider')->getAllRestaurantMenuRecipes($restaurant->getId());

        $paramsRender = array('recipes' => $recipes);

        return $this->render('GastroMenuBundle:Menu:list.html.twig', $paramsRender);
    }

} 