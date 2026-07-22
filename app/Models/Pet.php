<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use Database\Factories\CategoryFactory;
// use Database\Factories\UserFactory;
use Database\Factories\PetFactory;

class Pet extends Model
{
    /** @use HasFactory<PetFactory> */
    use HasFactory;

    // TAMBAHKAN BARIS INI:
    protected $fillable = ['name', 'photo', 'age', 'gender', 'condition', 'bio', 'category_id', 'user_id'];

    /**
     * @return BelongsTo<Category, $this>
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
