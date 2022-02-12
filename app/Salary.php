<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Salary
 *
 * @property int $id
 * @property int $employee_id
 * @property string $amount
 * @property string|null $date
 * @property string|null $month
 * @property string|null $year
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Employee $employee
 * @method static \Illuminate\Database\Eloquent\Builder|Salary newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Salary newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Salary query()
 * @method static \Illuminate\Database\Eloquent\Builder|Salary whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salary whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salary whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salary whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salary whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salary whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salary whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salary whereYear($value)
 * @mixin \Eloquent
 */
class Salary extends Model
{
    protected $fillable = [
        'employee_id',
        'amount',
        'date',
        'month',
        'year',
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}