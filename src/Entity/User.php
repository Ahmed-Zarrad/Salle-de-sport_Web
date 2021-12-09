<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UsersRepository;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;




/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     *
     */
    private $Adresse_User;

    /**
     * @ORM\Column(type="integer")
     */
    private $Cin_User;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Date_N_User;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Email_User;

    /**
     * @ORM\Column(type="string", length=255)
     *@Assert\Length(
     *     min=3,
     *     max=10,
     *     minMessage= "Your type must be at least {{ limit }} characters long",
     *     maxMessage = "Your meseage type cannot be longer than {{ limit }} characters"
     *)
     */
    private $Nom_User;

    /**
     * @ORM\Column(type="integer")
     */
    private $Num_User;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Password_user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Prenom_User;

    /**
     * @ORM\ManyToOne(targetEntity=Role::class, inversedBy="delusers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $role;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresseUser(): ?string
    {
        return $this->Adresse_User;
    }

    public function setAdresseUser(string $Adresse_User): self
    {
        $this->Adresse_User = $Adresse_User;

        return $this;
    }

    public function getCinUser(): ?int
    {
        return $this->Cin_User;
    }

    public function setCinUser(int $Cin_User): self
    {
        $this->Cin_User = $Cin_User;

        return $this;
    }

    public function getDateNUser(): ?string
    {
        return $this->Date_N_User;
    }

    public function setDateNUser(string $Date_N_User): self
    {
        $this->Date_N_User = $Date_N_User;

        return $this;
    }

    public function getEmailUser(): ?string
    {
        return $this->Email_User;
    }

    public function setEmailUser(string $Email_User): self
    {
        $this->Email_User = $Email_User;

        return $this;
    }

    public function getNomUser(): ?string
    {
        return $this->Nom_User;
    }

    public function setNomUser(string $Nom_User): self
    {
        $this->Nom_User = $Nom_User;

        return $this;
    }

    public function getNumUser(): ?int
    {
        return $this->Num_User;
    }

    public function setNumUser(int $Num_User): self
    {
        $this->Num_User = $Num_User;

        return $this;
    }

    public function getPasswordUser(): ?string
    {
        return $this->Password_user;
    }

    public function setPasswordUser(string $Password_user): self
    {
        $this->Password_user = $Password_user;

        return $this;
    }

    public function getPrenomUser(): ?string
    {
        return $this->Prenom_User;
    }

    public function setPrenomUser(string $Prenom_User): self
    {
        $this->Prenom_User = $Prenom_User;

        return $this;
    }

    public function getRole(): ?Role
    {
        return $this->role;
    }

    public function setRole(?Role $role): self
    {
        $this->role = $role;

        return $this;
    }


}
