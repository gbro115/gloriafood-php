<?php

	namespace Test\GloriaFood\models;

	use Carbon\Carbon;
	use GloriaFood\models\Item;
	use GloriaFood\models\Order;
	use PHPUnit\Framework\TestCase;

	class OrderTest extends TestCase
	{


		public function testWithJson()
		{
			$json = <<<JSON
{
  "count": 1,
  "orders": [
    {
      "coupons": [],
      "tax_list": [
        {
          "type": "delivery_fee",
          "value": 1.9,
          "rate": 0.19
        },
        {
          "type": "tip",
          "value": 1.1,
          "rate": 0.19
        },
        {
          "type": "item",
          "value": 9.08,
          "rate": 0.19
        },
        {
          "type": "fees_discounts_subtotal",
          "value": 1.90,
          "rate": 0.19
        },
        {
          "type": "service_fee_total",
          "value": 3.80,
          "rate": 0.19
        }
      ],
      "id": 6816,
      "total_price": 75.66,
      "sub_total_price": 47.8,
      "tax_value": 12.08,
      "persons": 0,
      "latitude": "40.802554599183225",
      "longitude": "-73.9407224846558",
      "client_first_name": "John",
      "client_last_name": "Doe",
      "client_email": "john.doe@gmail.com",
      "client_phone": "+12126871225",
      "restaurant_name": "Pronto",
      "instructions": "Please call when you arrive at the gate",
      "currency": "USD",
      "type": "delivery",
      "status": "accepted",
      "missed_reason": null,
      "source": "admin",
      "pin_skipped": false,
      "accepted_at": "2019-05-29T14:45:19.000Z",
      "tax_type": "NET",
      "tax_name": "Sales tax",
      "fulfill_at": "2019-05-29T15:40:19.000Z",
      "updated_at": "2019-05-29T15:40:19.000Z",
      "reference": null,
      "restaurant_id": 195,
      "client_id": 756,
      "restaurant_phone": "+12126871145",
      "restaurant_timezone": "America/New_York",
      "company_account_id": 100195,
      "pos_system_id": 28,
      "restaurant_key": "bvvZ3913t1cJRf8HA5OxvO2FjiSmExSly",
      "restaurant_country": "United States",
      "restaurant_city": "Manhattan",
      "restaurant_state": "New York",
      "restaurant_zipcode": "031534",
      "restaurant_street": "Park avenue 78",
      "restaurant_latitude": "40.75009928615015",
      "restaurant_longitude": "-73.97940823862302",
      "restaurant_token": "TOKEN",
      "api_version": 2,
      "payment": "ONLINE",
      "for_later": false,
      "fulfillment_option": null,
      "client_marketing_consent": true,
      "client_address": "Park avenue 121, Manhattan",
      "client_address_parts": {
        "street": "Park avenue 121",
        "city": "Manhattan"
      },
      "items": [
        {
          "id": 27160,
          "name": "DELIVERY_FEE",
          "total_item_price": 10,
          "price": 10,
          "quantity": 1,
          "instructions": null,
          "type": "delivery_fee",
          "type_id": null,
          "tax_rate": 0.19,
          "tax_value": 1.9,
          "parent_id": null,
          "item_discount": 0,
          "cart_discount_rate": 0,
          "cart_discount": 0,
          "tax_type": "NET",
          "options": []
        },
        {
          "id": 27161,
          "name": "TIP",
          "total_item_price": 6.88,
          "price": 6.88,
          "quantity": 1,
          "instructions": null,
          "type": "tip",
          "type_id": null,
          "tax_rate": 0.19,
          "tax_value": 1.0985,
          "parent_id": null,
          "item_discount": 0,
          "cart_discount_rate": 0,
          "cart_discount": 0,
          "tax_type": "GROSS",
          "options": []
        },
        {
          "id": 27162,
          "name": "Pizza Margherita",
          "total_item_price": 40.8,
          "price": 7,
          "quantity": 4,
          "instructions": "No pepper please",
          "type": "item",
          "type_id": 841,
          "tax_rate": 0.19,
          "tax_value": 6.1923,
          "parent_id": null,
          "item_discount": 0,
          "cart_discount_rate": 0.0947,
          "cart_discount": 3.86,
          "tax_type": "NET",
          "options": [
            {
              "id": 20085,
              "name": "Large",
              "price": 2,
              "group_name": "Size",
              "quantity": 1,
              "type": "size",
              "type_id": 798
            },
            {
              "id": 20086,
              "name": "Extra mozzarella",
              "price": 1.2,
              "group_name": "Extra Toppings (Small)",
              "quantity": 1,
              "type": "option",
              "type_id": 1187
            }
          ]
        },
        {
          "id": 27163,
          "name": "5$ off total for first time clients",
          "total_item_price": 0,
          "price": 0,
          "quantity": 1,
          "instructions": null,
          "type": "promo_cart",
          "type_id": 226,
          "tax_rate": 0,
          "tax_value": 0,
          "parent_id": null,
          "item_discount": 5,
          "cart_discount_rate": 0.0947,
          "cart_discount": -5,
          "tax_type": "NET",
          "coupon": "MQGTLWWLGQRE",
          "options": []
        },
        {
          "id": 27164,
          "name": "Free drink on any order $30+",
          "total_item_price": 5,
          "price": 0,
          "quantity": 1,
          "instructions": null,
          "type": "promo_cart_item",
          "type_id": 228,
          "tax_rate": 0,
          "tax_value": 0,
          "parent_id": null,
          "item_discount": 5,
          "cart_discount_rate": 0.0947,
          "cart_discount": 0,
          "tax_type": "NET",
          "options": []
        },
        {
          "id": 27165,
          "name": "Spaghetti Frutti di Mare",
          "total_item_price": 12,
          "price": 12,
          "quantity": 1,
          "instructions": "",
          "type": "item",
          "type_id": 844,
          "tax_rate": 0.19,
          "tax_value": 0,
          "parent_id": 27166,
          "item_discount": 12,
          "cart_discount_rate": 0.0947,
          "cart_discount": 0,
          "tax_type": "NET",
          "options": []
        },
        {
          "id": 27166,
          "name": "Buy one get other free",
          "total_item_price": 24,
          "price": 0,
          "quantity": 1,
          "instructions": null,
          "type": "promo_item",
          "type_id": 225,
          "tax_rate": 0,
          "tax_value": 0,
          "parent_id": null,
          "item_discount": 12,
          "cart_discount_rate": 0.0947,
          "cart_discount": 1.14,
          "tax_type": "NET",
          "coupon": "9VKHM77MZ434",
          "options": []
        },
        {
          "id": 27167,
          "name": "Spaghetti Frutti di Mare",
          "total_item_price": 12,
          "price": 12,
          "quantity": 1,
          "instructions": "",
          "type": "item",
          "type_id": 844,
          "tax_rate": 0.19,
          "tax_value": 2.0641,
          "parent_id": 27166,
          "item_discount": 0,
          "cart_discount_rate": 0.0947,
          "cart_discount": 1.14,
          "tax_type": "NET",
          "options": []
        },
        {
          "id": 27168,
          "name": "Cola",
          "total_item_price": 5,
          "price": 5,
          "quantity": 1,
          "instructions": "",
          "type": "item",
          "type_id": 2716,
          "tax_rate": 0.19,
          "tax_value": 0,
          "parent_id": 27164,
          "item_discount": 5,
          "cart_discount_rate": 0.0947,
          "cart_discount": 0,
          "tax_type": "NET",
          "options": [
            {
              "id": 20087,
              "name": "Cola light",
              "price": 0,
              "group_name": "Which cola",
              "quantity": 1,
              "type": "option",
              "type_id": 3873
            }
          ]
        },
        {
          "id": 27196,
          "name": "Service fee subtotal 1",
          "total_item_price": 5,
          "price": 5,
          "quantity": 1,
          "instructions": null,
          "type": "service_fee_subtotal",
          "type_id": 123,
          "tax_rate": 0.19,
          "tax_value": 1.900,
          "parent_id": null,
          "item_discount": 0,
          "cart_discount_rate": 0,
          "cart_discount": 0,
          "tax_type": "NET",
          "options": []
        },
        {
          "id": 27197,
          "name": "Service fee subtotal 2",
          "total_item_price": 5,
          "price": 5,
          "quantity": 1,
          "instructions": null,
          "type": "service_fee_subtotal",
          "type_id": 125,
          "tax_rate": 0.19,
          "tax_value": 0.9500,
          "parent_id": null,
          "item_discount": 0,
          "cart_discount_rate": 0,
          "cart_discount": 0,
          "tax_type": "NET",
          "options": []
        },
        {
          "id": 27198,
          "name": "Cash discount",
          "total_item_price": -5,
          "price": -5,
          "quantity": 1,
          "instructions": null,
          "type": "cash_discount",
          "type_id": 125,
          "tax_rate": 0.19,
          "tax_value": 0.9500,
          "parent_id": null,
          "item_discount": 0,
          "cart_discount_rate": 0,
          "cart_discount": 0,
          "tax_type": "NET",
          "options": []
        },
        {
          "id": 27199,
          "name": "Service fee total",
          "total_item_price": 20,
          "price": 20,
          "quantity": 1,
          "instructions": null,
          "type": "service_fee_total",
          "type_id": 514,
          "tax_rate": 0.19,
          "tax_value": 3.800,
          "parent_id": null,
          "item_discount": 0,
          "cart_discount_rate": 0,
          "cart_discount": 0,
          "tax_type": "NET",
          "options": []
        }
      ]
    }
  ]
}
JSON;


			$payload = json_decode($json);
			$o = $payload->orders[0];
			$order = Order::withJson($o);
			$this->assertCount(13, $order->getItems());
		}

		public function testWithJsonPickup()
		{
			$json = <<<JSON
{
  "count": 1,
  "orders": [
    {
      "instructions": null,
      "coupons": [],
      "tax_list": [
        {
          "type": "item",
          "value": 8.69,
          "rate": 0.14975
        }
      ],
      "missed_reason": null,
      "billing_details": null,
      "fulfillment_option": null,
      "id": 168968914,
      "total_price": 73.41,
      "sub_total_price": 58.05,
      "tax_value": 8.69,
      "persons": 0,
      "latitude": "46.493142400535476",
      "longitude": "-72.56673801471518",
      "client_first_name": "Boaty",
      "client_last_name": "McBoatface",
      "client_email": "boats@foo.com",
      "client_phone": "+1514123456",
      "restaurant_name": "Some Resto",
      "currency": "CAD",
      "type": "pickup",
      "status": "accepted",
      "source": "mobile_web",
      "pin_skipped": false,
      "accepted_at": "2020-10-07T20:19:34.000Z",
      "tax_type": "NET",
      "tax_name": "GST + QST",
      "fulfill_at": "2020-10-08T00:00:00.000Z",
      "reference": null,
      "restaurant_id": 9999,
      "client_id": 9999,
      "updated_at": "2020-10-07T20:19:34.000Z",
      "restaurant_phone": "+1 514 312 6887",
      "restaurant_timezone": "America/Toronto",
      "company_account_id": 946395,
      "pos_system_id": 25422,
      "restaurant_key": "ZJvEQu4k0SZ5expy5",
      "restaurant_country": "Canada",
      "restaurant_city": "Montréal",
      "restaurant_state": "Quebec",
      "restaurant_zipcode": "H2W 1N5",
      "restaurant_street": "101 rue St Catherine",
      "restaurant_latitude": "49.51527331790095",
      "restaurant_longitude": "-72.57473052209016",
      "client_marketing_consent": true,
      "restaurant_token": "ABC123",
      "gateway_transaction_id": "1234455",
      "gateway_type": "stripe",
      "api_version": 2,
      "payment": "ONLINE",
      "for_later": true,
      "client_address": null,
      "client_address_parts": null,
      "items": [
        {
          "id": 221490258,
          "name": "TIP",
          "total_item_price": 6.67,
          "price": 6.67,
          "quantity": 1,
          "instructions": null,
          "type": "tip",
          "type_id": null,
          "tax_rate": 0,
          "tax_value": 0,
          "parent_id": null,
          "item_discount": 0,
          "cart_discount_rate": 0,
          "cart_discount": 0,
          "tax_type": "GROSS",
          "options": []
        },
        {
          "id": 221492042,
          "name": "Calamar Croustillant / Crispy Calamari",
          "total_item_price": 12.75,
          "price": 12.75,
          "quantity": 1,
          "instructions": null,
          "type": "item",
          "type_id": 7291383,
          "tax_rate": 0.14975,
          "tax_value": 1.71838,
          "parent_id": null,
          "item_discount": 0,
          "cart_discount_rate": 0.1,
          "cart_discount": 1.28,
          "tax_type": "NET",
          "options": []
        },
        {
          "id": 221492089,
          "name": "Nachos Kaizen / Kaizen Nachos",
          "total_item_price": 12.75,
          "price": 12.75,
          "quantity": 1,
          "instructions": null,
          "type": "item",
          "type_id": 7291183,
          "tax_rate": 0.14975,
          "tax_value": 1.71838,
          "parent_id": null,
          "item_discount": 0,
          "cart_discount_rate": 0.1,
          "cart_discount": 1.28,
          "tax_type": "NET",
          "options": []
        },
        {
          "id": 221492221,
          "name": "Poppers de Jalapeno au tofu / Tofu Jalapeno poppers",
          "total_item_price": 11.75,
          "price": 11.75,
          "quantity": 1,
          "instructions": null,
          "type": "item",
          "type_id": 7291406,
          "tax_rate": 0.14975,
          "tax_value": 1.5836,
          "parent_id": null,
          "item_discount": 0,
          "cart_discount_rate": 0.1,
          "cart_discount": 1.18,
          "tax_type": "NET",
          "options": []
        },
        {
          "id": 221492280,
          "name": "Poulet Frit Kaizen / Kaizen Fried Chicken",
          "total_item_price": 13.75,
          "price": 13.75,
          "quantity": 1,
          "instructions": null,
          "type": "item",
          "type_id": 7291413,
          "tax_rate": 0.14975,
          "tax_value": 1.85315,
          "parent_id": null,
          "item_discount": 0,
          "cart_discount_rate": 0.1,
          "cart_discount": 1.38,
          "tax_type": "NET",
          "options": []
        },
        {
          "id": 221492781,
          "name": "No-Tuna Sashimi",
          "total_item_price": 13.5,
          "price": 13.5,
          "quantity": 1,
          "instructions": null,
          "type": "item",
          "type_id": 7291621,
          "tax_rate": 0.14975,
          "tax_value": 1.81946,
          "parent_id": null,
          "item_discount": 0,
          "cart_discount_rate": 0.1,
          "cart_discount": 1.35,
          "tax_type": "NET",
          "options": []
        },
        {
          "id": 221493431,
          "name": "10% DE RABAIS PICK-UP DE 45$+",
          "total_item_price": 0,
          "price": 0,
          "quantity": 1,
          "instructions": null,
          "type": "promo_cart",
          "type_id": 191742,
          "tax_rate": 0,
          "tax_value": 0,
          "parent_id": null,
          "item_discount": 6.45,
          "cart_discount_rate": 0.1,
          "cart_discount": -6.45,
          "tax_type": "NET",
          "coupon": "EQZDESQD0VNPKG",
          "options": []
        }
      ]
    }
  ]
}
JSON;
			$payload = json_decode($json);
			$o = $payload->orders[0];
			$order = Order::withJson($o);
			$this->assertCount(7, $order->getItems());
		}

		public function testWithProdDelivery()
		{
		$json = <<<JSON
{
  "instructions": "Fulfillment option: \"In-person delivery\" Client acknowledged: \"You'll receive a call or doorbell ring when the driver arrives.\"",
  "coupons": [],
  "tax_list": [
    {
      "type": "item",
      "value": 6.85,
      "rate": 0.14975
    }
  ],
  "missed_reason": null,
  "billing_details": null,
  "fulfillment_option": "in_person",
  "id": 168976863,
  "total_price": 57.86,
  "sub_total_price": 45.75,
  "tax_value": 6.85,
  "persons": 0,
  "latitude": 0,
  "longitude": 0,
  "client_first_name": "Jane",
  "client_last_name": "Smith",
  "client_email": "foo@bar.com",
  "client_phone": "+1444222123343",
  "restaurant_name": "Restaurant name",
  "currency": "CAD",
  "type": "delivery",
  "status": "accepted",
  "source": "mobile_web",
  "pin_skipped": true,
  "accepted_at": "2020-10-07T21:46:51.000Z",
  "tax_type": "NET",
  "tax_name": "GST + QST",
  "fulfill_at": "2020-10-07T22:36:51.000Z",
  "reference": null,
  "restaurant_id": 242921,
  "client_id": 5029413,
  "updated_at": "2020-10-07T21:46:51.000Z",
  "restaurant_phone": "+1 512 312 434312",
  "restaurant_timezone": "America/Toronto",
  "company_account_id": 99999,
  "pos_system_id": 25421,
  "restaurant_key": "23r2rwefefdsfasfds",
  "restaurant_country": "Canada",
  "restaurant_city": "Montréal",
  "restaurant_state": "Quebec",
  "restaurant_zipcode": "H3W 1N4",
  "restaurant_street": "16 avenue des Pins Ouest",
  "restaurant_latitude": "41.51527331790095",
  "restaurant_longitude": "-70.57473052209016",
  "client_marketing_consent": true,
  "restaurant_token": "sadf1231242354321432safasdf",
  "gateway_transaction_id": "sdfasfsaf",
  "gateway_type": "stripe",
  "api_version": 2,
  "payment": "ONLINE",
  "for_later": false,
  "client_address": "3570 rue John Doe, Apartment 100, H2X3R1, Montréal",
  "client_address_parts": {
    "street": "3570 rue John Doe",
    "city": "Montréal",
    "zipcode": "H2X3R1",
    "apartment": "100"
  },
  "items": [
    {
      "id": 221500210,
      "name": "TIP",
      "total_item_price": 5.26,
      "price": 5.26,
      "quantity": 1,
      "instructions": null,
      "type": "tip",
      "type_id": null,
      "tax_rate": 0,
      "tax_value": 0,
      "parent_id": null,
      "item_discount": 0,
      "cart_discount_rate": 0,
      "cart_discount": 0,
      "tax_type": "GROSS",
      "options": []
    },
    {
      "id": 221545411,
      "name": "Hibiscus, carottes / Hibiscus, carrots tacos",
      "total_item_price": 12.5,
      "price": 12.5,
      "quantity": 1,
      "instructions": null,
      "type": "item",
      "type_id": 7291492,
      "tax_rate": 0.14975,
      "tax_value": 1.87187,
      "parent_id": null,
      "item_discount": 0,
      "cart_discount_rate": 0,
      "cart_discount": 0,
      "tax_type": "NET",
      "options": []
    },
    {
      "id": 221545620,
      "name": "Soupe ramen aux haricots noirs / Black bean ramen soup",
      "total_item_price": 6,
      "price": 6,
      "quantity": 1,
      "instructions": null,
      "type": "item",
      "type_id": 7291546,
      "tax_rate": 0.14975,
      "tax_value": 0.8985,
      "parent_id": null,
      "item_discount": 0,
      "cart_discount_rate": 0,
      "cart_discount": 0,
      "tax_type": "NET",
      "options": [
        {
          "id": 216903781,
          "name": "Small",
          "price": 0,
          "group_name": "Size",
          "quantity": 1,
          "type": "size",
          "type_id": 3916109
        }
      ]
    },
    {
      "id": 221546928,
      "name": "Salade Tropicale / Tropical Salad",
      "total_item_price": 13.5,
      "price": 13.5,
      "quantity": 1,
      "instructions": null,
      "type": "item",
      "type_id": 7291166,
      "tax_rate": 0.14975,
      "tax_value": 2.02162,
      "parent_id": null,
      "item_discount": 0,
      "cart_discount_rate": 0,
      "cart_discount": 0,
      "tax_type": "NET",
      "options": []
    },
    {
      "id": 221546971,
      "name": "Poulet Frit Kaizen / Kaizen Fried Chicken",
      "total_item_price": 13.75,
      "price": 13.75,
      "quantity": 1,
      "instructions": null,
      "type": "item",
      "type_id": 7291413,
      "tax_rate": 0.14975,
      "tax_value": 2.05906,
      "parent_id": null,
      "item_discount": 0,
      "cart_discount_rate": 0,
      "cart_discount": 0,
      "tax_type": "NET",
      "options": []
    }
  ]
}
JSON;
		$order = Order::withJson(json_decode($json));
		$this->assertCount(5, $order->getItems());
		$this->assertEquals('delivery',$order->getType());

		$expectedFulfilmentTime = Carbon::parse("2020-10-07T22:36:51.000Z");
		$this->assertEquals($expectedFulfilmentTime, $order->getFulfillAt());;
		$this->assertEquals("3570 rue John Doe", $order->getClient()->getAddress()->getStreet());
		$this->assertEquals("H2X3R1", $order->getClient()->getAddress()->getZipcode());
		}

		public function testTipExtraction()
		{
			$order = new Order();
			$json = <<<JSON
{
	"items": [
        {
          "id": 221490258,
          "name": "TIP",
          "total_item_price": 6.67,
          "price": 6.67,
          "quantity": 1,
          "instructions": null,
          "type": "tip",
          "type_id": null,
          "tax_rate": 0,
          "tax_value": 0,
          "parent_id": null,
          "item_discount": 0,
          "cart_discount_rate": 0,
          "cart_discount": 0,
          "tax_type": "GROSS",
          "options": []
        },
        {
          "id": 221492042,
          "name": "Calamar Croustillant / Crispy Calamari",
          "total_item_price": 12.75,
          "price": 12.75,
          "quantity": 1,
          "instructions": null,
          "type": "item",
          "type_id": 7291383,
          "tax_rate": 0.14975,
          "tax_value": 1.71838,
          "parent_id": null,
          "item_discount": 0,
          "cart_discount_rate": 0.1,
          "cart_discount": 1.28,
          "tax_type": "NET",
          "options": []
        },
        {
          "id": 221492089,
          "name": "Nachos Kaizen / Kaizen Nachos",
          "total_item_price": 12.75,
          "price": 12.75,
          "quantity": 1,
          "instructions": null,
          "type": "item",
          "type_id": 7291183,
          "tax_rate": 0.14975,
          "tax_value": 1.71838,
          "parent_id": null,
          "item_discount": 0,
          "cart_discount_rate": 0.1,
          "cart_discount": 1.28,
          "tax_type": "NET",
          "options": []
        },
        {
          "id": 221492221,
          "name": "Poppers de Jalapeno au tofu / Tofu Jalapeno poppers",
          "total_item_price": 11.75,
          "price": 11.75,
          "quantity": 1,
          "instructions": null,
          "type": "item",
          "type_id": 7291406,
          "tax_rate": 0.14975,
          "tax_value": 1.5836,
          "parent_id": null,
          "item_discount": 0,
          "cart_discount_rate": 0.1,
          "cart_discount": 1.18,
          "tax_type": "NET",
          "options": []
        },
        {
          "id": 221492280,
          "name": "Poulet Frit Kaizen / Kaizen Fried Chicken",
          "total_item_price": 13.75,
          "price": 13.75,
          "quantity": 1,
          "instructions": null,
          "type": "item",
          "type_id": 7291413,
          "tax_rate": 0.14975,
          "tax_value": 1.85315,
          "parent_id": null,
          "item_discount": 0,
          "cart_discount_rate": 0.1,
          "cart_discount": 1.38,
          "tax_type": "NET",
          "options": []
        },
        {
          "id": 221492781,
          "name": "No-Tuna Sashimi",
          "total_item_price": 13.5,
          "price": 13.5,
          "quantity": 1,
          "instructions": null,
          "type": "item",
          "type_id": 7291621,
          "tax_rate": 0.14975,
          "tax_value": 1.81946,
          "parent_id": null,
          "item_discount": 0,
          "cart_discount_rate": 0.1,
          "cart_discount": 1.35,
          "tax_type": "NET",
          "options": []
        },
        {
          "id": 221493431,
          "name": "10% DE RABAIS PICK-UP DE 45$+",
          "total_item_price": 0,
          "price": 0,
          "quantity": 1,
          "instructions": null,
          "type": "promo_cart",
          "type_id": 191742,
          "tax_rate": 0,
          "tax_value": 0,
          "parent_id": null,
          "item_discount": 6.45,
          "cart_discount_rate": 0.1,
          "cart_discount": -6.45,
          "tax_type": "NET",
          "coupon": "EQZDESQD0VNPKG",
          "options": []
        }
      ]
  }
JSON;
			$payload = json_decode($json);
			foreach ($payload->items as $item)
			{
				$order->addItem(Item::withJson($item));
			}
			$this->assertEquals(6.67, $order->getTotalTipAmount() );
		}

		public function testItems()
		{
			$json = <<<JSON
{
  "count": 1,
  "orders": [
    {
      "instructions": null,
      "coupons": [],
      "tax_list": [
        {
          "type": "item",
          "value": 8.69,
          "rate": 0.14975
        }
      ],
      "missed_reason": null,
      "billing_details": null,
      "fulfillment_option": null,
      "id": 168968914,
      "total_price": 73.41,
      "sub_total_price": 58.05,
      "tax_value": 8.69,
      "persons": 0,
      "latitude": "46.493142400535476",
      "longitude": "-72.56673801471518",
      "client_first_name": "Boaty",
      "client_last_name": "McBoatface",
      "client_email": "boats@foo.com",
      "client_phone": "+1514123456",
      "restaurant_name": "Some Resto",
      "currency": "CAD",
      "type": "pickup",
      "status": "accepted",
      "source": "mobile_web",
      "pin_skipped": false,
      "accepted_at": "2020-10-07T20:19:34.000Z",
      "tax_type": "NET",
      "tax_name": "GST + QST",
      "fulfill_at": "2020-10-08T00:00:00.000Z",
      "reference": null,
      "restaurant_id": 9999,
      "client_id": 9999,
      "updated_at": "2020-10-07T20:19:34.000Z",
      "restaurant_phone": "+1 514 312 6887",
      "restaurant_timezone": "America/Toronto",
      "company_account_id": 946395,
      "pos_system_id": 25422,
      "restaurant_key": "ZJvEQu4k0SZ5expy5",
      "restaurant_country": "Canada",
      "restaurant_city": "Montréal",
      "restaurant_state": "Quebec",
      "restaurant_zipcode": "H2W 1N5",
      "restaurant_street": "101 rue St Catherine",
      "restaurant_latitude": "49.51527331790095",
      "restaurant_longitude": "-72.57473052209016",
      "client_marketing_consent": true,
      "restaurant_token": "ABC123",
      "gateway_transaction_id": "1234455",
      "gateway_type": "stripe",
      "api_version": 2,
      "payment": "ONLINE",
      "for_later": true,
      "client_address": null,
      "client_address_parts": null,
      "items": [
        {
          "id": 221490258,
          "name": "TIP",
          "total_item_price": 6.67,
          "price": 6.67,
          "quantity": 1,
          "instructions": null,
          "type": "tip",
          "type_id": null,
          "tax_rate": 0,
          "tax_value": 0,
          "parent_id": null,
          "item_discount": 0,
          "cart_discount_rate": 0,
          "cart_discount": 0,
          "tax_type": "GROSS",
          "options": []
        },
        {
          "id": 221492042,
          "name": "Calamar Croustillant / Crispy Calamari",
          "total_item_price": 12.75,
          "price": 12.75,
          "quantity": 1,
          "instructions": null,
          "type": "item",
          "type_id": 7291383,
          "tax_rate": 0.14975,
          "tax_value": 1.71838,
          "parent_id": null,
          "item_discount": 0,
          "cart_discount_rate": 0.1,
          "cart_discount": 1.28,
          "tax_type": "NET",
          "options": []
        },       
        {
          "id": 221493431,
          "name": "10% DE RABAIS PICK-UP DE 45$+",
          "total_item_price": 0,
          "price": 0,
          "quantity": 1,
          "instructions": null,
          "type": "promo_cart",
          "type_id": 191742,
          "tax_rate": 0,
          "tax_value": 0,
          "parent_id": null,
          "item_discount": 6.45,
          "cart_discount_rate": 0.1,
          "cart_discount": -6.45,
          "tax_type": "NET",
          "coupon": "EQZDESQD0VNPKG",
          "options": []
        }
      ]
    }
  ]
}
JSON;
			$payload = json_decode($json);
			$o = $payload->orders[0];
			$order = Order::withJson($o);
			$actual = [];
			foreach($order->getItems() as $item)
			{
				$actual[] = $item->getId();
			}
			$expected = [221493431,221492042,221490258];
			$this->assertEquals(sort($expected),sort($actual));
		}
	}
