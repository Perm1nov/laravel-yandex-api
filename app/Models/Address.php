<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Address
 *
 * @property int $id
 * @property string $name
 * @property $position
 * @property $created_at
 * @property $updated_at
 */
class Address extends Model
{
    use HasFactory;
}
