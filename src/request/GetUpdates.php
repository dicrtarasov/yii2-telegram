<?php
/*
 * @copyright 2019-2020 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 05.11.20 04:48:05
 */

declare(strict_types = 1);
namespace dicr\telegram\request;

use dicr\telegram\entity\Update;
use dicr\telegram\TelegramRequest;
use yii\base\Exception;

use function array_map;

/**
 * Use this method to receive incoming updates using long polling (wiki).
 * An Array of Update objects is returned.
 *
 * https://core.telegram.org/bots/api#getupdates
 */
class GetUpdates extends TelegramRequest
{
    /**
     * @var ?int Identifier of the first update to be returned.
     * Must be greater by one than the highest among the identifiers of previously received updates.
     * By default, updates starting with the earliest unconfirmed update are returned. An update is
     * considered confirmed as soon as getUpdates is called with an offset higher than its update_id.
     * The negative offset can be specified to retrieve updates starting from -offset update from the
     * end of the updates queue. All previous updates will forgotten.
     */
    public $offset;

    /**
     * @var ?int
     * Limits the number of updates to be retrieved. Values between 1-100 are accepted. Defaults to 100.
     */
    public $limit;

    /**
     * @var ?int
     * Timeout in seconds for long polling. Defaults to 0, i.e. usual short polling. Should be positive, short
     * polling should be used for testing purposes only.
     */
    public $timeout;

    /**
     * @var ?string[]
     * A JSON-serialized list of the update types you want your bot to receive. For example,
     * specify [“message”, “edited_channel_post”, “callback_query”] to only receive updates of
     * these types. See Update for a complete list of available update types. Specify an empty
     * list to receive all updates regardless of type (default). If not specified, the previous
     * setting will be used.
     *
     * Please note that this parameter doesn't affect updates created before the call to the
     * getUpdates, so unwanted updates may be received for a short period of time.
     */
    public $allowedUpdates;

    /**
     * @inheritDoc
     */
    public function rules() : array
    {
        return [
            ['offset', 'default'],
            ['offset', 'integer', 'min' => 0],
            ['offset', 'filter', 'filter' => 'intval', 'skipOnEmpty' => true],

            ['limit', 'default'],
            ['limit', 'integer', 'min' => 1, 'max' => 100],
            ['limit', 'filter', 'filter' => 'intval', 'skipOnEmpty' => true],

            ['timeout', 'default'],
            ['timeout', 'integer', 'min' => 0],
            ['timeout', 'filter', 'filter' => 'intval', 'skipOnEmpty' => true],

            ['allowedUpdates', 'default'],
            ['allowedUpdates', 'each', 'rule' => ['string']],
        ];
    }

    /**
     * @inheritDoc
     */
    public function func() : string
    {
        return 'getUpdates';
    }

    /**
     * @inheritDoc
     * @return Update[]
     * @throws Exception
     */
    public function send() : array
    {
        // преобразуем массив объектов Update
        return array_map(static function ($data) : Update {
            return new Update([
                'json' => $data
            ]);
        }, parent::send());
    }
}
