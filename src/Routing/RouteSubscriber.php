<?php

namespace Drupal\taxonomy_overview_permission\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Class RouteSubscriber.
 *
 * @package Drupal\taxonomy_overview_permission\Routing
 * Listens to the dynamic route events.
 */
class RouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection) {
    // Change the permission necessary for accessing taxonomy overview page.
    if ($route = $collection->get('entity.taxonomy_vocabulary.collection')) {
      $route->setRequirement('_permission', 'access taxonomy overview');
    }

    // Change the permission necessary for accessing vocabulary overview page.
    if ($route = $collection->get('entity.taxonomy_vocabulary.overview_form')) {
      $route->setRequirements([
        '_permission' => 'access taxonomy overview',
        '_method' => 'GET|POST',
      ]
      );
    }

    // Change the permission necessary for accessing term add form.
    if ($route = $collection->get('entity.taxonomy_term.add_form')) {
      $route->setRequirements([
        '_permission' => 'access taxonomy overview',
        '_method' => 'GET|POST',
      ]
      );
    }
  }

}
