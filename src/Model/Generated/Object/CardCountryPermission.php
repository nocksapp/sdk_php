<?php
namespace bunq\Model\Generated\Object;

use bunq\Model\Core\BunqModel;

/**
 * @generated
 */
class CardCountryPermission extends BunqModel
{
    /**
     * The country to allow transactions in (e.g. NL, DE).
     *
     * @var string
     */
    protected $country;

    /**
     * Expiry time of this rule.
     *
     * @var string
     */
    protected $expiryTime;

    /**
     * The id of the card country permission entry.
     *
     * @var int
     */
    protected $id;

    /**
     * @param string $country         The country to allow transactions in (e.g. NL,
     *                                DE).
     * @param string|null $expiryTime Expiry time of this rule.
     */
    public function __construct(string $country, string $expiryTime = null)
    {
        $this->country = $country;
        $this->expiryTime = $expiryTime;
    }

    /**
     * The id of the card country permission entry.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * The country to allow transactions in (e.g. NL, DE).
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * Expiry time of this rule.
     *
     * @return string
     */
    public function getExpiryTime()
    {
        return $this->expiryTime;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param string $expiryTime
     */
    public function setExpiryTime($expiryTime)
    {
        $this->expiryTime = $expiryTime;
    }

    /**
     * @return bool
     */
    public function isAllFieldNull()
    {
        if (!is_null($this->id)) {
            return false;
        }

        if (!is_null($this->country)) {
            return false;
        }

        if (!is_null($this->expiryTime)) {
            return false;
        }

        return true;
    }
}
