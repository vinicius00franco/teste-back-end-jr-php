<?php

namespace App\Entity;

use App\Repository\ConsultaRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: ConsultaRepository::class)]
class Consulta
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['consulta'])]
    private $id;

    #[ORM\Column(type: 'datetime')]
    #[Groups(['consulta'])]
    private $data;

    #[ORM\Column(type: 'string', length: 50)]
    #[Groups(['consulta'])]
    private $status;

    #[ORM\ManyToOne(targetEntity: Beneficiario::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    #[Groups(['consulta','beneficiario','medico'])]
    private $beneficiario;

    #[ORM\ManyToOne(targetEntity: Medico::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    #[Groups(['consulta','beneficiario','medico'])]
    private $medico;

    #[ORM\ManyToOne(targetEntity: Hospital::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    #[Groups(['consulta','beneficiario','medico'])]
    private $hospital;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDataNascimento(): ?\DateTimeInterface
    {
        return $this->data;
    }

    public function setDataNascimento(\DateTimeInterface $data): self
    {
        $this->data = $data;
        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getBeneficiario(): ?Beneficiario
    {
        return $this->beneficiario;
    }

    public function setBeneficiario(Beneficiario $beneficiario): self
    {
        $this->beneficiario = $beneficiario;
        return $this;
    }

    public function getMedico(): ?Medico
    {
        return $this->medico;
    }

    public function setMedico(Medico $medico): self
    {
        $this->medico = $medico;
        return $this;
    }

    public function getHospital(): ?Hospital
    {
        return $this->hospital;
    }

    public function setHospital(Hospital $hospital): self
    {
        $this->hospital = $hospital;
        return $this;
    }

    public function isConcluida(): bool
    {
        return $this->status === 'concluída';
    }
}
