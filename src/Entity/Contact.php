<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactRepository")
 * @ORM\Table(indexes={
 *         @ORM\Index(name="idxNom", columns={"nom"}),
 *         @ORM\Index(name="idxMail", columns={"email"})
 *     })
 */
class Contact
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=200, nullable=false),
     * @Assert\Length(
     *      min = 2,
     *      max = 200,
     *      minMessage = "Le nom doit être composé d'au moins {{ limit }}  caracères",
     *      maxMessage = "Le nom doit être composé d'au maximum {{ limit }} caractères")
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=200, nullable=false),
     * @Assert\Length(
     *      min = 2,
     *      max = 200,
     *      minMessage = "Le prénom doit être composé d'au moins {{ limit }}  caracères",
     *      maxMessage = "Le prénom doit être composé d'au maximum {{ limit }} caractères")
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=20, nullable=false),
     * @Assert\Regex(
     *     pattern="/(([+][(]?[0-9]{1,3}[)]?)|([(]?[0-9]{4}[)]?))\s*[)]?[-\s\.]?[(]?[0-9]{1,3}[)]?([-\s\.]?[0-9]{3})([-\s\.]?[0-9]{3,4})/",
     *     match=true,
     *     message="Le numéro de téléphone doit être saisi au format international, ex : +336000000000"
     * )
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255, nullable=false),
     * @Assert\Email(
     *     message = "L'email '{{ value }}' n'est pas valide.",
     * )
     */
    private $email;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $retraite;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $commentaire;

    /**
     * @ORM\Column(type="blob", nullable=true)
     */
    private $photo_de_profil;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $date_creation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_archivage;

    /**
     * @ORM\ManyToOne(targetEntity="CarnetAdresse", inversedBy="contacts")
     * @ORM\JoinColumn(name="carnet_adresse_code", referencedColumnName="code", nullable=false)
     */
    private $carnetAdresse;

    /**
     * @ORM\ManyToOne(targetEntity="Profession", inversedBy="contacts")
     * @ORM\JoinColumn(name="profession_code", referencedColumnName="code")
     */
    private $profession;

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code): void
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone): void
    {
        $this->telephone = $telephone;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getRetraite()
    {
        return $this->retraite;
    }

    /**
     * @param mixed $retraite
     */
    public function setRetraite($retraite): void
    {
        $this->retraite = $retraite;
    }

    /**
     * @return mixed
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * @param mixed $commentaire
     */
    public function setCommentaire($commentaire): void
    {
        $this->commentaire = $commentaire;
    }

    /**
     * @return mixed
     */
    public function getPhotoDeProfil()
    {
        return $this->photo_de_profil;
    }

    /**
     * @param mixed $photo_de_profil
     */
    public function setPhotoDeProfil($photo_de_profil): void
    {
        $this->photo_de_profil = $photo_de_profil;
    }

    public function getPhotoDeProfilBase64()
    {
        if($this->getPhotoDeProfil()!=null)
        {
            if(gettype($this->getPhotoDeProfil())=="string")
            {
                return base64_encode($this->getPhotoDeProfil());
            }
            else
            {
                return base64_encode(stream_get_contents($this->getPhotoDeProfil()));
            }
        }
        else
            return "";
    }

    /**
     * @return mixed
     */
    public function getDateCreation()
    {
        return $this->date_creation;
    }

    /**
     * @param mixed $date_creation
     */
    public function setDateCreation($date_creation): void
    {
        $this->date_creation = $date_creation;
    }

    /**
     * @return mixed
     */
    public function getDateArchivage()
    {
        return $this->date_archivage;
    }

    /**
     * @param mixed $date_archivage
     */
    public function setDateArchivage($date_archivage): void
    {
        $this->date_archivage = $date_archivage;
    }

    /**
     * @return mixed
     */
    public function getCarnetAdresse()
    {
        return $this->carnetAdresse;
    }

    /**
     * @param mixed $carnetAdresse
     */
    public function setCarnetAdresse($carnetAdresse): void
    {
        $this->carnetAdresse = $carnetAdresse;
    }

    /**
     * @return mixed
     */
    public function getProfession()
    {
        return $this->profession;
    }

    /**
     * @param mixed $profession
     */
    public function setProfession($profession): void
    {
        $this->profession = $profession;
    }
    /**
     * @var string
     *
     * @Assert\Image(
     *     minWidth = 200,
     *     maxWidth = 400,
     *     minHeight = 200,
     *     maxHeight = 400
     * )
     *
     */
    private $picture;

    public function setPicture($picture = null)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }
}