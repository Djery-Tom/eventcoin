<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TransactionRepository")
 */
class Transaction
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $initiatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Account", inversedBy="transactions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sender;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Account", inversedBy="transactions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $receiver;

    /**
     * @ORM\Column(type="float")
     */
    private $amount;

    /**
     * @ORM\Column(type="float")
     */
    private $senderBalanceBefore;

    /**
     * @ORM\Column(type="float")
     */
    private $receiverBalanceBefore;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInitiatedAt(): ?\DateTimeInterface
    {
        return $this->initiatedAt;
    }

    public function setInitiatedAt(\DateTimeInterface $initiatedAt): self
    {
        $this->initiatedAt = $initiatedAt;

        return $this;
    }

    public function getSender(): ?Account
    {
        return $this->sender;
    }

    public function setSender(?Account $sender): self
    {
        $this->sender = $sender;

        return $this;
    }

    public function getReceiver(): ?Account
    {
        return $this->receiver;
    }

    public function setReceiver(?Account $receiver): self
    {
        $this->receiver = $receiver;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getSenderBalanceBefore(): ?float
    {
        return $this->senderBalanceBefore;
    }

    public function setSenderBalanceBefore(float $senderBalanceBefore): self
    {
        $this->senderBalanceBefore = $senderBalanceBefore;

        return $this;
    }

    public function getReceiverBalanceBefore(): ?float
    {
        return $this->receiverBalanceBefore;
    }

    public function setReceiverBalanceBefore(float $receiverBalanceBefore): self
    {
        $this->receiverBalanceBefore = $receiverBalanceBefore;

        return $this;
    }
}
