<?php

namespace App\Entity;

use App\Repository\GarbageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GarbageRepository::class)
 */
class Garbage
{

    const NOMENCLATURE = [
        1 => 'Dechets provenant de lexploration et de lexploitation des mines et des carrieres ainsi que du traitement physique et chimique des mineraux',
        2 => 'Dechets provenant de lagriculture, de lhorticulture, de laquaculture, de la sylviculture, de la chasse et de la peche ainsi que de la preparation et de la transformation des aliments',
        3 => 'Dechets provenant de la transformation du bois et de la production de panneaux et de meubles, de pate a papier, de papier et de carton',
        4 => 'Dechets provenant des industries du cuir, de la fourrure et du textile',
        5 => 'Dechets provenant du raffinage du petrole, de la purification du gaz naturel et du traitement pyrolytique du charbon',
        6 => 'Dechets des procedes de la chimie minerale',
        7 => 'Dechets des procedes de la chimie organique',
        8 => 'Dechets provenant de la fabrication, de la formulation, de la distribution et de lutilisation(FFDU) de produits de revetement (peintures, vernis et emaux vitrifies), mastics et encres dimpression',
        9 => 'Dechets provenant de lindustrie photographique',
        10 => 'Dechets provenant de procedes thermiques',
        11 => 'Dechets provenant du traitement chimique de surface et du revetement des metaux et autres materiaux, et de lhydrometallurgie des metaux non ferreux',
        12 => 'Dechets provenant de la mise en forme et du traitement physique et mecanique de surface des metaux et matieres plastiques',
        13 => 'Huiles et combustibles liquides usages (sauf huiles alimentaires et huiles figurant aux chapitres 05 et 12)',
        14 => 'Dechets de solvants organiques, dagents refrigerants et propulseurs (sauf chapitres 07 et 08)',
        15 => 'Emballages et dechets demballages; absorbants, chiffons dessuyage, materiaux filtrants et vêtements de protection non specifies ailleurs',
        16 => 'Dechets non decrits ailleurs sur la liste',
        17 => 'Dechets de construction et de demolition (y compris deblais provenant de sites contamines)',
        18 => 'Dechets provenant des soins medicaux ou veterinaires et/ou de la recherche associee (sauf dechets de cuisine et de restauration ne provenant pas directement des soins medicaux)',
        19 => 'Dechets provenant des installations de gestion des dechets, des stations depuration des eaux usees hors site et de la preparation deau destinee a la consommation humaine et deau a usage industriel',
        20 => 'Dechets municipaux (dechets menagers et dechets assimiles provenant des commerces, des industries et des administrations), y compris les fractions collectees separement'
    ];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $reference;

    /**
     * @ORM\Column(type="integer")
     */
    private $weight;

    /**
     * @ORM\Column(type="integer")
     */
    private $nomenclature;

    /**
     * @ORM\Column(type="date")
     */
    private $creation;

    /**
     * @ORM\Column(type="date")
     */
    private $request;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getReference(): ?int
    {
        return $this->reference;
    }

    public function setReference(int $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getNomenclature(): ?int
    {
        return $this->nomenclature;
    }

    public function setNomenclature(int $nomenclature): self
    {
        $this->nomenclature = $nomenclature;

        return $this;
    }

    public function getCreation(): ?\DateTimeInterface
    {
        return $this->creation = new \DateTime();
    }

    public function setCreation(\DateTimeInterface $creation): self
    {
        $this->creation = $creation;

        return $this;
    }

    public function getRequest(): ?\DateTimeInterface
    {
        return $this->request;
    }

    public function setRequest(\DateTimeInterface $request): self
    {
        $this->request = $request;

        return $this;
    }
}
