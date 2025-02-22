<?php

declare(strict_types=1);

/**
 * FileCallback module.
 *
 * This file is part of MadelineProto.
 * MadelineProto is free software: you can redistribute it and/or modify it under the terms of the GNU Affero General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * MadelineProto is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU Affero General Public License for more details.
 * You should have received a copy of the GNU General Public License along with MadelineProto.
 * If not, see <http://www.gnu.org/licenses/>.
 *
 * @author    Daniil Gentili <daniil@daniil.it>
 * @copyright 2016-2023 Daniil Gentili <daniil@daniil.it>
 * @license   https://opensource.org/licenses/AGPL-3.0 AGPLv3
 * @link https://docs.madelineproto.xyz MadelineProto documentation
 */

namespace danog\MadelineProto;

/**
 * File callback interface.
 */
final class FileCallback implements FileCallbackInterface
{
    /**
     * Callback.
     *
     * @var callable(float, float, int)
     */
    public readonly mixed $callback;
    /**
     * Construct file callback.
     *
     * @param mixed    $file     File to download/upload
     * @param callable(float, float, int) $callback Callback
     */
    public function __construct(public readonly mixed $file, callable $callback)
    {
        $this->callback = $callback;
    }
    /**
     * Get file.
     */
    public function getFile(): mixed
    {
        return $this->file;
    }
    public function __invoke(float $percent, float $speed, float $time): void
    {
        $callback = $this->callback;
        $callback($percent, $speed, $time);
    }
}
