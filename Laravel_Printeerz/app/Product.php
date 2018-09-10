<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Couleur;
use App\Zone;
use App\Taille;

class Product extends Model
{
    protected $fillable = [
        'nom', 'reference', 'sexe', 'commentaire', 'tailles_list', 'couleurs_list','zones_list','imageName'
    ];

    /*~~~~~~~~~~~_____Relation Many to Many avec les tailles dispo____~~~~~~~~~~~~*/


      public function tailles() {
        return $this->belongsToMany('App\Taille');
    }

    public function getTaillesListAttribute(){
        if($this->id){
            return $this->tailles->pluck('id');
        }            
    }

    public function setTaillesListAttribute($value){
        return $this->tailles()->sync($value);
    }
     /*~~~~~~~~~~~_____Relation Many to Many avec les couleurs dispo____~~~~~~~~~~~~*/

    public function couleurs() {
        return $this->belongsToMany('App\Couleur');
    }

    public function getCouleursListAttribute(){
        if($this->id){
            return $this->couleurs->pluck('id');
        }            
    }

    public function setCouleursListAttribute($value){
        return $this->couleurs()->sync($value);
    }

    /*~~~~~~~~~~~_____Relation Many to Many avec les zones d'impression____~~~~~~~~~~~~*/

    public function zones() {
        return $this->belongsToMany('App\Zone');
    }

    public function getZonesListAttribute(){
        if($this->id){
            return $this->zones->pluck('id');
        }            
    }

    public function setZonesListAttribute($value){
        return $this->zones()->sync($value);
    }


}