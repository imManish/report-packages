<?php 
namespace Impression\Report;

use Impression\Report\Resources\Build;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Report extends Eloquent 
{
    /**
     * This used to set report type through the session variable
     * 
     * @var string
     */
    public $string = 'session';

    /**
     * @return 
     */
    public function __construct()
    {
       
        $this->setupResources();
    }

    /**
     * @internal
     */
    private function setupResources()
    {
        //Report Build
        $this->build = new Build($this);
        
    }

    /**
     * This used to accept request from calling endpoint
     * 
     * @return array 
     * */    
    public function request($method, $endpoint, array $data = null, array $query = null)
    {
        
        $options = ['json' => $data];

        if (isset($query)) {
            $options['query'] = $query;
        }

        
        return $this->performRequest($method, $options);
    }

    
    private function performRequest($method, $options) {
        #echo '<pre>'; print_r($options); exit;
        try {
            switch ($method) {
                case 'GET':
                    return json_decode('{"data":{"name":"first report","title":"Online Web Tools" ,"id": 1}}');
            
                default:
                    return null;
            }
        } catch (RequestException $e) {
            throw RepotException::create($e);
        }
    }
}