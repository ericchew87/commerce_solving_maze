<?php


namespace Drupal\commerce_solving_maze;


class SolvingMazeItem {

  /**
   * Item unique identifier.
   *
   * @var string
   */
  protected $sku;

  /**
   * Item name.
   *
   * @var string
   */
  protected $name;

  /**
   * Item quantity.
   *
   * @var integer|null
   */
  protected $qty;

  /**
   * Shelf ID as defined in warehouse layout
   * where item is stored.
   *
   * @var string|null
   */
  protected $shelf;

  /**
   * Item unit price.
   *
   * @var float|null
   */
  protected $unitPrice;

  /**
   * The weight of each unit of item.
   *
   * @var float|null
   */
  protected $weight;

  /**
   * The weight unit of item.
   *
   * Valid units are "kg", "g", "oz" or "lb"
   *
   * @var string|null
   */
  protected $weightUnit;

  /**
   * A list of dimension hashes.
   *
   * Maximum 2 dimension hashes allowed.
   *
   * @example
   * [
   *   [
   *     'length' => 0.0001,
   *     'width' => 0.0001,
   *     'height' => 0.0001,
   *   ],
   *   [
   *     'length' => 10.0,
   *     'width' => 12.0,
   *     'height' => 15.0,
   *   ],
   * ];
   *
   * @var array|null
   */
  protected $dimensions;

  /**
   * The dimension unit of item.
   *
   * Valid units are "m", "cm", "mm", "ft", or "in".
   *
   * @var string|null
   */
  protected $dimensionUnit;

  /**
   * Whether the item can be rotated in
   * any direction for packing.
   *
   * @var bool|null
   */
  protected $rotatable;

  /**
   * Whether the item is shipped separately.
   *
   * @var bool|null
   */
  protected $packable;

  /**
   * Whether package containing the product can be bundled
   * with other packages.
   *
   * @var bool|null
   */
  protected $strappable;

  /**
   * Whether item is allowed to fill the void
   * space of another item.
   *
   * @var bool|null
   */
  protected $voidFiller;

  /**
   * A list of void dimension hashes.
   *
   * Maximum of 3 dimension hashes allowed.
   *
   * @example
   * [
   *   [
   *     'length' => 0.0001,
   *     'width' => 0.0001,
   *     'height' => 0.0001,
   *   ],
   *   [
   *     'length' => 10.0,
   *     'width' => 12.0,
   *     'height' => 15.0,
   *   ],
   * ];
   *
   * @var array|null
   */
  protected $voidDimensions;

  /**
   * The minimum quantity required to trigger
   * prepackaging.
   *
   * @var integer|null
   */
  protected $prepackageMinQuantity;

  /**
   * A list of prepackaging hashes.
   *
   * @var array|null
   */
  protected $prepackages;

  /**
   * A hash of product stacking rules.
   *
   * @var array|null
   */
  protected $stack;

  /**
   * A hash of shippable packaging.
   * E.g. manufacture's original box.
   *
   * @var array|null
   */
  protected $packaging;

  /**
   * List of tags of containers preferred
   * for packing.
   *
   * @var array|null
   */
  protected $preferContainers;

  /**
   * List of tags of containers to avoid
   * for packing.
   *
   * @var array|null
   */
  protected $excludeContainers;

  /**
   * List of tags of services to avoid.
   *
   * @var array|null
   */
  protected $excludeServices;

  /**
   * Pack items separately by group 0, 1 or 2.
   *
   * @var integer|null
   */
  protected $group;

  /**
   * SolvingMazeItem constructor.
   *
   * @param string $sku
   * @param string $name
   * @param int|null $qty
   * @param string|null $shelf
   * @param float|null $unitPrice
   * @param float|null $weight
   * @param string|null $weightUnit
   * @param array|null $dimensions
   * @param string|null $dimensionUnit
   * @param bool|null $rotatable
   * @param bool|null $packable
   * @param bool|null $strappable
   * @param bool|null $voidFiller
   * @param array|null $voidDimensions
   * @param int|null $prepackageMinQuantity
   * @param array|null $prepackages
   * @param array|null $stack
   * @param array|null $packaging
   * @param array|null $preferContainers
   * @param array|null $excludeContainers
   * @param array|null $excludeServices
   * @param int|null $group
   */
  public function __construct(string $sku, string $name, ?int $qty, ?string $shelf, ?float $unitPrice, ?float $weight, ?string $weightUnit, ?array $dimensions, ?string $dimensionUnit, ?bool $rotatable, ?bool $packable, ?bool $strappable, ?bool $voidFiller, ?array $voidDimensions, ?int $prepackageMinQuantity, ?array $prepackages, ?array $stack, ?array $packaging, ?array $preferContainers, ?array $excludeContainers, ?array $excludeServices, ?int $group) {
    $this->sku = $sku;
    $this->name = $name;
    $this->qty = $qty;
    $this->shelf = $shelf;
    $this->unitPrice = $unitPrice;
    $this->weight = $weight;
    $this->weightUnit = $weightUnit;
    $this->dimensions = $dimensions;
    $this->dimensionUnit = $dimensionUnit;
    $this->rotatable = $rotatable;
    $this->packable = $packable;
    $this->strappable = $strappable;
    $this->voidFiller = $voidFiller;
    $this->voidDimensions = $voidDimensions;
    $this->prepackageMinQuantity = $prepackageMinQuantity;
    $this->prepackages = $prepackages;
    $this->stack = $stack;
    $this->packaging = $packaging;
    $this->preferContainers = $preferContainers;
    $this->excludeContainers = $excludeContainers;
    $this->excludeServices = $excludeServices;
    $this->group = $group;
  }

  /**
   * @return string
   */
  public function getSku(): string {
    return $this->sku;
  }

