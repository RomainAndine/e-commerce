<?php

namespace App\Entity;

use App\Repository\LigneCommandeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LigneCommandeRepository::class)]
class LigneCommande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $qteCommandee = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQteCommandee(): ?string
    {
        return $this->qteCommandee;
    }

    public function setQteCommandee(string $qteCommandee): static
    {
        $this->qteCommandee = $qteCommandee;

        return $this;
    }
}
