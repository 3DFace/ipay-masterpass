<?php

namespace dface\IPayMasterPass;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class IPayGuzzleClient implements IPayHttpClient
{

	/** @var Client */
	private $client;

	/**
	 * @param Client $client
	 */
	public function __construct(Client $client)
	{
		$this->client = $client;
	}

	/**
	 * @param string $api_url
	 * @param string $json_request
	 * @return string
	 * @throws IPayHttpClientError
	 */
	public function post(string $api_url, string $json_request) : string
	{
		try{
			$response = $this->client->request('POST', $api_url, [
				'body' => $json_request,
			]);
			$response_json = $response->getBody()->getContents();
		}catch (\Exception|GuzzleException $e){
			throw new IPayHttpClientError('POST failed: '.$e->getMessage(), 0, $e);
		}

		$status_code = $response->getStatusCode();
		if ($status_code !== 200) {
			throw new IPayHttpClientError("Unexpected HTTP status: $status_code: ".$response->getReasonPhrase());
		}

		return $response_json;
	}

}
