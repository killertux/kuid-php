<?php declare(strict_types=1);

namespace Tests\Killertux\KuidPhp;


use Killertux\KuidPhp\KUID62;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class KUID62Test extends TestCase {

	public function testFromUUID(): void {
		$uuid_1 = Uuid::fromString('9b4d0c5f-85e4-4aa0-afd4-b14ee901a246');
		$uuid_2 = Uuid::fromString('ffffffff-ffff-ffff-ffff-ffffffffffff');
		$uuid_3 = Uuid::fromString('01932c4e-5454-72fb-b78f-0024bc30dcc5');
		self::assertEquals('4j31M44YnkT8uMi9FPlbsc', KUID62::fromUUID($uuid_1)->toString());
		self::assertEquals('7n42DGM5Tflk9n8mt7Fhc7', KUID62::fromUUID($uuid_2)->toString());
		self::assertEquals('02yFXKuqW0QOFHl243ilJV', KUID62::fromUUID($uuid_3)->toString());
	}

	public function testAsUUID(): void {
		$kuid = KUID62::fromString('4j31M44YnkT8uMi9FPlbsc');
		self::assertTrue(Uuid::fromString('9b4d0c5f-85e4-4aa0-afd4-b14ee901a246')->equals($kuid->toUUID()));
	}

	public function testFromString(): void {
		$kuid_1 = KUID62::random();
		$kuid_2 = KUID62::new();
		self::assertTrue($kuid_1->equals(KUID62::fromString($kuid_1->toString())));
		self::assertTrue($kuid_2->equals(KUID62::fromString($kuid_2->toString())));
	}

	public function testEquals(): void {
		$kuid = KUID62::random();
		self::assertTrue($kuid->equals($kuid));
		self::assertFalse($kuid->equals(KUID62::random()));
	}
}
