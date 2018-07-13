<?php

namespace dface\IPayMasterPass;

interface IPayTimeService
{

	public function getCurrentTime() : \DateTimeImmutable;

}
