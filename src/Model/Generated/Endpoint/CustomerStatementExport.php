<?php
namespace bunq\Model\Generated\Endpoint;

use bunq\Http\ApiClient;
use bunq\Http\BunqResponse;
use bunq\Model\Core\BunqModel;
use bunq\Model\Generated\Object\LabelMonetaryAccount;

/**
 * Used to create new and read existing statement exports. Statement exports
 * can be created in either CSV, MT940 or PDF file format.
 *
 * @generated
 */
class CustomerStatementExport extends BunqModel
{
    /**
     * Endpoint constants.
     */
    const ENDPOINT_URL_CREATE = 'user/%s/monetary-account/%s/customer-statement';
    const ENDPOINT_URL_READ = 'user/%s/monetary-account/%s/customer-statement/%s';
    const ENDPOINT_URL_LISTING = 'user/%s/monetary-account/%s/customer-statement';
    const ENDPOINT_URL_DELETE = 'user/%s/monetary-account/%s/customer-statement/%s';

    /**
     * Field constants.
     */
    const FIELD_STATEMENT_FORMAT = 'statement_format';
    const FIELD_DATE_START = 'date_start';
    const FIELD_DATE_END = 'date_end';
    const FIELD_REGIONAL_FORMAT = 'regional_format';

    /**
     * Object type.
     */
    const OBJECT_TYPE_GET = 'CustomerStatementExport';

    /**
     * The id of the customer statement model.
     *
     * @var int
     */
    protected $id;

    /**
     * The timestamp of the statement model's creation.
     *
     * @var string
     */
    protected $created;

    /**
     * The timestamp of the statement model's last update.
     *
     * @var string
     */
    protected $updated;

    /**
     * The date from when this statement shows transactions.
     *
     * @var string
     */
    protected $dateStart;

    /**
     * The date until which statement shows transactions.
     *
     * @var string
     */
    protected $dateEnd;

    /**
     * The status of the export.
     *
     * @var string
     */
    protected $status;

    /**
     * MT940 Statement number. Unique per monetary account.
     *
     * @var int
     */
    protected $statementNumber;

    /**
     * The format of statement.
     *
     * @var string
     */
    protected $statementFormat;

    /**
     * The regional format of a CSV statement.
     *
     * @var string
     */
    protected $regionalFormat;

    /**
     * The monetary account for which this statement was created.
     *
     * @var LabelMonetaryAccount
     */
    protected $aliasMonetaryAccount;

    /**
     * @param string $statementFormat     The format type of statement. Allowed
     *                                    values: MT940, CSV, PDF.
     * @param string $dateStart           The start date for making statements.
     * @param string $dateEnd             The end date for making statements.
     * @param int|null $monetaryAccountId
     * @param string|null $regionalFormat Required for CSV exports. The regional
     *                                    format of the statement, can be UK_US (comma-separated) or EUROPEAN
     *                                    (semicolon-separated).
     * @param string[] $customHeaders
     *
     * @return BunqResponseInt
     */
    public static function create(
        string $statementFormat,
        string $dateStart,
        string $dateEnd,
        int $monetaryAccountId = null,
        string $regionalFormat = null,
        array $customHeaders = []
    ): BunqResponseInt {
        $apiClient = new ApiClient(static::getApiContext());
        $responseRaw = $apiClient->post(
            vsprintf(
                self::ENDPOINT_URL_CREATE,
                [static::determineUserId(), static::determineMonetaryAccountId($monetaryAccountId)]
            ),
            [
                self::FIELD_STATEMENT_FORMAT => $statementFormat,
                self::FIELD_DATE_START => $dateStart,
                self::FIELD_DATE_END => $dateEnd,
                self::FIELD_REGIONAL_FORMAT => $regionalFormat,
            ],
            $customHeaders
        );

        return BunqResponseInt::castFromBunqResponse(
            static::processForId($responseRaw)
        );
    }

    /**
     * @param int $customerStatementExportId
     * @param int|null $monetaryAccountId
     * @param string[] $customHeaders
     *
     * @return BunqResponseCustomerStatementExport
     */
    public static function get(
        int $customerStatementExportId,
        int $monetaryAccountId = null,
        array $customHeaders = []
    ): BunqResponseCustomerStatementExport {
        $apiClient = new ApiClient(static::getApiContext());
        $responseRaw = $apiClient->get(
            vsprintf(
                self::ENDPOINT_URL_READ,
                [
                    static::determineUserId(),
                    static::determineMonetaryAccountId($monetaryAccountId),
                    $customerStatementExportId,
                ]
            ),
            [],
            $customHeaders
        );

        return BunqResponseCustomerStatementExport::castFromBunqResponse(
            static::fromJson($responseRaw, self::OBJECT_TYPE_GET)
        );
    }

