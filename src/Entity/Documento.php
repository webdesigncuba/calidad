<?php

namespace App\Entity;

use App\Repository\DocumentoRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=DocumentoRepository::class)
 * @Vich\Uploadable
 */
class Documento
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
    private $nombre;

    /**
     * @ORM\Column(type="date")
     */
    private $fechadoc;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estado;

    /**
     * @ORM\ManyToOne(targetEntity=Area::class, inversedBy="documentos")
     */
    private $area;

    /**
     * @ORM\ManyToOne(targetEntity=Tipo::class, inversedBy="documentos")
     */
    private $tipo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fichero;
    
    /**
     * @Vich\UploadableField(mapping="documentos", fileNameProperty="fichero" )
     * @var File
     *
     */
    private $ficheroFile;
    

    public function getId(): ?int
    {
        return $this->id;
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

    public function getFechadoc(): ?\DateTimeInterface
    {
        return $this->fechadoc;
    }

    public function setFechadoc(\DateTimeInterface $fechadoc): self
    {
        $this->fechadoc = $fechadoc;

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

    public function getArea(): ?Area
    {
        return $this->area;
    }

    public function setArea(?Area $area): self
    {
        $this->area = $area;

        return $this;
    }

    public function getTipo(): ?Tipo
    {
        return $this->tipo;
    }

    public function setTipo(?Tipo $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getFichero(): ?string
    {
        return $this->fichero;
    }

    public function setFichero(?string $fichero): self
    {
        $this->fichero = $fichero;

        return $this;
    }
    
    public function setFicheroFile(File $fichero)
    {
        $this->ficheroFile = $fichero;
        
        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
       // if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
       //     $this->updatedAt = new \DateTime('now');
       // }
    }
    
    public function getFicheroFile()
    {
        return $this->ficheroFile;
    }
    
}
