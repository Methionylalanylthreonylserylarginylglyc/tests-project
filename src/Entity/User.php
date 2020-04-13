<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    private const MAX_NAME_LENGTH = 100;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $phoneNumber;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function isUserNameValid()
    {
        if(false == $this->isUserNameNotEmpty() || false == $this->isUserNameLengthTooLong()) {
            return false;
        }
        return true;
    }

    public function isUserNameNotEmpty()
    {
        if(empty($this->getLastName()) || empty($this->getFirstName())) {
            return false; //TODO Exception
        }
        return true;
    }

    public function isUserNameLengthTooLong()
    {
        if(strlen($this->getLastName()) > self::MAX_NAME_LENGTH || strlen($this->getFirstName()) > self::MAX_NAME_LENGTH) {
            return false; //TODO Exception
        }
        return true;
    }

    public function isUserEmailValid()
    {
        if (!filter_var($this->getEmail(), FILTER_VALIDATE_EMAIL)) {
            return false; //TODO Exception
        }
        return true;
    }

    public function isUserPhoneNumberValid()
    {
        if (!is_numeric($this->getPhoneNumber())) {
            return false; //TODO Exception
        }
        return true;
    }

}
