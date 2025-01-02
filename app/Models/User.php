<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method \Illuminate\Database\Eloquent\Relations\HasMany studyPlans()
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\StudyPlan[] $studyPlans
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['username', 'password'];

    /**
     * Relacionamento com StudyPlan.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studyPlans(): HasMany
    {
        return $this->hasMany(StudyPlan::class);
    }
}
