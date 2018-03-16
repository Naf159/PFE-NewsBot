<?php

namespace App\Entity;

use App\Entity\Actualite;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SourceRepository")
 */
class Source
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
    private $nom_site;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url_site;

    /**
     * @return mixed
     */
    public function getUrlActualite()
    {
        return $this->url_actualite;
    }

    /**
     * @param mixed $url_actualite
     */
    public function setUrlActualite($url_actualite): void
    {
        $this->url_actualite = $url_actualite;
    }

    /**
     * @@ORM\Column(type="string", length=255)
     *
     */

    private $url_actualite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description_site;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $categorie_site;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pattern_titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pattern_description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pattern_page_suivante;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pattern_lien_actualite;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $pattern_image;

    /**
     * @ORM\Column(type="date",nullable=true)
     */
    private $pattern_date_pub;
    /**
     * @ORM\Column(type="date",nullable=true)
     */
    private $pattern_date_modif;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Actualite", mappedBy="source")
     */
    private $actualites;

    public function __construct()
    {
        $this->actualites = new ArrayCollection();
    }

    /**
     * @return Collection|Actualite[]
     */
    public function getActualites()
    {
        return $this->actualites;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNomSite()
    {
        return $this->nom_site;
    }

    /**
     * @param mixed $nom_site
     */
    public function setNomSite($nom_site): void
    {
        $this->nom_site = $nom_site;
    }

    /**
     * @return mixed
     */
    public function getUrlSite()
    {
        return $this->url_site;
    }

    /**
     * @param mixed $url_site
     */
    public function setUrlSite($url_site): void
    {
        $this->url_site = $url_site;
    }

    /**
     * @return mixed
     */
    public function getDescriptionSite()
    {
        return $this->description_site;
    }

    /**
     * @param mixed $description_site
     */
    public function setDescriptionSite($description_site): void
    {
        $this->description_site = $description_site;
    }

    /**
     * @return mixed
     */
    public function getCategorieSite()
    {
        return $this->categorie_site;
    }

    /**
     * @param mixed $categorie_site
     */
    public function setCategorieSite($categorie_site): void
    {
        $this->categorie_site = $categorie_site;
    }

    /**
     * @return mixed
     */
    public function getPatternTitre()
    {
        return $this->pattern_titre;
    }

    /**
     * @param mixed $pattern_titre
     */
    public function setPatternTitre($pattern_titre): void
    {
        $this->pattern_titre = $pattern_titre;
    }

    /**
     * @return mixed
     */
    public function getPatternDescription()
    {
        return $this->pattern_description;
    }

    /**
     * @param mixed $pattern_description
     */
    public function setPatternDescription($pattern_description): void
    {
        $this->pattern_description = $pattern_description;
    }

    /**
     * @return mixed
     */
    public function getPatternPageSuivante()
    {
        return $this->pattern_page_suivante;
    }

    /**
     * @param mixed $pattern_page_suivante
     */
    public function setPatternPageSuivante($pattern_page_suivante): void
    {
        $this->pattern_page_suivante = $pattern_page_suivante;
    }

    /**
     * @return mixed
     */
    public function getPatternLienActualite()
    {
        return $this->pattern_lien_actualite;
    }

    /**
     * @param mixed $pattern_lien_actualite
     */
    public function setPatternLienActualite($pattern_lien_actualite): void
    {
        $this->pattern_lien_actualite = $pattern_lien_actualite;
    }

    /**
     * @return mixed
     */
    public function getPatternImage()
    {
        return $this->pattern_image;
    }

    /**
     * @param mixed $pattern_image
     */
    public function setPatternImage($pattern_image): void
    {
        $this->pattern_image = $pattern_image;
    }

    /**
     * @return mixed
     */
    public function getPatternDatePub()
    {
        return $this->pattern_date_pub;
    }

    /**
     * @param mixed $pattern_date_pub
     */
    public function setPatternDatePub($pattern_date_pub): void
    {
        $this->pattern_date_pub = $pattern_date_pub;
    }

    /**
     * @return mixed
     */
    public function getPatternDateModif()
    {
        return $this->pattern_date_modif;
    }

    /**
     * @param mixed $pattern_date_modif
     */
    public function setPatternDateModif($pattern_date_modif): void
    {
        $this->pattern_date_modif = $pattern_date_modif;
    }

    // add your own fields

}
