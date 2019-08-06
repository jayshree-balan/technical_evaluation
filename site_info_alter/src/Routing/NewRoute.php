<?php

namespace Drupal\site_info_alter\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

class NewRoute extends RouteSubscriberBase {
	
	// Implement the alterRoutes() method.
	protected function alterRoutes(RouteCollection $collection){
    if ($route = $collection->get('system.site_information_settings')) {
      $route->setDefault('_form', 'Drupal\site_info_alter\Form\ExtendedSiteInformationForm');
  }
	}
}

?>