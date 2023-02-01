<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audiencia extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'audiencias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        
    ];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['processo', 'status', 'pessoas'];

    
    public function processo()
    {
        return $this->belongsTo(Processo::class);
    }

    public function pessoas()
    {
        return $this->belongsToMany(Pessoa::class, 'audiencias_pessoas', 'audiencia_id', 'pessoa_id')->withPivot('id');
        //return $this->hasMany(IrsoUser::class, 'user_id');
    }


      public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updated_by()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