  /**
   * @param string $sku
   */
  public function setSku(string $sku): void {
    $this->sku = $sku;
  }

  /**
   * @return string
   */
  public function getName(): string {
    return $this->name;
  }

  /**
   * @param string $name
   */
  public function setName(string $name): void {
    $this->name = $name;
  }

  /**
   * @return int|null
   */
  public function getQty(): ?int {
    return $this->qty;
  }

  /**
   * @param int|null $qty
   */
  public function setQty(?int $qty): void {
    $this->qty = $qty;
  }

  /**
   * @return string|null
   */
  public function getShelf(): ?string {
    return $this->shelf;
  }

  /**
   * @param string|null $shelf
   */
  public function setShelf(?string $shelf): void {
    $this->shelf = $shelf;
  }

  /**
   * @return float|null
   */
  public function getUnitPrice(): ?float {
    return $this->unitPrice;
  }

  /**
   * @param float|null $unitPrice
   */
  public function setUnitPrice(?float $unitPrice): void {
    $this->unitPrice = $unitPrice;
  }

  /**
   * @return float|null
   */
  public function getWeight(): ?float {
    return $this->weight;
  }

  /**
   * @param float|null $weight
   */
  public function setWeight(?float $weight): void {
    $this->weight = $weight;
  }

  /**
   * @return string|null
   */
  public function getWeightUnit(): ?string {
    return $this->weightUnit;
  }

  /**
   * @param string|null $weightUnit
   */
  public function setWeightUnit(?string $weightUnit): void {
    $this->weightUnit = $weightUnit;
  }

  /**
   * @return array|null
   */
  public function getDimensions(): ?array {
    return $this->dimensions;
  }

  /**
   * @param array|null $dimensions
   */
  public function setDimensions(?array $dimensions): void {
    $this->dimensions = $dimensions;
  }

  /**
   * @return string|null
   */
  public function getDimensionUnit(): ?string {
    return $this->dimensionUnit;
  }

  /**
   * @param string|null $dimensionUnit
   */
  public function setDimensionUnit(?string $dimensionUnit): void {
    $this->dimensionUnit = $dimensionUnit;
  }

  /**
   * @return bool|null
   */
  public function getRotatable(): ?bool {
    return $this->rotatable;
  }

  /**
   * @param bool|null $rotatable
   */
  public function setRotatable(?bool $rotatable): void {
    $this->rotatable = $rotatable;
  }

  /**
   * @return bool|null
   */
  public function getPackable(): ?bool {
    return $this->packable;
  }

  /**
   * @param bool|null $packable
   */
  public function setPackable(?bool $packable): void {
    $this->packable = $packable;
  }

  /**
   * @return bool|null
   */
  public function getStrappable(): ?bool {
    return $this->strappable;
  }

  /**
   * @param bool|null $strappable
   */
  public function setStrappable(?bool $strappable): void {
    $this->strappable = $strappable;
  }

  /**
   * @return bool|null
   */
  public function getVoidFiller(): ?bool {
    return $this->voidFiller;
  }

  /**
   * @param bool|null $voidFiller
   */
  public function setVoidFiller(?bool $voidFiller): void {
    $this->voidFiller = $voidFiller;
  }

  /**
   * @return array|null
   */
  public function getVoidDimensions(): ?array {
    return $this->voidDimensions;
  }

  /**
   * @param array|null $voidDimensions
   */
  public function setVoidDimensions(?array $voidDimensions): void {
    $this->voidDimensions = $voidDimensions;
  }

  /**
   * @return int|null
   */
  public function getPrepackageMinQuantity(): ?int {
    return $this->prepackageMinQuantity;
  }

  /**
   * @param int|null $prepackageMinQuantity
   */
  public function setPrepackageMinQuantity(?int $prepackageMinQuantity): void {
    $this->prepackageMinQuantity = $prepackageMinQuantity;
  }

  /**
   * @return array|null
   */
  public function getPrepackages(): ?array {
    return $this->prepackages;
  }

  /**
   * @param array|null $prepackages
   */
  public function setPrepackages(?array $prepackages): void {
    $this->prepackages = $prepackages;
  }

  /**
   * @return array|null
   */
  public function getStack(): ?array {
    return $this->stack;
  }

  /**
   * @param array|null $stack
   */
  public function setStack(?array $stack): void {
    $this->stack = $stack;
  }

  /**
   * @return array|null
   */
  public function getPackaging(): ?array {
    return $this->packaging;
  }

  /**
   * @param array|null $packaging
   */
  public function setPackaging(?array $packaging): void {
    $this->packaging = $packaging;
  }

  /**
   * @return array|null
   */
  public function getPreferContainers(): ?array {
    return $this->preferContainers;
  }

  /**
   * @param array|null $preferContainers
   */
  public function setPreferContainers(?array $preferContainers): void {
    $this->preferContainers = $preferContainers;
  }

  /**
   * @return array|null
   */
  public function getExcludeContainers(): ?array {
    return $this->excludeContainers;
  }

  /**
   * @param array|null $excludeContainers
   */
  public function setExcludeContainers(?array $excludeContainers): void {
    $this->excludeContainers = $excludeContainers;
  }

  /**
   * @return array|null
   */
  public function getExcludeServices(): ?array {
    return $this->excludeServices;
  }

  /**
   * @param array|null $excludeServices
   */
  public function setExcludeServices(?array $excludeServices): void {
    $this->excludeServices = $excludeServices;
  }

  /**
   * @return int|null
   */
  public function getGroup(): ?int {
    return $this->group;
  }

  /**
   * @param int|null $group
   */
  public function setGroup(?int $group): void {
    $this->group = $group;
  }

  public function toArray() {
    return [];
  }

}
