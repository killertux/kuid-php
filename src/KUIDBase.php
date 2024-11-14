<?php declare(strict_types=1);

namespace Killertux\KuidPhp;

use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

abstract class KUIDBase implements KUIDInterface {

	private const BASE16 = "0123456789abcdef";

	public function __construct(private readonly \GMP $uuid_as_number) {}

	public static function fromUUID(UuidInterface $uuid): static {
		return new static(static::decode_number($uuid->getHex()->toString(), self::BASE16));
	}

	public static function random(): self {
		return self::fromUUID(Uuid::uuid4());
	}

	public static function new(): self {
		return self::fromUUID(Uuid::uuid7());
	}

	public static function fromString(string $string): static {
		if (strlen($string) !== static::getStringSize()) {
			throw new \InvalidArgumentException('Invalid string size');
		}
		return new static(static::decode_number($string, static::getBase()));
	}

	public function toString(): string {
		return (string)$this;
	}

	public function toUUID(): UuidInterface {
		return Uuid::fromHexadecimal(new Hexadecimal(self::encode_number($this->uuid_as_number, 32, self::BASE16)));
	}

	public function equals(self $other): bool {
		return \gmp_cmp($this->uuid_as_number, $other->uuid_as_number) === 0;
	}

	public function __toString(): string {
		return self::encode_number($this->uuid_as_number, static::getStringSize(), static::getBase());
	}

	public abstract static function getBase(): string;
	public abstract static function getStringSize(): int;

	private static function encode_number(\GMP $number, int $size, string $base): string {
		$result = '';
		$base_n = strlen($base);
		while ($number != 0) {
			$index = gmp_mod($number, $base_n);
			$number = gmp_div($number, $base_n);
			$result = $base[(int)$index] . $result;
		}
		return \str_pad($result, $size, $base[0], STR_PAD_LEFT);
	}

	private static function decode_number(string $encoded, string $base): \GMP {
		$result = new \GMP(0);
		$base_n = strlen($base);
		$length = strlen($encoded);
		for ($i = 0; $i < $length; $i++) {
			$index = strpos($base, $encoded[$i]);
			$result = \gmp_add(\gmp_mul($result, $base_n), $index);
		}
		return $result;
	}
}