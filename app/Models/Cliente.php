<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'clientes';

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
    protected $with = ['escritorio', 'nacionalidade', 'ocupacao', 'cidade'];

    
    public function escritorio()
    {
        return $this->belongsTo(Escritorio::class);
    }

    public function nacionalidade()
    {
        return $this->belongsTo(Cidade::class, 'nacionalidade');
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
