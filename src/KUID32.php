<?php declare(strict_types=1);

namespace Killertux\KuidPhp;

class KUID32 extends KUIDBase {
	public static function getBase(): string {
		return "ABCDEFGHIJKLMNOPQRSTUVWXYZ234567";
	}

	public static function getStringSize(): int {
		return 26;
	}

}