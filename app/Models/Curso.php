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
 * @property int $niveles_idniveles
 * 
 * @property Nivele $nivele
 * @property Collection|DetalleAsignacione[] $detalle_asignaciones
 * @property Collection|DetalleMatricula[] $detalle_matriculas
 *
 * @package App\Models
 */
class Curso extends Model
{
	protected $table = 'cursos';
	public $timestamps = false;

	protected $casts = [
		'niveles_idniveles' => 'int'
	];

	protected $fillable = [
		'descripcion',
		'especialidad'
	];

	public function nivele()
	{
		return $this->belongsTo(Nivele::class, 'niveles_idniveles');
	}

	public function detalle_asignaciones()
	{
		return $this->hasMany(DetalleAsignacione::class, 'cursos_idcurso');
	}

	public function detalle_matriculas()
	{
		return $this->hasMany(DetalleMatricula::class, 'cursos_idcurso');
	}
}
