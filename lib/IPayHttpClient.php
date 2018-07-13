<?php

namespace dface\IPayMasterPass;

interface IPayHttpClient
{

	/**
	 * @param string $api_url
	 * @param string $request
	 * @return string
	 * @throws IPayHttpClientError
	 */
	public function post(string $api_url, string $request) : string;

}
