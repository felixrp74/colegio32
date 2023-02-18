<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Matricula
 * 
 * @property int $idmatricula
 * @property int $estudiante_idestudiante
 * 
 * @property Estudiante $estudiante
 * @property Collection|DetalleMatricula[] $detalle_matriculas
 *
 * @package App\Models
 */
class Matricula extends Model
{
	protected $table = 'matriculas';
	public $timestamps = false;

	protected $casts = [
		'estudiante_idestudiante' => 'int'
	];

	public function estudiante()
	{
		return $this->belongsTo(Estudiante::class, 'estudiante_idestudiante');
	}

	public function detalle_matriculas()
	{
		return $this->hasMany(DetalleMatricula::class, 'matriculas_idmatricula');
	}
}
