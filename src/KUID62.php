<?php declare(strict_types=1);

namespace Killertux\KuidPhp;


class KUID62 extends KUIDBase {
	public static function getBase(): string {
		return "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
	}

	public static function getStringSize(): int {
		return 22;
	}
}