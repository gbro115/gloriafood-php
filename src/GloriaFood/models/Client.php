<?php


	namespace GloriaFood\models;


	class Client
	{
		/**
		 * client id
		 * @var int
		 */
		protected $id;

		/**
		 * @var string
		 */
		protected $first;

		/**
		 * @var string
		 */
		protected $last;

		/**
		 * @var string
		 */
		protected $email;

		/**
		 * @var string
		 */
		protected $phone;

		/**
		 * client delivery address; it's null when order is pickup
		 * @var string
		 */
		protected $address_legacy;

		/**
		 * @var ClientAddress
		 */
		protected $address;

		/**
		 * false - this means the food-client did not give consent to receive marketing related communication from this restaurant regarding similar products
		 * true - this means the food-client gave consent to receive marketing related communication from this restaurant regarding similar products
		 * @var bool
		 */
		protected $accepts_marketing;

		/**
		 * @param $json
		 * @return Client
		 */
		public static function withJson($json)
		{
			$c = new self();
			$c->setId($json->client_id);
			$c->setFirst($json->client_first_name);
			$c->setLast($json->client_last_name);
			$c->setEmail($json->client_email);
			$c->setPhone($json->client_phone);
			$c->setAddressLegacy($json->client_address ?? '');
			$c->setAcceptsMarketing($json->client_marketing_consent ?? false);

			if(array_key_exists('client_address_parts', $json))
			{
				$a = ClientAddress::withJson($json);
				$c->setAddress($a);
			}

			return $c;
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
		public function getFirst(): string
		{
			return $this->first;
		}

		/**
		 * @param string $first
		 */
		public function setFirst(string $first): void
		{
			$this->first = $first;
		}

		/**
		 * @return string
		 */
		public function getLast(): string
		{
			return $this->last;
		}

		/**
		 * @param string $last
		 */
		public function setLast(string $last): void
		{
			$this->last = $last;
		}

		/**
		 * @return string
		 */
		public function getEmail(): string
		{
			return $this->email;
		}

		/**
		 * @param string $email
		 */
		public function setEmail(string $email): void
		{
			$this->email = $email;
		}

		/**
		 * @return string
		 */
		public function getPhone(): string
		{
			return $this->phone;
		}

		/**
		 * @param string $phone
		 */
		public function setPhone(string $phone): void
		{
			$this->phone = $phone;
		}

		/**
		 * @return string
		 */
		public function getAddressLegacy(): string
		{
			return $this->address_legacy;
		}

		/**
		 * @param string $address_legacy
		 */
		public function setAddressLegacy(string $address_legacy): void
		{
			$this->address_legacy = $address_legacy;
		}

		/**
		 * @return ClientAddress
		 */
		public function getAddress(): ?ClientAddress
		{
			return $this->address;
		}

		/**
		 * @param ClientAddress|null $address
		 */
		public function setAddress(?ClientAddress $address): void
		{
			$this->address = $address;
		}

		/**
		 * @return bool
		 */
		public function isAcceptsMarketing(): bool
		{
			return $this->accepts_marketing;
		}

		/**
		 * @param bool $accepts_marketing
		 */
		public function setAcceptsMarketing(bool $accepts_marketing): void
		{
			$this->accepts_marketing = $accepts_marketing;
		}



	}