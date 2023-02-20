<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Nivele
 * 
 * @property int $idniveles
 * @property int|null $grado
 * @property string|null $seccion
 * 
 * @property Collection|Curso[] $cursos
 *
 * @package App\Models
 */
class Nivele extends Model
{
	protected $table = 'niveles';
	protected $primaryKey = 'idniveles';
	public $timestamps = false;

	protected $casts = [
		'grado' => 'int'
	];

	protected $fillable = [
		'grado',
		'seccion'
	];

	public function cursos()
	{
		return $this->hasMany(Curso::class, 'niveles_idniveles');
	}
}
