<?php declare(strict_types=1);

namespace Killertux\KuidPhp;

use Ramsey\Uuid\UuidInterface;

interface KUIDInterface {

	public static function fromUUID(UuidInterface $uuid): static;
	public static function random();
	public static function fromString(string $string): static;
	public function toUUID(): UuidInterface;
	public function toString(): string;
	public function equals(self $other): bool;
	public function __toString(): string;
}