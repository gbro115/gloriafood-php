<?php


	namespace GloriaFood\models;


	use JsonSerializable;

	class Item implements JsonSerializable
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
		 * @var ?string
		 */
		protected $instructions;

		/**
		 * @var string
		 */
		protected $type;

		/**
		 * @var ?int
		 */
		protected $type_id;

		/**
		 * @var ?int
		 */
		protected $parent_id;

		/**
		 * @var float
		 */
		protected $total_item_price;

		/**
		 * @var float
		 */
		protected $price;

		/**
		 * @var int
		 */
		protected $quantity;

		/**
		 * @var ?float
		 */
		protected $item_discount;

		/**
		 * @var ?float
		 */
		protected $cart_discount;

		/**
		 * @var ?float
		 */
		protected $cart_discount_rate;

		/**
		 * @var Option[]
		 */
		protected $options;

		/**
		 * @var ?string
		 */
		protected $coupon;

		/**
		 * Item constructor.
		 */
		public function __construct()
		{
			$this->options = [];
		}

		public static function withJson($item)
		{
			$it = new self();
			$it->setId($item->id);
			$it->setName($item->name);
			$it->setInstructions($item->instructions ?? null);
			$it->setType($item->type);
			$it->setTypeId($item->type_id ?? null);
			$it->setParentId($item->parent_id ?? null);
			$it->setTotalItemPrice($item->total_item_price ?? null);
			$it->setPrice($item->price);
			$it->setQuantity($item->quantity);
			$it->setItemDiscount($item->item_discount ?? 0);
			$it->setCartDiscount($item->cart_discount ?? 0);
			$it->setCartDiscountRate($item->cart_discount_rate ?? 0);
			$it->setCoupon($item->coupon ?? null);

			foreach($item->options as $option)
			{
				$it->addOption(Option::withJson($option));
			}

			return $it;
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
		 * @return ?string
		 */
		public function getInstructions(): ?string
		{
			return $this->instructions;
		}

		/**
		 * @param string|null $instructions
		 */
		public function setInstructions(?string $instructions): void
		{
			$this->instructions = $instructions;
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
		 * @return ?int
		 */
		public function getParentId(): ?int
		{
			return $this->parent_id;
		}

		/**
		 * @param ?int $parent_id
		 */
		public function setParentId(?int $parent_id): void
		{
			$this->parent_id = $parent_id;
		}

		/**
		 * @return int|null
		 */
		public function getTypeId(): ?int
		{
			return $this->type_id;
		}

		/**
		 * @param int|null $type_id
		 */
		public function setTypeId(?int $type_id): void
		{
			$this->type_id = $type_id;
		}


		/**
		 * @return float
		 */
		public function getTotalItemPrice(): float
		{
			return $this->total_item_price;
		}

		/**
		 * @param float $total_item_price
		 */
		public function setTotalItemPrice(float $total_item_price): void
		{
			$this->total_item_price = $total_item_price;
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
		 * @return ?float
		 */
		public function getItemDiscount(): ?float
		{
			return $this->item_discount;
		}

		/**
		 * @param float|null $item_discount
		 */
		public function setItemDiscount(?float $item_discount): void
		{
			$this->item_discount = $item_discount;
		}

		/**
		 * @return ?float
		 */
		public function getCartDiscount(): ?float
		{
			return $this->cart_discount;
		}

		/**
		 * @param float|null $cart_discount
		 */
		public function setCartDiscount(?float $cart_discount): void
		{
			$this->cart_discount = $cart_discount;
		}

		/**
		 * @return ?float
		 */
		public function getCartDiscountRate(): ?float
		{
			return $this->cart_discount_rate;
		}

		/**
		 * @param float|null $cart_discount_rate
		 */
		public function setCartDiscountRate(?float $cart_discount_rate): void
		{
			$this->cart_discount_rate = $cart_discount_rate;
		}

		/**
		 * @return Option[]
		 */
		public function getOptions(): array
		{
			return $this->options;
		}

		/**
		 * @param Option[] $options
		 */
		public function setOptions(array $options): void
		{
			$this->options = $options;
		}

		/**
		 * @return ?string
		 */
		public function getCoupon(): ?string
		{
			return $this->coupon;
		}

		/**
		 * @param ?string $coupon
		 */
		public function setCoupon(?string $coupon): void
		{
			$this->coupon = $coupon;
		}

		public function addOption($option)
		{
			array_push($this->options, $option);
		}

		public function jsonSerialize()
		{
			return [
				'id'=>$this->getId(),
				'name'=>$this->getName(),
				'total_item_price'=>$this->getTotalItemPrice(),
				'price'=>$this->getPrice(),
				'quantity'=>$this->getQuantity(),
				'instructions'=>$this->getInstructions(),
				'type'=>$this->getType(),
				'type_id'=>$this->getTypeId(),
				'parent_id'=>$this->getParentId(),
				'item_discount'=>$this->getItemDiscount(),
				'cart_discount_rate'=>$this->getCartDiscountRate(),
				'cart_discount'=>$this->getCartDiscount(),
				'options'=>$this->getOptions()
			];
		}
	}