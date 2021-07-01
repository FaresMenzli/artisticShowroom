<?php

namespace App\Entity;

use App\Repository\OeuvreRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass=OeuvreRepository::class)
 */
class Oeuvre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("cmd")
     */
    private $nameOeuvre;

    /**
     * @ORM\Column(type="integer")
     * @Groups("cmd")
     */
    private $quantity;

    /**
     * @ORM\Column(type="integer")
     * @Groups("cmd")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("cmd")
     */
    private $photo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameOeuvre(): ?string
    {
        return $this->nameOeuvre;
    }

    public function setNameOeuvre(string $nameOeuvre): self
    {
        $this->nameOeuvre = $nameOeuvre;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }
}
