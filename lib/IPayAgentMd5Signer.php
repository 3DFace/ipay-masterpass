<?php

namespace dface\IPayMasterPass;

class IPayAgentMd5Signer implements IPayAgentSigner
{

	private AgentSettings $settings;

	public function __construct(AgentSettings $settings)
	{
		$this->settings = $settings;
	}

	public function sign(\DateTimeImmutable $time) : string
	{
		return \md5($time->format('Y-m-d H:i:s').$this->settings->getSignKey());
	}

}
