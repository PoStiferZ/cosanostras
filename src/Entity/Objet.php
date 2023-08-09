<?php

namespace App\Entity;

use App\Repository\ObjetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ObjetRepository::class)]
class Objet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $photo = null;

    #[ORM\ManyToMany(targetEntity: Entrepot::class)]
    private Collection $entrepot;

    public function __construct()
    {
        $this->entrepot = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): static
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * @return Collection<int, Entrepot>
     */
    public function getEntrepot(): Collection
    {
        return $this->entrepot;
    }

    public function addEntrepot(Entrepot $entrepot): static
    {
        if (!$this->entrepot->contains($entrepot)) {
            $this->entrepot->add($entrepot);
        }

        return $this;
    }

    public function removeEntrepot(Entrepot $entrepot): static
    {
        $this->entrepot->removeElement($entrepot);

        return $this;
    }
}
