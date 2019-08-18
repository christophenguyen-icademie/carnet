<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarnetAdresseRepository")
 */
class CarnetAdresse
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", length=0)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity="Contact", mappedBy="carnetAdresse",cascade={"persist"})
     */
    private $contacts;

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
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle): void
    {
        $this->libelle = $libelle;
    }

    /**
     * @return mixed
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * @param mixed $contacts
     */
    public function setContacts($contacts): void
    {
        $this->contacts = $contacts;
    }

    public function addContact($contact)
    {
        $this->contacts[] = $contact;
        return $this;
    }
}