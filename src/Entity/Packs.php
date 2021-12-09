<?php

namespace App\Entity;

use App\Repository\PacksRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=PacksRepository::class)
 */
class Packs
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     * @Assert\Type(
     *     type="float",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     */
    private $pack_amount;

    /**
     * @ORM\Column(type="string", length=255)
     *@Assert\Length(
     *     min=3,
     *     max=10,
     *     minMessage= "Your type must be at least {{ limit }} characters long",
     *     maxMessage = "Your meseage type cannot be longer than {{ limit }} characters"
     *)
     */
    private $pack_duration;

    /**
     * @ORM\Column(type="date")
     */
    private $pack_expiration_date;

    /**
     * @ORM\Column(type="text")

     */



    private $pack_description;

    /**
     * @ORM\ManyToOne(targetEntity=PacksCat::class, inversedBy="delpacks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPackamount(): ?float
    {
        return $this->pack_amount;
    }

    public function setPackamount(float $pack_amount): self
    {
        $this->pack_amount = $pack_amount;

        return $this;
    }

    public function getPackDuration(): ?string
    {
        return $this->pack_duration;
    }

    public function setPackDuration(string $pack_duration): self
    {
        $this->pack_duration = $pack_duration;

        return $this;
    }

    public function getPackExpirationDate(): ?\DateTimeInterface
    {
        return $this->pack_expiration_date;
    }

    public function setPackExpirationDate(\DateTimeInterface $pack_expiration_date): self
    {
        $this->pack_expiration_date = $pack_expiration_date;

        return $this;
    }


    public function getPackDescription(): ?string
    {
        return $this->pack_description;
    }

    public function setPackDescription(string $pack_description): self
    {
        $this->pack_description = $pack_description;

        return $this;
    }

    public function getCategory(): ?PacksCat
    {
        return $this->category;
    }

    public function setCategory(?PacksCat $category): self
    {
        $this->category = $category;

        return $this;
    }



}
