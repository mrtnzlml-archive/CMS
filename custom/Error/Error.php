<?php

namespace Error;

use Doctrine\ORM\Mapping as ORM;
use Kdyby\Doctrine\Entities\Attributes\Identifier;
use Kdyby\Doctrine\Entities\MagicAccessors;

/**
 * @ORM\Entity(readOnly=TRUE)
 *
 * @method setCode(integer $code)
 * @method setPath(string $path)
 */
class Error
{

	use Identifier;
	use MagicAccessors;

	/**
	 * @ORM\Column(type="string", options={"comment":"Name of the producer"})
	 * @var string
	 */
	protected $code;

	/**
	 * @ORM\Column(type="string", options={"comment":"URL path where this error occurs"})
	 * @var string
	 */
	protected $path;

	/**
	 * @ORM\Column(type="datetime", options={"comment":"Date when this error occurs"})
	 * @var \DateTime
	 */
	private $createdAt;

	public function __construct()
	{
		$this->createdAt = new \DateTime;
	}

	public function getCreatedAt()
	{
		return $this->createdAt;
	}

}
