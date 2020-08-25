<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 26.08.20 00:38:07
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object describes the position on faces where a mask should be placed by default.
 *
 * @link https://core.telegram.org/bots/api#maskposition
 */
class MaskPosition extends TelegramEntity
{
    /** @var string */
    public const POINT_FOREHEAD = 'forehead';

    /** @var string */
    public const POINT_EYES = 'eyes';

    /** @var string */
    public const POINT_MOUTH = 'mouth';

    /** @var string */
    public const POINT_CHIN = 'chin';

    /**
     * @var string The part of the face relative to which the mask should be placed.
     * One of “forehead”, “eyes”, “mouth”, or “chin”.
     */
    public $point;

    /**
     * @var float Shift by X-axis measured in widths of the mask scaled to the face size, from left to right.
     * For example, choosing -1.0 will place mask just to the left of the default mask position.
     */
    public $xShift;

    /**
     * @var float Shift by Y-axis measured in heights of the mask scaled to the face size, from top to bottom.
     * For example, 1.0 will place the mask just below the default mask position.
     */
    public $yShift;

    /**
     * @var float Mask scaling coefficient. For example, 2.0 means double size.
     */
    public $scale;
}
