<?php


namespace Drupal\commerce_solving_maze;



use Drupal\Component\Serialization\Json;
use Drupal\Core\Config\ConfigFactory;
use GuzzleHttp\Client;

class SolvingMazeRequest implements SolvingMazeRequestInterface {

  /**
   * @var \GuzzleHttp\Client
   */
  protected $httpClient;

  /**
   * The solving maze settings config.
   *
   * @var \Drupal\Core\Config\Config|\Drupal\Core\Config\ImmutableConfig
   */
  protected $settings;

  /**
   * SolvingMazeRequest constructor.
   *
   * @param \GuzzleHttp\Client $http_client
   *   The http client.
   * @param \Drupal\Core\Config\ConfigFactory $config
   *   The config factory.
   */
  public function __construct(Client $http_client, ConfigFactory $config) {
    $this->httpClient = $http_client;
    $this->settings = $config->get('commerce_solving_maze.settings');
  }

  public function getRequest(array $options) {
    $api_key = $this->getAPIKey();
    $warehouse_id = $this->getWarehouseId();

    return $this->httpClient->post("http://api.solvingmaze.com/calculate/key/$api_key/warehouse/$warehouse_id", [
      'json' => $options
    ]);
  }

  protected function getAPIKey() {
    return $this->settings->get('api_key');
  }

  protected function getWarehouseId() {
    return $this->settings->get('warehouse_id');
  }

}
