<?php

namespace App\Repositories;


use Elasticsearch\ClientBuilder;

/**
 * 
 */
class ElasticSearchRepository
{
	
	function __construct()
	{
		
	}

	/**
	 * 
	 * @param  $_name index name
	 * @param  $data
	 * @return 
	 */
	public static function createIndex($name, $id = null, $data)
	{
		$client = ClientBuilder::create()->build();

        $params = [
            'index' => $name,
            'body'  => $data
        ];

        if(!is_null($id)){
        	$params['id'] = $id;
        }

        return $client->index($params);
	}

	/**
	 * 
	 * @param  $name
	 * @param  $id 
	 * @param  $data
	 * @return mixed
	 */
	public static function updateIndex($name, $id, $data)
	{
		$client = ClientBuilder::create()->build();

        $params = [
            'index' => $name,
            'body'  => ['doc' => $data],
            'id' => $id
        ];

        return $client->update($params);
	}

	/**
	 * 
	 * @param $searchParameters
	 * @return
	 */
	public static function search($indexName, $searchParameters)
	{
		$client = ClientBuilder::create()->build();

		$params = [
            'index' => $indexName,
            'body'  => $searchParameters
        ];

        $results = $client->search($params);
     	if (isset($results['hits']['hits'])) {
     	   	return $results['hits']['hits'];
     	} else {
     		return [];
     	}
	}
}