<?php


	namespace GloriaFood\models;


	/**
	 * Class ClientAddress
	 * @package GloriaFood\models
	 */
	class ClientAddress
	{
		/**
		 * @var string
		 */
		protected $street;

		/**
		 * @var ?string
		 */
		protected $bloc;

		/**
		 * @var ?string
		 */
		protected $floor;

		/**
		 * @var ?string
		 */
		protected $apartment;

		/**
		 * @var ?string
		 */
		protected $intercom;

		/**
		 * @var ?string
		 */
		protected $more_address;

		/**
		 * @var ?string
		 */
		protected $zipcode;

		/**
		 * @var ?string
		 */
		protected $full_address;

		/**
		 * @var ?string
		 */
		protected $latitude;

		/**
		 * @var ?string
		 */
		protected $longitude;

		/**
		 * @var bool
		 */
		protected $pin_skipped;

		/**
		 * @var string
		 */
		protected $city;

		/**
		 * @param $json
		 * @return ClientAddress
		 */
		public static function withJson($json)
		{
			if(is_null($json->client_address_parts))
			{
				return null;
			}
			$a = new self();
			$ap = $json->client_address_parts;
			$a->setStreet($ap->street);
			$a->setBloc($ap->bloc ?? null);
			$a->setFloor($ap->floor ?? null);
			$a->setApartment($ap->apartment ?? null);
			$a->setIntercom($ap->intercom ?? null);
			$a->setMoreAddress($ap->more_address ?? null);
			$a->setZipcode($ap->zipcode ?? null);
			$a->setCity($ap->city);
			$a->setFullAddress($ap->full_address ?? null);
			$a->setPinSkipped($json->pin_skipped);
			$a->setLatitude($json->latitude);
			$a->setLongitude($json->longitude);
			return $a;
		}

		/**
		 * @return string
		 */
		public function getStreet(): string
		{
			return $this->street;
		}

		/**
		 * @param string $street
		 */
		public function setStreet(string $street): void
		{
			$this->street = $street;
		}

		/**
		 * @return string|null
		 */
		public function getBloc(): ?string
		{
			return $this->bloc;
		}

		/**
		 * @param string|null $bloc
		 */
		public function setBloc(?string $bloc): void
		{
			$this->bloc = $bloc;
		}

		/**
		 * @return string|null
		 */
		public function getFloor(): ?string
		{
			return $this->floor;
		}

		/**
		 * @param string|null $floor
		 */
		public function setFloor(?string $floor): void
		{
			$this->floor = $floor;
		}

		/**
		 * @return string|null
		 */
		public function getApartment(): ?string
		{
			return $this->apartment;
		}

		/**
		 * @param string|null $apartment
		 */
		public function setApartment(?string $apartment): void
		{
			$this->apartment = $apartment;
		}

		/**
		 * @return string|null
		 */
		public function getIntercom(): ?string
		{
			return $this->intercom;
		}

		/**
		 * @param string|null $intercom
		 */
		public function setIntercom(?string $intercom): void
		{
			$this->intercom = $intercom;
		}

		/**
		 * @return string|null
		 */
		public function getMoreAddress(): ?string
		{
			return $this->more_address;
		}

		/**
		 * @param string|null $more_address
		 */
		public function setMoreAddress(?string $more_address): void
		{
			$this->more_address = $more_address;
		}

		/**
		 * @return string
		 */
		public function getZipcode(): string
		{
			return $this->zipcode;
		}

		/**
		 * @param string|null $zipcode
		 */
		public function setZipcode(?string $zipcode): void
		{
			$this->zipcode = $zipcode;
		}

		/**
		 * @return string|null
		 */
		public function getFullAddress(): ?string
		{
			return $this->full_address;
		}

		/**
		 * @param string|null $full_address
		 */
		public function setFullAddress(?string $full_address): void
		{
			$this->full_address = $full_address;
		}

		/**
		 * @return string|null
		 */
		public function getLatitude(): ?string
		{
			return $this->latitude;
		}

		/**
		 * @param string|null $latitude
		 */
		public function setLatitude(?string $latitude): void
		{
			$this->latitude = $latitude;
		}

		/**
		 * @return string|null
		 */
		public function getLongitude(): ?string
		{
			return $this->longitude;
		}

		/**
		 * @param string|null $longitude
		 */
		public function setLongitude(?string $longitude): void
		{
			$this->longitude = $longitude;
		}

		/**
		 * @return bool
		 */
		public function isPinSkipped(): bool
		{
			return $this->pin_skipped;
		}

		/**
		 * @param bool $pin_skipped
		 */
		public function setPinSkipped(bool $pin_skipped): void
		{
			$this->pin_skipped = $pin_skipped;
		}

		/**
		 * @return string
		 */
		public function getCity(): string
		{
			return $this->city;
		}

		/**
		 * @param string $city
		 */
		public function setCity(string $city): void
		{
			$this->city = $city;
		}




	}