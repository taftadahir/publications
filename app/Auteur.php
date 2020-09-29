<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Auteur extends Model
{


    use SoftDeletes;

    protected $table = 'auteurs';

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
        'nom',
        'prenom',
        'som',
        'etablissement_id',
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
    public function etablissement()
    {
        return $this->belongsTo('App\Etablissement');
    }

    /**
     * Get the User that owns the Product.
     */
    public function articles()
    {
        return $this->belongsToMany('App\Article','auteur_article');
    }

    /**
     * Get the User that owns the Product.
     */
    public function equipes()
    {
        return $this->belongsToMany('App\Equipe','auteur_equipe');
    }
}
