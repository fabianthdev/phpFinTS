<?php
/** @noinspection PhpUnused */

namespace Fhp\Model;

/**
 * Note: This account information is obtained from the HIUPD contained in the UPD data, but it lacks the BIC.
 */
class Account
{
    /** @var string|null */
    protected $id;
    /** @var string|null */
    protected $accountNumber;
    /** @var string|null */
    protected $bankCode;
    /** @var string|null */
    protected $iban;
    /** @var string|null */
    protected $customerId;
    /** @var string|null */
    protected $currency;
    /** @var string|null */
    protected $accountOwnerName;
    /** @var string|null */
    protected $accountDescription;
    /** 
     * 1 – 9: Kontokorrent-/Girokonto
     * 10 – 19: Sparkonto
     * 20 – 29: Festgeldkonto (Termineinlagen)
     * 30 – 39: Wertpapierdepot
     * 40 – 49: Kredit-/Darlehenskonto
     * 50 – 59: Kreditkartenkonto
     * 60 – 69: Fonds-Depot bei einer Kapitalanlagegesellschaft
     * 70 – 79: Bausparvertrag
     * 80 – 89: Versicherungsvertrag
     * 90 – 99: Sonstige (nicht zuordenbar)
     * (see )
     * @var int|null
     */
    protected $accountType;

    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return $this
     */
    public function setId(?string $id)
    {
        $this->id = $id;

        return $this;
    }

    public function getAccountNumber(): ?string
    {
        return $this->accountNumber;
    }

    /**
     * @return $this
     */
    public function setAccountNumber(?string $accountNumber)
    {
        $this->accountNumber = $accountNumber;

        return $this;
    }

    public function getBankCode(): ?string
    {
        return $this->bankCode;
    }

    /**
     * @return $this
     */
    public function setBankCode(?string $bankCode)
    {
        $this->bankCode = $bankCode;

        return $this;
    }

    public function getIban(): ?string
    {
        return $this->iban;
    }

    /**
     * @return $this
     */
    public function setIban(?string $iban)
    {
        $this->iban = $iban;

        return $this;
    }

    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    /**
     * @return $this
     */
    public function setCustomerId(?string $customerId)
    {
        $this->customerId = $customerId;

        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @return $this
     */
    public function setCurrency(?string $currency)
    {
        $this->currency = $currency;

        return $this;
    }

    public function getAccountOwnerName(): ?string
    {
        return $this->accountOwnerName;
    }

    /**
     * @return $this
     */
    public function setAccountOwnerName(?string $accountOwnerName)
    {
        $this->accountOwnerName = $accountOwnerName;

        return $this;
    }

    public function getAccountDescription(): ?string
    {
        return $this->accountDescription;
    }

    /**
     * @return $this
     */
    public function setAccountDescription(?string $accountDescription)
    {
        $this->accountDescription = $accountDescription;

        return $this;
    }

    public function getAccountType(): ?int
    {
        return $this->accountType;
    }

    /**
     * @return $this
     */
    public function setAccountType(?int $accountType)
    {
        $this->accountType = $accountType;

        return $this;
    }
}
