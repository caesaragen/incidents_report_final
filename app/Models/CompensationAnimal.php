<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompensationAnimal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'incident_type_id',
    ];

    public function incidentType()
    {
        return $this->belongsTo(IncidentType::class);
    }
}
