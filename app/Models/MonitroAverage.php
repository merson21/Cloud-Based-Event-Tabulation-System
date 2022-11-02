<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MonitroAverage extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'monitro_averages';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title_id',
        'category_id',
        'judge_id',
        'participant_id',
        'average',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function title()
    {
        return $this->belongsTo(Title::class, 'title_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function participant()
    {
        return $this->belongsTo(Participant::class, 'participant_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
