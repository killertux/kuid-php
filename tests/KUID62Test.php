<?php declare(strict_types=1);

namespace Tests\Killertux\KuidPhp;


use Killertux\KuidPhp\KUID62;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class KUID62Test extends TestCase {

	public function testFromUUID(): void {
		$uuid_1 = Uuid::fromString('9b4d0c5f-85e4-4aa0-afd4-b14ee901a246');
		$uuid_2 = Uuid::fromString('ffffffff-ffff-ffff-ffff-ffffffffffff');
		self::assertEquals('4j31M44YnkT8uMi9FPlbsc', KUID62::fromUUID($uuid_1)->toString());
		self::assertEquals('7n42DGM5Tflk9n8mt7Fhc7', KUID62::fromUUID($uuid_2)->toString());
	}

	public function testAsUUID(): void {
		$kuid = KUID62::fromString('4j31M44YnkT8uMi9FPlbsc');
		self::assertTrue(Uuid::fromString('9b4d0c5f-85e4-4aa0-afd4-b14ee901a246')->equals($kuid->toUUID()));
	}

	public function testFromString(): void {
		$kuid_1 = KUID62::random();
		$kuid_2 = KUID62::new();
		self::assertEquals($kuid_1, KUID62::fromString($kuid_1->toString()));
		self::assertEquals($kuid_2, KUID62::fromString($kuid_2->toString()));
	}
}
