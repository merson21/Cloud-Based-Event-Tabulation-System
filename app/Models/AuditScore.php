<?php

namespace App\Models;

use App\Traits\Auditable;
use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuditScore extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use HasFactory;
    use Auditable;

    public $table = 'audit_scores';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title_id',
        'category_id',
        'criteria_id',
        'judge_id',
        'participant_id',
        'scores',
        'created_at',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    public function title()
    {
        return $this->belongsTo(Title::class, 'title_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function criteria()
    {
        return $this->belongsTo(Criterion::class, 'criteria_id');
    }

    public function judge()
    {
        return $this->belongsTo(Judge::class, 'judge_id');
    }

    public function participant()
    {
        return $this->belongsTo(Participant::class, 'participant_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
