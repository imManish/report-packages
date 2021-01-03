<?php 
namespace Impression\Report;

use Impression\Report\Resources\Build;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Report extends Eloquent 
{
    /**
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
                case 'POST':
                    return json_decode($this->client->post($url, $options)->getBody(), true);
                case 'PUT':
                    return json_decode($this->client->put($url, $options)->getBody(), true);
                case 'DELETE':
                    return json_decode($this->client->delete($url, $options)->getBody(), true);
                default:
                    return null;
            }
        } catch (RequestException $e) {
            throw ApiException::create($e);
        }
    }
}