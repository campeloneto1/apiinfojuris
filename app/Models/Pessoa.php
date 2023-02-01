<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pessoas';

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
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
      
        'key'
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['escritorio', 'nacionalidade', 'ocupacao', 'cidade', 'estado_civil', 'sexo'];

     public function processos()
    {
        return $this->belongsToMany(Processos::class, 'processos_pessoas', 'user_id', 'processo_id')->withPivot('id', 'tipo_id');
        //return $this->hasMany(IrsoUser::class, 'user_id');
    }
    
    public function escritorio()
    {
        return $this->belongsTo(Escritorio::class);
    }

     public function estado_civil()
    {
        return $this->belongsTo(EstadoCivil::class);
    }

     public function sexo()
    {
        return $this->belongsTo(Sexo::class);
    }

    public function nacionalidade()
    {
        return $this->belongsTo(Cidade::class, 'nacionalidade_id');
    }

    public function ocupacao()
    {
        return $this->belongsTo(Ocupacao::class);
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
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
