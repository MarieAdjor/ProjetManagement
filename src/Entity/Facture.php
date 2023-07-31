<?php

namespace App\Entity;

use App\Repository\FactureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FactureRepository::class)]
class Facture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'factures')]
    private ?Reservation $reservation_id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Frais = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReservationId(): ?Reservation
    {
        return $this->reservation_id;
    }

    public function setReservationId(?Reservation $reservation_id): static
    {
        $this->reservation_id = $reservation_id;

        return $this;
    }

    public function getFrais(): ?string
    {
        return $this->Frais;
    }

    public function setFrais(?string $Frais): static
    {
        $this->Frais = $Frais;

        return $this;
    }
}
