<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetalleMatricula
 * 
 * @property int $matriculas_idmatricula
 * @property int $curso_idcurso
 * @property float|null $nota1
 * 
 * @property Matricula $matricula
 * @property Curso $curso
 *
 * @package App\Models
 */
class DetalleMatricula extends Model
{
	protected $table = 'detalle_matriculas';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'matriculas_idmatricula' => 'int',
		'curso_idcurso' => 'int',
		'nota1' => 'float'
	];

	protected $fillable = [
		'nota1'
	];

	public function matricula()
	{
		return $this->belongsTo(Matricula::class, 'matriculas_idmatricula');
	}

	public function curso()
	{
		return $this->belongsTo(Curso::class, 'curso_idcurso');
	}
}
