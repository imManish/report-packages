<?php 
namespace Impression\Report\Resources;
use Impression\Report\Resources\Traits\CreateTrait;

class Build extends AbstractResource
{

    use CreateTrait;

    public function extract(array $query = null)
    {
        return  $this->report()->request('GET',$this->endpoint(),null,$query);
    }
}
