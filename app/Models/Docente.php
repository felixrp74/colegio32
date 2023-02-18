<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Docente
 * 
 * @property int $iddocente
 * @property string|null $nombre
 * @property string|null $profesion
 * 
 * @property Collection|Asignacione[] $asignaciones
 *
 * @package App\Models
 */
class Docente extends Model
{
	protected $table = 'docentes';
	protected $primaryKey = 'iddocente';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'profesion'
	];

	public function asignaciones()
	{
		return $this->hasMany(Asignacione::class, 'docentes_iddocente');
	}
}
