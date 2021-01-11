<?php

namespace Drupal\commerce_packaging\Plugin\Commerce\ShipmentPackager;

use Drupal\commerce_shipping\Entity\ShipmentInterface;
use Drupal\commerce_shipping\Plugin\Commerce\ShippingMethod\ShippingMethodInterface;

/**
 * Provides the solving maze shipment packager.
 *
 * @CommerceShipmentPackager(
 *   id = "solving_maze",
 *   label = @Translation("Solving Maze"),
 *   description = @Translation("Utilizes the Solving Maze API to package items."),
 * )
 */
class SolvingMaze extends ShipmentPackagerBase {

  /**
   * {@inheritdoc}
   */
  public function packageItems(ShipmentInterface $shipment, ShippingMethodInterface $shipping_method) {

  }

}
