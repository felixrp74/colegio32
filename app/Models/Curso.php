<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Curso
 * 
 * @property int $idcurso
 * @property string|null $descripcion
 * @property string|null $especialidad
 * @property int $seccion_idseccion
 * @property int $seccion_grado_idgrado
 * 
 * @property Seccion $seccion
 * @property Collection|DetalleAsignacione[] $detalle_asignaciones
 * @property Collection|DetalleMatricula[] $detalle_matriculas
 *
 * @package App\Models
 */
class Curso extends Model
{
	protected $table = 'curso';
	public $timestamps = false;

	protected $casts = [
		'seccion_idseccion' => 'int',
		'seccion_grado_idgrado' => 'int'
	];

	protected $fillable = [
		'descripcion',
		'especialidad'
	];

	public function seccion()
	{
		return $this->belongsTo(Seccion::class, 'seccion_idseccion')
					->where('seccion.idseccion', '=', 'curso.seccion_idseccion')
					->where('seccion.grado_idgrado', '=', 'curso.seccion_grado_idgrado');
	}

	public function detalle_asignaciones()
	{
		return $this->hasMany(DetalleAsignacione::class, 'curso_idcurso');
	}

	public function detalle_matriculas()
	{
		return $this->hasMany(DetalleMatricula::class, 'curso_idcurso');
	}
}
