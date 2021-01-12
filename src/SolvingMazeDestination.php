<?php


namespace Drupal\commerce_solving_maze;


class SolvingMazeDestination {

  /**
   * The recipient first name (optional).
   *
   * @var string
   */
  protected $firstName;

  /**
   * The recipient last name (optional).
   *
   * @var string
   */
  protected $lastName;

  /**
   * The company name (optional).
   *
   * @var string
   */
  protected $company;

  /**
   * The recipient phone number (optional).
   *
   * @var string
   */
  protected $phone;

  /**
   * A list of street address lines (optional).
   *
   * @var string
   */
  protected $streetAddress;

  /**
   * The city name.
   *
   * @var string
   */
  protected $city;

  /**
   * The postal code.
   *
   * @var string
   */
  protected $post;

  /**
   * The province or state abbreviation.
   *
   * @var string
   */
  protected $region;

  /**
   * The ISO 3166-1 two-letter country code.
   *
   * @var string
   */
  protected $country;

  /**
   * Whether the address is residential or not.
   *
   * @var boolean
   */
  protected $residential;

  /**
   * SolvingMazeDestination constructor.
   *
   * @param string $post
   *   The postal code.
   * @param string $region
   *   The province or state abbreviation.
   * @param string $country
   *   The ISO 3166-1 two-letter country code.
   * @param bool $residential
   *   Whether the address is residential or not.
   * @param string|null $firstName
   *   The recipient first name.
   * @param string|null $lastName
   *   The recipient last name.
   * @param string|null $company
   *   The company.
   * @param string|null $phone
   *   The recipient phone number.
   * @param string|null $streetAddress
   *   A list of street address lines.
   * @param string|null $city
   *   The city name.
   */
  public function __construct(string $post, string $region, string $country, bool $residential, string $firstName = NULL, string $lastName = NULL, string $company = NULL, string $phone = NULL, string $streetAddress = NULL, string $city = NULL) {
    $this->setPost($post);
    $this->setRegion($region);
    $this->setCountry($country);
    $this->setResidential($residential);
    $this->setFirstName($firstName);
    $this->setLastName($lastName);
    $this->setCompany($company);
    $this->setPhone($phone);
    $this->setStreetAddress($streetAddress);
    $this->setCity($city);
  }

  /**
   * @return string
   */
  public function getFirstName(): ?string {
    return $this->firstName;
  }

  /**
   * @param string $firstName
   */
  public function setFirstName(?string $firstName): void {
    $this->firstName = $firstName;
  }

  /**
   * @return string
   */
  public function getLastName(): ?string {
    return $this->lastName;
  }

  /**
   * @param string $lastName
   */
  public function setLastName(?string $lastName): void {
    $this->lastName = $lastName;
  }

  /**
   * @return string
   */
  public function getCompany(): ?string {
    return $this->company;
  }

  /**
   * @param string $company
   */
  public function setCompany(?string $company): void {
    $this->company = $company;
  }

  /**
   * @return string
   */
  public function getPhone(): ?string {
    return $this->phone;
  }

  /**
   * @param string $phone
   */
  public function setPhone(?string $phone): void {
    $this->phone = $phone;
  }

  /**
   * @return string
   */
  public function getStreetAddress(): ?string {
    return $this->streetAddress;
  }

  /**
   * @param string $streetAddress
   */
  public function setStreetAddress(?string $streetAddress): void {
    $this->streetAddress = $streetAddress;
  }

  /**
   * @return string
   */
  public function getCity(): ?string {
    return $this->city;
  }

  /**
   * @param string $city
   */
  public function setCity(?string $city): void {
    $this->city = $city;
  }

  /**
   * @return string
   */
  public function getPost(): string {
    return $this->post;
  }

  /**
   * @param string $post
   */
  public function setPost(string $post): void {
    $this->post = $post;
  }

  /**
   * @return string
   */
  public function getRegion(): string {
    return $this->region;
  }

  /**
   * @param string $region
   */
  public function setRegion(string $region): void {
    $this->region = $region;
  }

  /**
   * @return string
   */
  public function getCountry(): string {
    return $this->country;
  }

  /**
   * @param string $country
   */
  public function setCountry(string $country): void {
    $this->country = $country;
  }

  /**
   * @return bool
   */
  public function isResidential(): bool {
    return $this->residential;
  }

  /**
   * @param bool $residential
   */
  public function setResidential(bool $residential): void {
    $this->residential = $residential;
  }



}
