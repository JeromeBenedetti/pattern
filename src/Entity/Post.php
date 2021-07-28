<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;
use Exception;

/**
 * @ORM\Entity
 * @ORM\Table(name="posts")
 * @ORM\HasLifecycleCallbacks
 */
class Post
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(name="message", type="string")
     * 
     * @var string
     */
    private $message;

    /**
     * @ORM\Column(name="created", type="datetime")
     * 
     * @var DateTime
     */
    private $created;

    /**
     * @ORM\Column(name="updated", type="datetime")
     * 
     * @var DateTime
     */
    private $updated;

    /**
     * @ORM\PrePersist
     * 
     * @throws Exception
     */
    public function onPrePersist(): void
    {
        $this->created = new DateTime('now');
    }

    /**
     * @ORM\PreUpdate
     * 
     * @throws Exception
     */
    public function onPreUpdate(): void
    {
        $this->updated = new DateTime('now');
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get the value of created
     */
    public function getCreated(): \DateTime
    {
        return $this->created;
    }

    /**
     * Get the value of updated
     */
    public function getUpdated(): ?\DateTime
    {
        return $this->updated;
    }
}
