<?php 
namespace Impression\Report\Resources;

use Impression\Report\Report;

/**
 * Abstract Resource
 *
 * Abstract class which all resources inherit from
 *
 * @internal
 * @package Api\Resources
 */
abstract class AbstractResource
{

    /**
     * @var report
     * @internal
     */
    private $report;

    /**
     * @var String
     * @internal
     */
    protected $endpoint;

    /**
     * Resource constructor
     *
     * Constructs a new resource
     *
     * @param Api $api
     * @internal
     *
     */
    public function __construct(Report $report)
    {
        $this->report = $report;
    }

    /**
     * Creates the endpoint
     *
     * @param null $id The endpoint terminator
     * @return string
     * @internal
     *
     */
    protected function endpoint($id = null)
    {
        return $id === null ? $this->endpoint : $this->endpoint . '/' . $id;
    }

    /**
     * @return Report
     * @internal
     */
    protected function report()
    {
        return $this->report;
    }
}