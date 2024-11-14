<?php declare(strict_types=1);

namespace Tests\Killertux\KuidPhp;

use Killertux\KuidPhp\KUID36;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class KUID36Test extends TestCase {

	public function testFromUUID(): void {
		$uuid_1 = Uuid::fromString('9b4d0c5f-85e4-4aa0-afd4-b14ee901a246');
		$uuid_2 = Uuid::fromString('ffffffff-ffff-ffff-ffff-ffffffffffff');
		self::assertEquals('96ZOA5NS2NCE414W6BD2A7Q6E', KUID36::fromUUID($uuid_1)->toString());
		self::assertEquals('F5LXX1ZZ5PNORYNQGLHZMSP33', KUID36::fromUUID($uuid_2)->toString());
	}

	public function testAsUUID(): void {
		$kuid = KUID36::fromString('96ZOA5NS2NCE414W6BD2A7Q6E');
		self::assertTrue(Uuid::fromString('9b4d0c5f-85e4-4aa0-afd4-b14ee901a246')->equals($kuid->toUUID()));
	}

	public function testFromString(): void {
		$kuid_1 = KUID36::random();
		$kuid_2 = KUID36::new();
		self::assertEquals(KUID36::random(), KUID36::fromString($kuid_1->toString()));
		self::assertEquals(KUID36::random(), KUID36::fromString($kuid_2->toString()));
	}

}