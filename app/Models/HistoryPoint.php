<?php

namespace App\Models;

use App\Enums\MessageType;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// todo: cast encryption
class HistoryPoint extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'user_id', 'details'];
    
    public function cast() {
        return [
            'type' => MessageType::class,
        ];
    }
   
    // getters, setters, relations

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    // Envy custom
    public static function addEvent($_detail, $_type = MessageType::INFO) {
        return self::create([
            'user_id' => auth()->user()->id,
            'details' => $_detail,
            'type' => $_type,
        ]);
    }
}
