<?php declare(strict_types=1);

namespace Tests\Killertux\KuidPhp;

use Killertux\KuidPhp\KUID32;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class KUID32Test extends TestCase {
	public function testFromUUID(): void {
		$uuid_1 = Uuid::fromString('9b4d0c5f-85e4-4aa0-afd4-b14ee901a246');
		$uuid_2 = Uuid::fromString('ffffffff-ffff-ffff-ffff-ffffffffffff');
		$uuid_3 = Uuid::fromString('01932c4e-5454-72fb-b78f-0024bc30dcc5');
		self::assertEquals('E3JUGF7BPEJKQK7VFRJ3UQDISG', KUID32::fromUUID($uuid_1)->toString());
		self::assertEquals('H7777777777777777777777777', KUID32::fromUUID($uuid_2)->toString());
		self::assertEquals('ABSMWE4VCUOL53PDYAES6DBXGF', KUID32::fromUUID($uuid_3)->toString());
	}

	public function testAsUUID(): void {
		$kuid = KUID32::fromString('E3JUGF7BPEJKQK7VFRJ3UQDISG');
		self::assertTrue(Uuid::fromString('9b4d0c5f-85e4-4aa0-afd4-b14ee901a246')->equals($kuid->toUUID()));
	}

	public function testFromString(): void {
		$kuid_1 = KUID32::random();
		$kuid_2 = KUID32::new();
		self::assertTrue($kuid_1->equals(KUID32::fromString($kuid_1->toString())));
		self::assertTrue($kuid_2->equals(KUID32::fromString($kuid_2->toString())));
	}

	public function testEquals(): void {
		$kuid = KUID32::random();
		self::assertTrue($kuid->equals($kuid));
		self::assertFalse($kuid->equals(KUID32::random()));
	}
}