<?php
 
namespace Impression\Report\Resources\Traits;

trait CreateTrait 
{
     /**
     * @param null $end string
     * @return string
     * @internal
     */
    abstract protected function endpoint($end = null);

    /**
     * @return \Impression\Report\Report
     * @internal
     */
    abstract protected function report();

    /**
     * @return Report Data
     * 
     */
    public function get(array $query = null)
    {
        return $this->report()->request('GET',$this->endpoint(),null,$query);
    }
}
