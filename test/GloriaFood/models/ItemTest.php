<?php

	namespace Test\GloriaFood\models;

	use GloriaFood\models\Item;
	use PHPUnit\Framework\TestCase;

	class ItemTest extends TestCase
	{

		public function testItemConstructionFromJson()
		{
			$expected = new Item();
			$expected->setId(27160);
			$expected->setName("DELIVERY_FEE");
			$expected->setTotalItemPrice(10);
			$expected->setPrice(10);
			$expected->setQuantity(1);
			$expected->setType('delivery_fee');
			$expected->setItemDiscount(0);
			$expected->setCartDiscount(0);
			$expected->setCartDiscountRate(0);
			$json = <<<JSON
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
    }
JSON;
			$this->assertTrue($expected == Item::withJson(json_decode($json)));
		}

		public function testJsonSerialize()
		{
			$json = <<<JSON
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
        }
JSON;
			$item = Item::withJson(json_decode($json));
			$this->assertJson($json, json_encode($item));
		}

		public function testJsonSerializeWithOptions()
		{
			$json = <<<JSON
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
        }
JSON;
			$item = Item::withJson(json_decode($json));
			$this->assertJson($json, json_encode($item));
		}
	}
