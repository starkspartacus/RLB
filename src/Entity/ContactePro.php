<?php

namespace App\Entity;

use App\Repository\ContacteProRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContacteProRepository::class)]
class ContactePro
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $prenomspro;

    #[ORM\Column(type: 'string', length: 255)]
    private $NomPro;

    #[ORM\Column(type: 'string', length: 255)]
    private $EmailPro;

    #[ORM\Column(type: 'string', length: 255)]
    private $TelephonePro;

    #[ORM\Column(type: 'text')]
    private $MessagePro;

    #[ORM\Column(type: 'string', length: 255)]
    private $FichiersPro;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenomspro(): ?string
    {
        return $this->prenomspro;
    }

    public function setPrenomspro(string $prenomspro): self
    {
        $this->prenomspro = $prenomspro;

        return $this;
    }

    public function getNomPro(): ?string
    {
        return $this->NomPro;
    }

    public function setNomPro(string $NomPro): self
    {
        $this->NomPro = $NomPro;

        return $this;
    }

    public function getEmailPro(): ?string
    {
        return $this->EmailPro;
    }

    public function setEmailPro(string $EmailPro): self
    {
        $this->EmailPro = $EmailPro;

        return $this;
    }

    public function getTelephonePro(): ?string
    {
        return $this->TelephonePro;
    }

    public function setTelephonePro(string $TelephonePro): self
    {
        $this->TelephonePro = $TelephonePro;

        return $this;
    }

    public function getMessagePro(): ?string
    {
        return $this->MessagePro;
    }

    public function setMessagePro(string $MessagePro): self
    {
        $this->MessagePro = $MessagePro;

        return $this;
    }

    public function getFichiersPro(): ?string
    {
        return $this->FichiersPro;
    }

    public function setFichiersPro(string $FichiersPro): self
    {
        $this->FichiersPro = $FichiersPro;

        return $this;
    }
}
