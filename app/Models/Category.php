<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use Auditable;
    use HasFactory;

    public const STATUS_RADIO = [
        'true'  => 'Enable',
        'false' => 'Disable',
    ];

    public const PERCENTAGE_SELECT = [
        '100' => '100%',
        '95'  => '95%',
        '90'  => '90%',
        '85'  => '85%',
        '80'  => '80%',
        '75'  => '75%',
        '70'  => '70%',
        '65'  => '65%',
        '60'  => '60%',
        '55'  => '55%',
        '50'  => '50%',
        '45'  => '45%',
        '40'  => '40%',
        '35'  => '35%',
        '30'  => '30%',
        '25'  => '25%',
        '20'  => '20%',
        '15'  => '15%',
        '10'  => '10%',
        '5'   => '5%',
    ];

    public $table = 'categories';

    public static $searchable = [
        'name',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'status',
        'title_id',
        'name',
        'percentage',
        'partipants',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    public function title()
    {
        return $this->belongsTo(Title::class, 'title_id');
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
