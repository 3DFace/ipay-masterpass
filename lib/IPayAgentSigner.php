<?php
/* author: Ponomarev Denis <ponomarev@gmail.com> */

namespace dface\IPayMasterPass;

interface IPayAgentSigner
{

	public function sign(\DateTimeImmutable $time) : string;

}
