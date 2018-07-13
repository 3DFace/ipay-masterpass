<?php

namespace dface\IPayMasterPass;

class IPaySystemTimeService implements IPayTimeService
{

	public function getCurrentTime() : \DateTimeImmutable
	{
		try{
			return new \DateTimeImmutable();
		}catch (\Exception $e){
			throw new \RuntimeException('Can\'t get system time: '.$e->getMessage(), 0, $e);
		}
	}

}
