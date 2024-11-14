<?php declare(strict_types=1);

namespace Killertux\KuidPhp;

class KUID36 extends KUIDBase {
	public static function getBase(): string {
		return "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	}

	public static function getStringSize(): int {
		return 25;
	}
}