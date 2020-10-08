<?php


	namespace GloriaFood\models;


	use JsonSerializable;

	class Option implements JsonSerializable
	{
		/**
		 * @var int
		 */
		protected $id;

		/**
		 * @var string
		 */
		protected $name;

		/**
		 * name of the option group
		 * @var string
		 */
		protected $group_name;

		/**
		 * item option type; can be either 'option' or 'size'
		 * @var string
		 */
		protected $type;

		/**
		 * id of the original option or size used to create the order option
		 * @var int
		 */
		protected $type_id;

		/**
		 * quantity of the item option
		 * @var int
		 */
		protected $quantity;

		/**
		 * base price of the item option, does not use quantity
		 * @var float
		 */
		protected $price;

		/**
		 * @param $option
		 * @return Option
		 */
		public static function withJson($option)
		{
			$op = new self();
			$op->setId($option->id);
			$op->setName($option->name);
			$op->setGroupName($option->group_name);
			$op->setType($option->type);
			$op->setTypeId($option->type_id);;
			$op->setQuantity($option->quantity);
			$op->setPrice($option->price);
			return $op;
		}

		/**
		 * @return int
		 */
		public function getId(): int
		{
			return $this->id;
		}

		/**
		 * @param int $id
		 */
		public function setId(int $id): void
		{
			$this->id = $id;
		}

		/**
		 * @return string
		 */
		public function getName(): string
		{
			return $this->name;
		}

		/**
		 * @param string $name
		 */
		public function setName(string $name): void
		{
			$this->name = $name;
		}

		/**
		 * @return string
		 */
		public function getGroupName(): string
		{
			return $this->group_name;
		}

		/**
		 * @param string $group_name
		 */
		public function setGroupName(string $group_name): void
		{
			$this->group_name = $group_name;
		}

		/**
		 * @return string
		 */
		public function getType(): string
		{
			return $this->type;
		}

		/**
		 * @param string $type
		 */
		public function setType(string $type): void
		{
			$this->type = $type;
		}

		/**
		 * @return int
		 */
		public function getTypeId(): int
		{
			return $this->type_id;
		}

		/**
		 * @param int $type_id
		 */
		public function setTypeId(int $type_id): void
		{
			$this->type_id = $type_id;
		}

		/**
		 * @return int
		 */
		public function getQuantity(): int
		{
			return $this->quantity;
		}

		/**
		 * @param int $quantity
		 */
		public function setQuantity(int $quantity): void
		{
			$this->quantity = $quantity;
		}

		/**
		 * @return float
		 */
		public function getPrice(): float
		{
			return $this->price;
		}

		/**
		 * @param float $price
		 */
		public function setPrice(float $price): void
		{
			$this->price = $price;
		}


		public function jsonSerialize()
		{
			return [
				'id'=>$this->getId(),
				'name'=>$this->getName(),
				'group_name'=>$this->getGroupName(),
				'type'=>$this->getType(),
				'type_id'=>$this->getTypeId(),
				'quantity'=>$this->getQuantity(),
				'price'=>$this->getPrice()
			];
		}
	}