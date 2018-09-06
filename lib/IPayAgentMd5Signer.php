<?php
/* author: Ponomarev Denis <ponomarev@gmail.com> */

namespace dface\IPayMasterPass;

class IPayAgentMd5Signer implements IPayAgentSigner
{

	/** @var AgentSettings */
	private $settings;

	public function __construct(AgentSettings $settings)
	{
		$this->settings = $settings;
	}

	public function sign(\DateTimeImmutable $time) : string
	{
		return md5($time->format('Y-m-d H:i:s').$this->settings->getSignKey());
	}

}