    /**
     * This method is called "listing" because "list" is a restricted PHP word
     * and cannot be used as constants, class names, function or method names.
     *
     * @param int|null $monetaryAccountId
     * @param string[] $params
     * @param string[] $customHeaders
     *
     * @return BunqResponseCustomerStatementExportList
     */
    public static function listing(
        int $monetaryAccountId = null,
        array $params = [],
        array $customHeaders = []
    ): BunqResponseCustomerStatementExportList {
        $apiClient = new ApiClient(static::getApiContext());
        $responseRaw = $apiClient->get(
            vsprintf(
                self::ENDPOINT_URL_LISTING,
                [static::determineUserId(), static::determineMonetaryAccountId($monetaryAccountId)]
            ),
            $params,
            $customHeaders
        );

        return BunqResponseCustomerStatementExportList::castFromBunqResponse(
            static::fromJsonList($responseRaw, self::OBJECT_TYPE_GET)
        );
    }

    /**
     * @param string[] $customHeaders
     * @param int $customerStatementExportId
     *
     * @return BunqResponseNull
     */
    public static function delete(
        int $customerStatementExportId,
        int $monetaryAccountId = null,
        array $customHeaders = []
    ): BunqResponseNull {
        $apiClient = new ApiClient(static::getApiContext());
        $responseRaw = $apiClient->delete(
            vsprintf(
                self::ENDPOINT_URL_DELETE,
                [
                    static::determineUserId(),
                    static::determineMonetaryAccountId($monetaryAccountId),
                    $customerStatementExportId,
                ]
            ),
            $customHeaders
        );

        return BunqResponseNull::castFromBunqResponse(
            new BunqResponse(null, $responseRaw->getHeaders())
        );
    }

    /**
     * The id of the customer statement model.
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
     * The timestamp of the statement model's creation.
     *
     * @return string
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param string $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * The timestamp of the statement model's last update.
     *
     * @return string
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param string $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    /**
     * The date from when this statement shows transactions.
     *
     * @return string
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param string $dateStart
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;
    }

    /**
     * The date until which statement shows transactions.
     *
     * @return string
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param string $dateEnd
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;
    }

    /**
     * The status of the export.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * MT940 Statement number. Unique per monetary account.
     *
     * @return int
     */
    public function getStatementNumber()
    {
        return $this->statementNumber;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param int $statementNumber
     */
    public function setStatementNumber($statementNumber)
    {
        $this->statementNumber = $statementNumber;
    }

    /**
     * The format of statement.
     *
     * @return string
     */
    public function getStatementFormat()
    {
        return $this->statementFormat;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param string $statementFormat
     */
    public function setStatementFormat($statementFormat)
    {
        $this->statementFormat = $statementFormat;
    }

    /**
     * The regional format of a CSV statement.
     *
     * @return string
     */
    public function getRegionalFormat()
    {
        return $this->regionalFormat;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param string $regionalFormat
     */
    public function setRegionalFormat($regionalFormat)
    {
        $this->regionalFormat = $regionalFormat;
    }

    /**
     * The monetary account for which this statement was created.
     *
     * @return LabelMonetaryAccount
     */
    public function getAliasMonetaryAccount()
    {
        return $this->aliasMonetaryAccount;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param LabelMonetaryAccount $aliasMonetaryAccount
     */
    public function setAliasMonetaryAccount($aliasMonetaryAccount)
    {
        $this->aliasMonetaryAccount = $aliasMonetaryAccount;
    }

    /**
     * @return bool
     */
    public function isAllFieldNull()
    {
        if (!is_null($this->id)) {
            return false;
        }

        if (!is_null($this->created)) {
            return false;
        }

        if (!is_null($this->updated)) {
            return false;
        }

        if (!is_null($this->dateStart)) {
            return false;
        }

        if (!is_null($this->dateEnd)) {
            return false;
        }

        if (!is_null($this->status)) {
            return false;
        }

        if (!is_null($this->statementNumber)) {
            return false;
        }

        if (!is_null($this->statementFormat)) {
            return false;
        }

        if (!is_null($this->regionalFormat)) {
            return false;
        }

        if (!is_null($this->aliasMonetaryAccount)) {
            return false;
        }

        return true;
    }
}
