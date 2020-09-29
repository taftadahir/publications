<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipe extends Model
{
    use SoftDeletes;

    protected $table = 'equipes';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom_equipe',
        'laboratoire_id',
        'responsable',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Get the User that owns the Product.
     */
    public function laboratoire()
    {
        return $this->belongsTo('App\Laboratoire');
    }

    /**
     * Get the sender that owns the mail.
     */
    public function responsable_labo()
    {
        return $this->belongsTo('App\Auteur','responsable');
    }


    /**
     * Get the User that owns the Product.
     */
    public function auteurs()
    {
        return $this->belongsToMany('App\Auteur', 'auteur_equipe');
    }
}
