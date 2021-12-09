<?php

namespace App\Entity;

use App\Repository\PacksCatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=PacksCatRepository::class)
 */
class PacksCat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Type("string")
     *)
     */
    private $pcat_nom;

    /**
     * @ORM\OneToMany(targetEntity=Packs::class, mappedBy="category", orphanRemoval=true)
     */
    private $delpacks;

    public function __construct()
    {
        $this->delpacks = new ArrayCollection();
    }




    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPcatNom(): ?string
    {
        return $this->pcat_nom;
    }

    public function setPcatNom(string $pcat_nom): self
    {
        $this->pcat_nom = $pcat_nom;

        return $this;
    }

    /**
     * @return Collection|Packs[]
     */
    public function getDelpacks(): Collection
    {
        return $this->delpacks;
    }

    public function addDelpack(Packs $delpack): self
    {
        if (!$this->delpacks->contains($delpack)) {
            $this->delpacks[] = $delpack;
            $delpack->setCategory($this);
        }

        return $this;
    }

    public function removeDelpack(Packs $delpack): self
    {
        if ($this->delpacks->removeElement($delpack)) {
            // set the owning side to null (unless already changed)
            if ($delpack->getCategory() === $this) {
                $delpack->setCategory(null);
            }
        }

        return $this;
    }



    /**
     * @return Collection|Packs[]
     */
    public function getPackss(): Collection
    {
        return $this->Packss;
    }

    public function addPacks(Packs $Packs): self
    {
        if (!$this->Packss->contains($Packs)) {
            $this->Packss[] = $Packs;
            $Packs->setCategory($this);
        }

        return $this;
    }

    public function removePacks(Packs $Packs): self
    {
        if ($this->Packss->removeElement($Packs)) {
            // set the owning side to null (unless already changed)
            if ($Packs->getCategory() === $this) {
                $Packs->setCategory(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->pcat_nom;
    }
    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }




}
