<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processo extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'processos';

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
    protected $with = ['pessoas', 'escritorio', 'natureza', 'vara', 'status'];


     public function audiencias()
    {
        return $this->hasMany(Audiencia::class, 'processo_id');
        //return $this->hasMany(IrsoUser::class, 'user_id');
    }

    public function pessoas()
    {
        return $this->belongsToMany(Pessoa::class, 'processos_pessoas', 'processo_id', 'pessoa_id')->withPivot('id', 'tipo_id');
        //return $this->hasMany(IrsoUser::class, 'user_id');
    }

    public function escritorio()
    {
        return $this->belongsTo(Escritorio::class);
    }

     public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function natureza()
    {
        return $this->belongsTo(Natureza::class);
    }

    public function vara()
    {
        return $this->belongsTo(Vara::class);
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
