<?php

	namespace GloriaFood\models;

	use Carbon\Carbon;

	class Order
	{
		/**
		 * @var int
		 */
		protected $id;

		/**
		 * @var string
		 */
		protected $api_version;

		/**
		 * @var string
		 */
		protected $status;

		/**
		 * @var string
		 */
		protected $missed_reason;

		/**
		 * @var string
		 */
		protected $source;

		/**
		 * @var string
		 */
		protected $payment;

		/**
		 * @var string
		 */
		protected $gateway_type;

		/**
		 * @var string
		 */
		protected $gateway_transaction_id;

		/**
		 * @var Carbon
		 */
		protected $accepted_at;

		/**
		 * @var Carbon
		 */
		protected $fulfill_at;

		/**
		 * @var Carbon
		 */
		protected $updated_at;

		/**
		 * @var bool
		 */
		protected $for_later;

		/**
		 * @var string
		 */
		protected $instructions;

		/**
		 * @var int
		 */
		protected $restaurant_id;

		/**
		 * @var int
		 */
		protected $company_account_id;

		/**
		 * @var string
		 */
		protected $restaurant_name;

		/**
		 * @var string
		 */
		protected $restaurant_phone;

		/**
		 * @var string
		 */
		protected $restaurant_country;

		/**
		 * @var string
		 */
		protected $restaurant_state;

		/**
		 * @var string
		 */
		protected $restaurant_city;

		/**
		 * @var string
		 */
		protected $restaurant_zipcode;

		/**
		 * @var string
		 */
		protected $restaurant_street;

		/**
		 * @var string
		 */
		protected $restaurant_latitude;

		/**
		 * @var string
		 */
		protected $restaurant_longitude;

		/**
		 * @var string
		 */
		protected $restaurant_timezone;

		/**
		 * @var string
		 */
		protected $restaurant_key;

		/**
		 * @var string
		 */
		protected $restaurant_token;

		/**
		 * @var string
		 */
		protected $currency;

		/**
		 * @var Client
		 */
		protected $client;

		/**
		 * @var string
		 * 'in_person'
		 * 'meet_rider'
		 * 'no_contact'
		 * 'at_counter'
		 * 'outside_venue'
		 * 'curbside_pickup'
		 * null - in case the option is not being used
		 */
		protected $fulfillment_option;

			/**
			 * total including taxes
			 * @var float
			 */
		protected $total_price;

			/**
			 * sub-total, not including tip, delivery fee and, only in 'NET' tax calculations, taxes on items
			 * @var float
			 */
		protected $sub_total_price;

			/**
			 * how taxation is applied, can be either 'NET' or 'GROSS' (NOTE: the tip is always taxed as GROSS)
			 * @var string
			 */
		protected $tax_type;

		protected $tax_name;

		protected $tax_list;

			/**
			 * list of promotion ids corresponding to coupon codes used during the ordering process (including those which were not applied in the end)
			 * @var int[]
			 */
		protected $coupons;

			/**
			 * list of order items
			 * @var Item[]
			 */
		protected $items;

			/**
			 * reference string that was used when opening ordering
			 * @var string
			 */
		protected $reference;

			/**
			 * @var float
			 */
		protected $tax_value;

		/**
		 * @var ?string
		 */
		protected $type;


		public function __construct() {
			$this->tax_list = [];
			$this->items = [];

			// allocate your stuff
		}

		public static function withJson( $json ) {
			$i = new self();
			$i->setId($json->id);
			$i->setType($json->type);
			$i->setStatus($json->status);
			$i->setApiVersion($json->api_version);
			$i->setMissedReason($json->missed_reason ?? null);
			$i->setPayment($json->payment);
			$i->setGatewayType($json->gateway_type ?? null);
			$i->setGatewayTransactionId($json->gateway_transaction_id?? null);
			$i->setAcceptedAt($json->accepted_at ?? null);
			$i->setFulfillAt($json->fulfill_at ?? null);
			$i->setUpdatedAt($json->updated_at ?? null);
			$i->setForLater($json->for_later);
			$i->setInstructions($json->instructions ?? null);
			$i->setRestaurantId($json->restaurant_id);
			$i->setCompanyAccountId($json->company_account_id ?? null);
			$i->setRestaurantName($json->restaurant_name);
			$i->setRestaurantPhone($json->restaurant_phone);
			$i->setRestaurantCountry($json->restaurant_country);
			$i->setRestaurantState($json->restaurant_state ?? null);
			$i->setRestaurantCity($json->restaurant_city);
			$i->setRestaurantZipcode($json->restaurant_zipcode);
			$i->setRestaurantStreet($json->restaurant_street);
			$i->setRestaurantLatitude($json->restaurant_latitude);
			$i->setRestaurantLongitude($json->restaurant_longitude);
			$i->setRestaurantTimezone($json->restaurant_timezone);
			$i->setRestaurantKey($json->restaurant_key);
			$i->setRestaurantToken($json->restaurant_token);
			$i->setCurrency($json->currency);
			$i->setFulfillmentOption($json->fulfillment_option ?? null);
			$i->setTotalPrice($json->total_price);
			$i->setSubTotalPrice($json->sub_total_price);
			$i->setTaxType($json->tax_type);
			$i->setTaxValue($json->tax_value);
			$i->setTaxName($json->tax_name);
			$i->setCoupons($json->coupons);
			$i->setReference($json->reference);
			$i->setSource($json->source);
			$i->setClient(Client::withJson($json));

			foreach($json->tax_list as $tax)
			{
				$i->addAggregatedTax(AggregatedTax::withJson($tax));
			}

			foreach($json->items as $item)
			{
				$i->addItem(Item::withJson($item));


			}

			return $i;
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
		public function getApiVersion(): string
		{
			return $this->api_version;
		}

		/**
		 * @param string $api_version
		 */
		public function setApiVersion(string $api_version): void
		{
			$this->api_version = $api_version;
		}

		/**
		 * @return string|null
		 */
		public function getType(): ?string
		{
			return $this->type;
		}

		/**
		 * @param string|null $type
		 */
		public function setType(?string $type): void
		{
			$this->type = $type;
		}



		/**
		 * @return string
		 */
		public function getStatus(): string
		{
			return $this->status;
		}

		/**
		 * @param string $status
		 */
		public function setStatus(string $status): void
		{
			$this->status = $status;
		}

		/**
		 * @return string|null
		 */
		public function getMissedReason()
		{
			return $this->missed_reason;
		}

		/**
		 * @param string|null $missed_reason
		 */
		public function setMissedReason(?string $missed_reason): void
		{
			$this->missed_reason = $missed_reason;
		}

		/**
		 * @return string
		 */
		public function getSource(): string
		{
			return $this->source;
		}

		/**
		 * @param string $source
		 */
		public function setSource(string $source): void
		{
			$this->source = $source;
		}

		/**
		 * @return string|null
		 */
		public function getPayment()
		{
			return $this->payment;
		}

		/**
		 * @param string|null $payment
		 */
		public function setPayment(?string $payment)
		{
			$this->payment = $payment;
		}

		/**
		 * @return string|null
		 */
		public function getGatewayType()
		{
			return $this->gateway_type;
		}

		/**
		 * @param string|null $gateway_type
		 */
		public function setGatewayType(?string $gateway_type): void
		{
			$this->gateway_type = $gateway_type;
		}

		/**
		 * @return string|null
		 */
		public function getGatewayTransactionId()
		{
			return $this->gateway_transaction_id;
		}

		/**
		 * @param string|null $gateway_transaction_id
		 */
		public function setGatewayTransactionId(?string $gateway_transaction_id): void
		{
			$this->gateway_transaction_id = $gateway_transaction_id;
		}

		/**
		 * @return Carbon
		 */
		public function getAcceptedAt(): ?Carbon
		{
			return $this->accepted_at;
		}

		/**
		 * @param string|null $accepted_at
		 */
		public function setAcceptedAt(?string $accepted_at): void
		{
			if($accepted_at)
			{
				$this->accepted_at = Carbon::parse($accepted_at)->setTimezone('UTC');
			}
		}

		/**
		 * @return Carbon|null
		 */
		public function getFulfillAt(): ?Carbon
		{
			return $this->fulfill_at;
		}

		/**
		 * @param string|null $fulfill_at
		 */
		public function setFulfillAt(?string $fulfill_at): void
		{
			if($fulfill_at)
			{
				$this->fulfill_at = Carbon::parse($fulfill_at)->setTimezone('UTC');
			}
		}

		/**
		 * @return Carbon
		 */
		public function getUpdatedAt(): ?Carbon
		{
			return $this->updated_at;
		}

		/**
		 * @param string|null $updated_at
		 */
		public function setUpdatedAt(?string $updated_at): void
		{
			if($updated_at)
			{
				$this->updated_at = Carbon::parse($updated_at)->setTimezone('UTC');
			}
		}

		/**
		 * @return bool
		 */
		public function isForLater(): bool
		{
			return $this->for_later;
		}

		/**
		 * @param bool $for_later
		 */
		public function setForLater(bool $for_later): void
		{
			$this->for_later = $for_later;
		}

		/**
		 * @return string
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
		 * @return int
		 */
		public function getRestaurantId(): int
		{
			return $this->restaurant_id;
		}

		/**
		 * @param int|null $restaurant_id
		 */
		public function setRestaurantId(?int $restaurant_id): void
		{
			$this->restaurant_id = $restaurant_id;
		}

		/**
		 * @return int
		 */
		public function getCompanyAccountId(): ?int
		{
			return $this->company_account_id;
		}

		/**
		 * @param int|null $company_account_id
		 */
		public function setCompanyAccountId(?int $company_account_id): void
		{
			$this->company_account_id = $company_account_id;
		}

		/**
		 * @return string
		 */
		public function getRestaurantName(): string
		{
			return $this->restaurant_name;
		}

		/**
		 * @param string $restaurant_name
		 */
		public function setRestaurantName(string $restaurant_name): void
		{
			$this->restaurant_name = $restaurant_name;
		}

		/**
		 * @return string
		 */
		public function getRestaurantPhone(): string
		{
			return $this->restaurant_phone;
		}

		/**
		 * @param string $restaurant_phone
		 */
		public function setRestaurantPhone(string $restaurant_phone): void
		{
			$this->restaurant_phone = $restaurant_phone;
		}

		/**
		 * @return string
		 */
		public function getRestaurantCountry(): string
		{
			return $this->restaurant_country;
		}

		/**
		 * @param string $restaurant_country
		 */
		public function setRestaurantCountry(string $restaurant_country): void
		{
			$this->restaurant_country = $restaurant_country;
		}

		/**
		 * @return string
		 */
		public function getRestaurantState(): string
		{
			return $this->restaurant_state;
		}

		/**
		 * @param string $restaurant_state
		 */
		public function setRestaurantState(string $restaurant_state): void
		{
			$this->restaurant_state = $restaurant_state;
		}

		/**
		 * @return string
		 */
		public function getRestaurantCity(): string
		{
			return $this->restaurant_city;
		}

		/**
		 * @param string $restaurant_city
		 */
		public function setRestaurantCity(string $restaurant_city): void
		{
			$this->restaurant_city = $restaurant_city;
		}

		/**
		 * @return string
		 */
		public function getRestaurantZipcode(): string
		{
			return $this->restaurant_zipcode;
		}

		/**
		 * @param string $restaurant_zipcode
		 */
		public function setRestaurantZipcode(string $restaurant_zipcode): void
		{
			$this->restaurant_zipcode = $restaurant_zipcode;
		}

		/**
		 * @return string
		 */
		public function getRestaurantStreet(): string
		{
			return $this->restaurant_street;
		}

		/**
		 * @param string $restaurant_street
		 */
		public function setRestaurantStreet(string $restaurant_street): void
		{
			$this->restaurant_street = $restaurant_street;
		}

		/**
		 * @return string
		 */
		public function getRestaurantLatitude(): string
		{
			return $this->restaurant_latitude;
		}

		/**
		 * @param string $restaurant_latitude
		 */
		public function setRestaurantLatitude(string $restaurant_latitude): void
		{
			$this->restaurant_latitude = $restaurant_latitude;
		}

		/**
		 * @return string
		 */
		public function getRestaurantLongitude(): string
		{
			return $this->restaurant_longitude;
		}

		/**
		 * @param string $restaurant_longitude
		 */
		public function setRestaurantLongitude(string $restaurant_longitude): void
		{
			$this->restaurant_longitude = $restaurant_longitude;
		}

		/**
		 * @return string
		 */
		public function getRestaurantTimezone(): string
		{
			return $this->restaurant_timezone;
		}

		/**
		 * @param string $restaurant_timezone
		 */
		public function setRestaurantTimezone(string $restaurant_timezone): void
		{
			$this->restaurant_timezone = $restaurant_timezone;
		}

		/**
		 * @return string
		 */
		public function getRestaurantKey(): string
		{
			return $this->restaurant_key;
		}

		/**
		 * @param string $restaurant_key
		 */
		public function setRestaurantKey(string $restaurant_key): void
		{
			$this->restaurant_key = $restaurant_key;
		}

		/**
		 * @return string
		 */
		public function getRestaurantToken(): string
		{
			return $this->restaurant_token;
		}

		/**
		 * @param string $restaurant_token
		 */
		public function setRestaurantToken(string $restaurant_token): void
		{
			$this->restaurant_token = $restaurant_token;
		}

		/**
		 * @return string
		 */
		public function getCurrency(): string
		{
			return $this->currency;
		}

		/**
		 * @param string $currency
		 */
		public function setCurrency(string $currency): void
		{
			$this->currency = $currency;
		}

		/**
		 * @return Client
		 */
		public function getClient(): Client
		{
			return $this->client;
		}

		/**
		 * @param Client $client
		 */
		public function setClient(Client $client): void
		{
			$this->client = $client;
		}

		/**
		 * @return string
		 */
		public function getFulfillmentOption(): ?string
		{
			return $this->fulfillment_option;
		}

		/**
		 * @param string|null $fulfillment_option
		 */
		public function setFulfillmentOption(?string $fulfillment_option): void
		{
			$this->fulfillment_option = $fulfillment_option;
		}

		/**
		 * @return float
		 */
		public function getTotalPrice(): float
		{
			return $this->total_price;
		}

		/**
		 * @param float $total_price
		 */
		public function setTotalPrice(float $total_price): void
		{
			$this->total_price = $total_price;
		}

		/**
		 * @return float
		 */
		public function getSubTotalPrice(): float
		{
			return $this->sub_total_price;
		}

		/**
		 * @param float $sub_total_price
		 */
		public function setSubTotalPrice(float $sub_total_price): void
		{
			$this->sub_total_price = $sub_total_price;
		}

		/**
		 * @return string
		 */
		public function getTaxType(): string
		{
			return $this->tax_type;
		}

		/**
		 * @param string $tax_type
		 */
		public function setTaxType(string $tax_type): void
		{
			$this->tax_type = $tax_type;
		}

		/**
		 * @return mixed
		 */
		public function getTaxName()
		{
			return $this->tax_name;
		}

		/**
		 * @param mixed $tax_name
		 */
		public function setTaxName($tax_name): void
		{
			$this->tax_name = $tax_name;
		}

		/**
		 * @return mixed
		 */
		public function getTaxList()
		{
			return $this->tax_list;
		}

		/**
		 * @param mixed $tax_list
		 */
		public function setTaxList($tax_list): void
		{
			$this->tax_list = $tax_list;
		}

		public function addAggregatedTax(AggregatedTax $tax)
		{
			array_push($this->tax_list, $tax);
		}

		/**
		 * @return int[]
		 */
		public function getCoupons(): ?array
		{
			return $this->coupons;
		}

		/**
		 * @param int[] $coupons
		 */
		public function setCoupons(?array $coupons): void
		{
			$this->coupons = $coupons;
		}

		/**
		 * @return Item[]
		 */
		public function getItems(): array
		{
			return $this->items;
		}

		/**
		 * @param Item[] $items
		 */
		public function setItems(array $items): void
		{
			$this->items = $items;
		}

		/**
		 * @return string
		 */
		public function getReference(): ?string
		{
			return $this->reference;
		}

		/**
		 * @param string|null $reference
		 */
		public function setReference(?string $reference): void
		{
			$this->reference = $reference;
		}

		/**
		 * @return float
		 */
		public function getTaxValue(): float
		{
			return $this->tax_value;
		}

		/**
		 * @param float $tax_value
		 */
		public function setTaxValue(float $tax_value): void
		{
			$this->tax_value = $tax_value;
		}

		public function addItem(Item $it)
		{
			array_push($this->items, $it);
		}

		public function getTotalTipAmount(): float
		{
			$total = 0;
			$tips = $this->getItemsOfType(ItemTypes::TIP);
			foreach($tips as $tip_item)
			{
				$total += $tip_item->getPrice();
			}
			return $total;
		}

		public function getItemsOfType($type) {
			$filtered_array = array();
			foreach ($this->getItems() as $item)
			{
				if ($item->getType()) {
					if ($item->getType() == $type) {
						$filtered_array[] = $item;
					}
				}
			}
			return $filtered_array;
		}

	}