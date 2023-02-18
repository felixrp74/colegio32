<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Asignacione
 * 
 * @property int $idasignacion
 * @property int $docentes_iddocente
 * 
 * @property Docente $docente
 * @property Collection|DetalleAsignacione[] $detalle_asignaciones
 *
 * @package App\Models
 */
class Asignacione extends Model
{
	protected $table = 'asignaciones';
	public $timestamps = false;

	protected $casts = [
		'docentes_iddocente' => 'int'
	];

	public function docente()
	{
		return $this->belongsTo(Docente::class, 'docentes_iddocente');
	}

	public function detalle_asignaciones()
	{
		return $this->hasMany(DetalleAsignacione::class, 'asignaciones_idasignacion');
	}
}
