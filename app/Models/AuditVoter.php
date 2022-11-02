<?php

namespace App\Models;

use App\Traits\Auditable;
use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuditVoter extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Auditable;

    public $table = 'audit_voters';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'organization_id',
        'position_id',
        'candidate_id',
        'voter_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id');
    }

    public function voter()
    {
        return $this->belongsTo(Voter::class, 'voter_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
