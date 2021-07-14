<?php

namespace dface\IPayMasterPass;

class ActionListResponse implements \JsonSerializable
{

	/** @var CardInfo[] */
	private array $cards;

	public function __construct(array $cards)
	{
		$this->cards = $cards;
	}

	/**
	 * @return array
	 * @throws \InvalidArgumentException
	 */
	public function jsonSerialize() : array
	{
		return \array_map(static function (CardInfo $view) {
			return $view->jsonSerialize();
		}, $this->cards);
	}

	/**
	 * @return CardInfo[]
	 */
	public function getCards() : array
	{
		return $this->cards;
	}

	/**
	 * @param array $list
	 * @return ActionListResponse
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(array $list) : ActionListResponse
	{
		$cards = \array_map(static function (array $arr) {
			return CardInfo::deserialize($arr);
		}, $list);
		return new self($cards);
	}

}
