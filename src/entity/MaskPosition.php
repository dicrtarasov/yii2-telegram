<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 23.01.22 03:40:20
 */

declare(strict_types=1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object describes the position on faces where a mask should be placed by default.
 *
 * @link https://core.telegram.org/bots/api#maskposition
 */
class MaskPosition extends TelegramEntity
{
    public const POINT_FOREHEAD = 'forehead';

    public const POINT_EYES = 'eyes';

    public const POINT_MOUTH = 'mouth';

    public const POINT_CHIN = 'chin';

    /**
     * The part of the face relative to which the mask should be placed.
     * One of “forehead”, “eyes”, “mouth”, or “chin”.
     */
    public ?string $point = null;

    /**
     * Shift by X-axis measured in widths of the mask scaled to the face size, from left to right.
     * For example, choosing -1.0 will place mask just to the left of the default mask position.
     */
    public ?float $xShift = null;

    /**
     * Shift by Y-axis measured in heights of the mask scaled to the face size, from top to bottom.
     * For example, 1.0 will place the mask just below the default mask position.
     */
    public ?float $yShift = null;

    /** Mask scaling coefficient. For example, 2.0 means double size. */
    public ?float $scale = null;
}
