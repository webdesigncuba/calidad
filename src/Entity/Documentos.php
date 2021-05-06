<?php

namespace App\Entity;

use App\Repository\DocumentosRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=DocumentosRepository::class)
 * @Vich\Uploadable
 */
class Documentos
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\ManyToOne(targetEntity=TipoDoc::class, inversedBy="documentos")
     */
    private $tipo;

    /**
     * @ORM\ManyToOne(targetEntity=Area::class, inversedBy="documentos")
     */
    private $area;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Unique(message="Error {{value}} repetido")
     */
    private $documento;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estado;

    /**
     * @Vich\UploadableField(mapping="documento", fileNameProperty="documento")
     * @var file
     */
    private $documentoFile;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updateAt;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getTipo(): ?TipoDoc
    {
        return $this->tipo;
    }

    public function setTipo(?TipoDoc $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getArea(): ?Area
    {
        return $this->area;
    }

    public function setArea(?Area $area): self
    {
        $this->area = $area;

        return $this;
    }

    public function getDocumento(): ?string
    {
        return $this->documento;
    }

    public function setDocumento(string $documento): self
    {
        $this->documento = $documento;

        return $this;
    }

    public function getEstado(): ?bool
    {
        return $this->estado;
    }

    public function setEstado(bool $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function setDocumentoFile(File $documento = null)
    {
        $this->documentoFile = $documento;
        if($documento){
            $this->updateAt = new \DateTime('now');
        }
    }

    public function getDocumentoFile()
    {
        return $this->documentoFile;
    }
}
