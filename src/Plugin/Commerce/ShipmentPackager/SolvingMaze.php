<?php

namespace Drupal\commerce_solving_maze\Plugin\Commerce\ShipmentPackager;

use Drupal\commerce_order\Entity\OrderItem;
use Drupal\commerce_packaging\Plugin\Commerce\ShipmentPackager\ShipmentPackagerBase;
use Drupal\commerce_product\Entity\ProductVariationInterface;
use Drupal\commerce_shipping\Entity\ShipmentInterface;
use Drupal\commerce_shipping\PackageTypeManagerInterface;
use Drupal\commerce_shipping\Plugin\Commerce\ShippingMethod\ShippingMethodInterface;
use Drupal\commerce_solving_maze\SolvingMazeItem;
use Drupal\commerce_solving_maze\SolvingMazeRequestInterface;
use Drupal\Component\Serialization\Json;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

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
   * The solving maze request service.
   *
   * @var \Drupal\commerce_solving_maze\SolvingMazeRequestInterface
   */
  protected $solvingMazeRequest;

  /**
   * ShipmentPackagerBase constructor.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   * @param \Drupal\commerce_shipping\PackageTypeManagerInterface $package_type_manager
   *   The package type manager.
   * @param \Drupal\commerce_solving_maze\SolvingMazeRequestInterface $solving_maze_request
   *   The solving maze request service.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, EntityTypeManagerInterface $entity_type_manager, PackageTypeManagerInterface $package_type_manager, SolvingMazeRequestInterface $solving_maze_request) {
    parent::__construct($configuration, $plugin_id, $plugin_definition, $entity_type_manager, $package_type_manager);

    $this->solvingMazeRequest = $solving_maze_request;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('entity_type.manager'),
      $container->get('plugin.manager.commerce_package_type'),
      $container->get('commerce_solving_maze.solving_maze_request')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function packageItems(ShipmentInterface $shipment, ShippingMethodInterface $shipping_method) {
    $api_items = [];
    foreach ($shipment->getItems() as $item) {
      /** @var \Drupal\commerce_order\Entity\OrderItemInterface $order_item */
      $order_item = OrderItem::load($item->getOrderItemId());
      $purchased_entity = $order_item->getPurchasedEntity();
      if (!($purchased_entity instanceof ProductVariationInterface)) {
        continue;
      }

      if (!$purchased_entity->hasField('dimensions') || $purchased_entity->get('dimensions')->isEmpty()) {
        continue;
      }

      $weight = $purchased_entity->get('weight')->first()->toMeasurement();

      $dimensions = $purchased_entity->get('dimensions')->first()->toArray();
      $api_item = [
        'sku' => $purchased_entity->getSku(),
        'qty' => $item->getQuantity(),
        'name' => $item->getTitle(),
        'weight' => $weight->getNumber(),
        'weightUnit' => $weight->getUnit(),
        'dimensions' => [
          [
            'length' => $dimensions['length'],
            'width' => $dimensions['width'],
            'height' => $dimensions['height'],
          ],
        ],
        'dimensions_unit' => $dimensions['unit'],
      ];

      $api_items[] = $api_item;
    }

    $response = $this->solvingMazeRequest->getRequest([
      'items' => $api_items,
      'showRates' => false,
    ]);

    if ($response) {
      $body = Json::decode($response->getBody());
    }
  }

}
