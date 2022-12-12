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
    protected $with = ['autor', 'reu', 'escritorio', 'natureza', 'vara'];

    public function autor()
    {
        return $this->belongsTo(User::class, 'autor');
    }

    public function reu()
    {
        return $this->belongsTo(User::class, 'reu');
    }

    public function escritorio()
    {
        return $this->belongsTo(Escritorio::class);
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
