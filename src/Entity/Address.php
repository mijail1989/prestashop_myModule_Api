<?php

namespace App\Entity;

use JsonSerializable;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\AddressRepository;

#[ORM\Entity(repositoryClass: AddressRepository::class)]
class Address implements JsonSerializable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $customerName = null;

    #[ORM\Column(length: 255)]
    private ?string $customerLastname = null;

    #[ORM\Column(length: 255)]
    private ?string $street = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[ORM\Column(length: 255)]
    private ?string $region = null;

    #[ORM\Column(length: 255)]
    private ?string $postalCode = null;

    #[ORM\Column(length: 255)]
    private ?string $country = null;

    #[ORM\Column(length: 255)]
    private ?string $phone = null;

    #[ORM\Column]
    private ?int $userId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getCustomerName(): ?string
    {
        return $this->customerName;
    }

    public function setCustomerName(string $customerName): static
    {
        $this->customerName = $customerName;

        return $this;
    }

    public function getCustomerLastname(): ?string
    {
        return $this->customerLastname;
    }

    public function setCustomerLastname(string $customerLastname): static
    {
        $this->customerLastname = $customerLastname;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): static
    {
        $this->street = $street;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): static
    {
        $this->region = $region;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): static
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): static
    {
        $this->userId = $userId;

        return $this;
    }

    public function jsonSerialize()
    {
        return [
            'name' => $this->name,
            'customerName' => $this->customerName,
            'customerLastname' => $this->customerLastname,
            'street' => $this->street,
            'city' => $this->city,
            'region' => $this->region,
            'postalCode' => $this->postalCode,
            'country' => $this->country,
            'phone' => $this->phone,
        ];
    }
    

    public function setAddress(Array $body){
        $this->setName($body["name"]);
        $this->setCustomerName($body["customerName"]);
        $this->setCustomerLastname($body["customerLastname"]);
        $this->setStreet($body["street"]);
        $this->setCity($body["city"]);
        $this->setRegion($body["region"]);
        $this->setPostalCode($body["postalCode"]);
        $this->setCountry($body["country"]);
        $this->setPhone($body["phone"]);
        $this->setUserId($body["userId"]);
        return $this;
    }

}
