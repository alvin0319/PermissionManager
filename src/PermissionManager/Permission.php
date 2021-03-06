<?php

/*
 *       _       _        ___ _____ _  ___
 *   __ _| |_   _(_)_ __  / _ \___ // |/ _ \
 * / _` | \ \ / / | '_ \| | | ||_ \| | (_) |
 * | (_| | |\ V /| | | | | |_| |__) | |\__, |
 *  \__,_|_| \_/ |_|_| |_|\___/____/|_|  /_/
 *
 * Copyright (C) 2019 alvin0319
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

namespace PermissionManager;

class Permission
{

	private $name;

	protected $permissions = [];

	public function __construct(string $name, array $permissions = [])
	{
		$this->name = $name;
		$this->permissions = $permissions;
	}

	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * @return string[]
	 */
	public function getPermissions(): array
	{
		return $this->permissions;
	}

	public function addPermission(string $permission)
	{
		if ($permission === "op") {
			$this->permissions[] = "op";
		} else {
			$this->permissions[] = $permission;
		}
	}

	public static function jsonDeserialize(array $data): Permission
	{
		return new Permission(
			(string)$data["name"],
			(array)$data["permission"]
		);
	}

	public function jsonSerialize(): array
	{
		return [
			"name" => $this->name,
			"permission" => $this->permissions
		];
	}
}