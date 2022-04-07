<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;
    protected $table = 'event_tickets';
    protected $primaryLey = 'id';
    protected $fillable = [
        'event_id',
        'name',
        'cost',
        'special_validity'
    ];
    public $timestamps = false;

    

    public function apiv()
    {        
        
        if(!$this->special_validity) {
            return true;
        }

        $arr = json_decode($this->special_validity, true);

        $type = $arr['type'];
        if ($type == 'date')
        {
            return $arr['date'] > now();
        }
        else 
        {
            return $arr['amount'] > 0;
        }

       
    }

    // public function getSpecialValidityAttribute($value)
    // {   
    public function specialval()
    {        
        // if(is_null($value)) {
        //     return '';
        // }

        // $arr = json_decode($value, true);
        if(!$this->special_validity) {
            return true;
        }

        $arr = json_decode($this->special_validity, true);

        $type = $arr['type'];
        

        $specialValidity = match($type) {
            'date' => 'Available until ' . Carbon::parse($arr['date'])->format('F d, Y'),
            'amount' => $arr['amount'] . " tickets available"
        };        
        
        return $specialValidity;
    }
}
