<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Items;
use Doctrine\Common\Collections\ArrayCollection;


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
     */
    private $username;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Item", mappedBy="user")
     */
    private $items;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function __construct()
    {
        $this->items = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->username;
    }
}
