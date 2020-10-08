<?php

	namespace GloriaFood\models;

	use PHPUnit\Framework\TestCase;

	class ClientAddressTest extends TestCase
	{

		public function testWhenNoAddress()
		{
			$payload = json_decode(
				<<<JSON
{
      "client_address": null,
      "client_address_parts": null
}
JSON);
			$this->assertNull(ClientAddress::withJson($payload));
		}

		public function testWithJson()
		{
			$expected = new ClientAddress();
			$expected->setStreet("101 Foo Street");
			$expected->setCity("Fooville");
			$expected->setLatitude("38.8951");
			$expected->setLongitude("-77.0364");
			$expected->setPinSkipped(false);
			$expected->setFullAddress("101 Foo Street Foo Foo Foo");
			$expected->setIntercom("Intercom");
			$expected->setZipcode("ABC123");
			$expected->setApartment("Apt 1");
			$expected->setBloc("Bloc B");
			$expected->setFloor("Floor 1");
			$expected->setMoreAddress("Extra info");

			$json = <<<JSON
 {
      "latitude":"38.8951",
      "longitude":"-77.0364",
      "pin_skipped":false,
      "client_address_parts": {
        "street": "101 Foo Street",
        "city": "Fooville",
       "full_address":"101 Foo Street Foo Foo Foo",
       "intercom":"Intercom",
       "zipcode":"ABC123",
       "apartment":"Apt 1",
       "bloc":"Bloc B",
       "floor":"Floor 1",
       "more_address":"Extra info"
      }
    }
JSON;

			$this->assertTrue($expected == ClientAddress::withJson(json_decode($json)));
		}
	}
