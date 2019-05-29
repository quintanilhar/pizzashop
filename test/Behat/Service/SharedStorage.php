<?php

namespace Quintanilhar\PizzaShop\Test\Behat\Service;

use InvalidArgumentException;

class SharedStorage
{
	/**
	 * @var array
	 */
	private $clipboard = [];

	/**
	 * @var string|null
	 */
	private $latestKey;

	/**
	 * @var SharedStorage
	 */
	private static $self;

	/**
	 * @return SharedStorage
	 */
	public static function instance()
	{
		if (static::$self === null)
		{
			static::$self = new static();
		}

		return static::$self;
	}

	/**
	 * @param string $key
	 *
	 * @return mixed
	 *
	 * @throws InvalidArgumentException
	 */
	public function get($key)
	{
		if (!$this->has($key)) {
			throw new InvalidArgumentException(sprintf('There is no current resource for "%s"!', $key));
		}

		return $this->clipboard[$key];
	}

	/**
	 * @param string $key
	 *
	 * @return bool
	 */
	public function has($key)
	{
		return isset($this->clipboard[$key]);
	}

	/**
	 * @param string $key
	 * @param mixed  $resource
	 */
	public function set($key, $resource)
	{
		$this->clipboard[$key] = $resource;
		$this->latestKey       = $key;
	}

	/**
	 * @return mixed
	 *
	 * @throws InvalidArgumentException
	 */
	public function getLatestResource()
	{
		if (!$this->has($this->latestKey)) {
			throw new \InvalidArgumentException(sprintf('There is no "%s" latest resource!', $this->latestKey));
		}

		return $this->get($this->latestKey);
	}

	/**
	 * @param array $clipboard
	 */
	public function setClipboard(array $clipboard)
	{
		$this->clipboard = $clipboard;
	}

	private function __construct()
	{
	}
}

