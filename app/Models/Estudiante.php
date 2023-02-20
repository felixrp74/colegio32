<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Estudiante
 * 
 * @property int $idestudiante
 * @property string|null $nombre
 * @property int $apoderados_idapoderado
 * 
 * @property Apoderado $apoderado
 * @property Collection|Matricula[] $matriculas
 *
 * @package App\Models
 */
class Estudiante extends Model
{
	protected $table = 'estudiantes';
	public $timestamps = false;

	protected $casts = [
		'apoderados_idapoderado' => 'int'
	];

	protected $fillable = [
		'nombre'
	];

	public function apoderado()
	{
		return $this->belongsTo(Apoderado::class, 'apoderados_idapoderado');
	}

	public function matriculas()
	{
		return $this->hasMany(Matricula::class, 'estudiante_idestudiante');
	}
}
