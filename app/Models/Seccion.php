<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Seccion
 * 
 * @property int $idseccion
 * @property string|null $descripcion
 * @property int $grado_idgrado
 * 
 * @property Grado $grado
 * @property Collection|Curso[] $cursos
 *
 * @package App\Models
 */
class Seccion extends Model
{
	protected $table = 'seccion';
	public $timestamps = false;

	protected $casts = [
		'grado_idgrado' => 'int'
	];

	protected $fillable = [
		'descripcion'
	];

	public function grado()
	{
		return $this->belongsTo(Grado::class, 'grado_idgrado');
	}

	public function cursos()
	{
		return $this->hasMany(Curso::class, 'seccion_idseccion');
	}
}
