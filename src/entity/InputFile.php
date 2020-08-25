<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license GPL
 * @version 25.08.20 17:29:58
 */

declare(strict_types = 1);

namespace dicr\telegram\entity;

use dicr\telegram\TelegramEntity;

/**
 * This object represents the contents of a file to be uploaded. Must be posted using multipart/form-data in the
 * usual way that files are uploaded via the browser.
 *
 * @link https://core.telegram.org/bots/api#inputfile
 */
class InputFile extends TelegramEntity
{

}
