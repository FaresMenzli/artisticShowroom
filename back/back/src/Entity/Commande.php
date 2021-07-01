<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass=CommandeRepository::class)
 */
class Commande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("cmd")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="commandes")
     * @Groups("cmd")
     */
    private $client;

    /**
     * @ORM\ManyToMany(targetEntity=Oeuvre::class)
     * @Groups("cmd")
     */
    private $Oeuvre;

    /**
     * @ORM\Column(type="boolean")
     * @Groups("cmd")
     */
    private $done;

    /**
     * @ORM\Column(type="date")
     * @Groups("cmd")
     */
    private $dateCommande;

    public function __construct()
    {
        $this->Oeuvre = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return Collection|Oeuvre[]
     */
    public function getOeuvre(): Collection
    {
        return $this->Oeuvre;
    }

    public function addOeuvre(Oeuvre $oeuvre): self
    {
        if (!$this->Oeuvre->contains($oeuvre)) {
            $this->Oeuvre[] = $oeuvre;
        }

        return $this;
    }

    public function removeOeuvre(Oeuvre $oeuvre): self
    {
        $this->Oeuvre->removeElement($oeuvre);

        return $this;
    }

    public function getDone(): ?bool
    {
        return $this->done;
    }

    public function setDone(bool $done): self
    {
        $this->done = $done;

        return $this;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->dateCommande;
    }

    public function setDateCommande(\DateTimeInterface $dateCommande): self
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }
}
