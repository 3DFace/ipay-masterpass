<?php
/* author: Ponomarev Denis <ponomarev@gmail.com> */

namespace dface\IPayMasterPass;

class IPayAgentSha512Signer implements IPayAgentSigner
{

	/** @var AgentSettings */
	private $settings;

	public function __construct(AgentSettings $settings)
	{
		$this->settings = $settings;
	}

	public function sign(\DateTimeImmutable $time) : string
	{
		$str = $this->settings->getMerchantId()
			.$this->settings->getSignKey()
			.$time->format('Y-m-d H:i:s');
		return hash('sha512', $str);
	}

}
