<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DetalleAsignacione
 * 
 * @property Carbon|null $fecha_asignacion
 * @property int $asignaciones_idasignacion
 * @property int $curso_idcurso
 * 
 * @property Asignacione $asignacione
 * @property Curso $curso
 *
 * @package App\Models
 */
class DetalleAsignacione extends Model
{
	protected $table = 'detalle_asignaciones';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'asignaciones_idasignacion' => 'int',
		'curso_idcurso' => 'int'
	];

	protected $dates = [
		'fecha_asignacion'
	];

	protected $fillable = [
		'fecha_asignacion'
	];

	public function asignacione()
	{
		return $this->belongsTo(Asignacione::class, 'asignaciones_idasignacion');
	}

	public function curso()
	{
		return $this->belongsTo(Curso::class, 'curso_idcurso');
	}
}
