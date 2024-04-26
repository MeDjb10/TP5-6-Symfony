<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: EtudiantRepository::class)]
#[Broadcast]
class Etudiant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $etudiant_id = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $nome = null;

    #[ORM\ManyToOne(inversedBy: 'etudiantq')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Institut $instit = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtudiantId(): ?int
    {
        return $this->etudiant_id;
    }

    public function setEtudiantId(int $etudiant_id): static
    {
        $this->etudiant_id = $etudiant_id;

        return $this;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(?string $nome): static
    {
        $this->nome = $nome;

        return $this;
    }

    public function getInstit(): ?Institut
    {
        return $this->instit;
    }

    public function setInstit(?Institut $instit): static
    {
        $this->instit = $instit;

        return $this;
    }
}
