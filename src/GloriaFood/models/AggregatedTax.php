<?php


	namespace GloriaFood\models;

	use JsonSerializable;

	class AggregatedTax implements JsonSerializable
	{
		private $type;
		private $value;
		private $rate;

		/**
		 * @param $tax
		 * @return AggregatedTax
		 */
		public static function withJson($tax)
		{
			$at = new self();
			$at->setType($tax->type);;
			$at->setValue($tax->value);
			$at->setRate($tax->rate);
			return $at;
		}

		/**
		 * rate used to calculate taxes
		 * @return float
		 */
		public function getRate()
		{
			return $this->rate;
		}

		/**
		 * rate used to calculate taxes
		 * @param float $rate
		 */
		public function setRate(float $rate): void
		{
			$this->rate = $rate;
		}

		/**
		type of aggregated tax; can be:
		- 'item' - taxes for menu items
		- 'delivery_fee' - taxes for the delivery fee
		- 'tip' - taxes for the tip
		- 'fees_discounts_subtotal' - taxes for the sum of service fees and cash discounts applied to the shopping cart value (sub-total)
		- 'service_fee_total' - taxes for the sum of service fees applied to the total order value		 * @return string
		 */
		public function getType()
		{
			return $this->type;
		}

		/**
		 * type of aggregated tax; can be:
		 * - 'item' - taxes for menu items
		 * - 'delivery_fee' - taxes for the delivery fee
		 * - 'tip' - taxes for the tip
		 * - 'fees_discounts_subtotal' - taxes for the sum of service fees and cash discounts applied to the shopping cart value (sub-total)
		 * - 'service_fee_total' - taxes for the sum of service fees applied to the total order value
		 * @param string $type
		 */
		public function setType(string $type): void
		{
			$this->type = $type;
		}

		/**
		 * value of the taxes
		 * @return float
		 */
		public function getValue()
		{
			return $this->value;
		}

		/**
		 * value of the taxes
		 * @param float $value
		 */
		public function setValue(float $value): void
		{
			$this->value = $value;
		}

		public function jsonSerialize()
		{
			return [
				'rate'=>$this->getRate(),
				'type'=>$this->getType(),
				'value'=>$this->getValue()
			];
		}

	}