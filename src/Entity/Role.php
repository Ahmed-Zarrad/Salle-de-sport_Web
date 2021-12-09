<?php

namespace App\Entity;

use App\Repository\RoleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RoleRepository::class)
 */
class Role
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $role;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="role", orphanRemoval=true)
     */
    private $delusers;

    public function __construct()
    {
        $this->delusers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getDelusers(): Collection
    {
        return $this->delusers;
    }

    public function addDeluser(User $deluser): self
    {
        if (!$this->delusers->contains($deluser)) {
            $this->delusers[] = $deluser;
            $deluser->setRole($this);
        }

        return $this;
    }

    public function removeDeluser(User $deluser): self
    {
        if ($this->delusers->removeElement($deluser)) {
            // set the owning side to null (unless already changed)
            if ($deluser->getRole() === $this) {
                $deluser->setRole(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->Users;
    }

    public function addUser(User $User): self
    {
        if (!$this->Users->contains($User)) {
            $this->Users[] = $User;
            $User->setRole($this);
        }

        return $this;
    }

    public function removeUser(User $User): self
    {
        if ($this->Users->removeElement($User)) {
            // set the owning side to null (unless already changed)
            if ($User->getRole() === $this) {
                $User->setRole(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->role;
    }

}
