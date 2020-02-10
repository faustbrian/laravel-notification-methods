<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Notification Methods.
 *
 * (c) KodeKeep <hello@kodekeep.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KodeKeep\NotificationMethods\Models;

use Illuminate\Database\Eloquent\Model;

class NotificationMethod extends Model
{
    public function getFillable()
    {
        $result = ['name', 'channel'];

        foreach (config('notification-methods.channels') as $channel) {
            foreach (\array_keys($channel['properties']) as $property) {
                $result[] = $property;
            }
        }

        return $result;
    }

    public function notifiable()
    {
        return $this->morphTo('notifiable');
    }
}