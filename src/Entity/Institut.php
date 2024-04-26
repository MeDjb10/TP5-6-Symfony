<?php

namespace App\Entity;

use App\Repository\InstitutRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InstitutRepository::class)]
class Institut
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $Institut_id = null;

    #[ORM\Column(length: 15, nullable: true)]
    private ?string $nomi = null;

    #[ORM\OneToMany(targetEntity: Etudiant::class, mappedBy: 'instit', orphanRemoval: true)]
    private Collection $etudiantq;

    public function __construct()
    {
        $this->etudiantq = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInstitutId(): ?int
    {
        return $this->Institut_id;
    }

    public function setInstitutId(int $Institut_id): static
    {
        $this->Institut_id = $Institut_id;

        return $this;
    }

    public function getNomi(): ?string
    {
        return $this->nomi;
    }

    public function setNomi(?string $nomi): static
    {
        $this->nomi = $nomi;

        return $this;
    }

    /**
     * @return Collection<int, Etudiant>
     */
    public function getEtudiantq(): Collection
    {
        return $this->etudiantq;
    }

    public function addEtudiantq(Etudiant $etudiantq): static
    {
        if (!$this->etudiantq->contains($etudiantq)) {
            $this->etudiantq->add($etudiantq);
            $etudiantq->setInstit($this);
        }

        return $this;
    }

    public function removeEtudiantq(Etudiant $etudiantq): static
    {
        if ($this->etudiantq->removeElement($etudiantq)) {
            // set the owning side to null (unless already changed)
            if ($etudiantq->getInstit() === $this) {
                $etudiantq->setInstit(null);
            }
        }

        return $this;
    }
}
