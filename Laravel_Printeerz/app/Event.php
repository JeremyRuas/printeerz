<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Customer;
use App\TypeEvent;

class Event extends Model
{
    protected $fillable = [
        'nom', 'customer_id', 'annonceur', 'logoName', 'lieu', 'date', 'type', 'contact', 'commentaire'
    ];

    public function customer() {
        return $this->belongsTo('App\Customer');
    }

    public function typeEvents() {
        return $this->belongstoMany('App\TypeEvent');
    }

    public function getTypeEventsListAttribute() {
        if($this->id){
            return $this->typeEvents()->pluck('id');
        }            
    }

    public function setTypeTypeEventsListAttribute($value) {
        return $this->typeEvents()->sync($value);
    }
}
