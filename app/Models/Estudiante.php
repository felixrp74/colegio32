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
 * 
 * @property Collection|Matricula[] $matriculas
 *
 * @package App\Models
 */
class Estudiante extends Model
{
	protected $table = 'estudiante';
	protected $primaryKey = 'idestudiante';
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];

	public function matriculas()
	{
		return $this->hasMany(Matricula::class, 'estudiante_idestudiante');
	}
}
