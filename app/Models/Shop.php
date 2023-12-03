<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;


    
    // ***************************************************
    // Relationship
    // ***************************************************

    /**
     * Uniformes asociados a empleados
     **/
    public function uniforms()
    {
        return $this->belongsToMany(Uniform::class, 'employee_uniforms')
                    ->withPivot('application_date', 'delivery_date', 'status', 'description', 'amount', 'state', 'document_support', 'employee_id','uniform_id','id');
    }

}
