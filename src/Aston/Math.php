<?php
/**
 * Created by PhpStorm.
 * User: rakotomalala
 * Date: 2019-04-16
 * Time: 09:55
 */

namespace Aston;

use InvalidArgumentException;

class Math
{
    /**
     * @param float $numerateur
     * @param float $denominateur
     * @return array
     * @throws InvalidArgumentException
     */
    public static function divide(float $numerateur, float $denominateur) : array
    {
        if (is_numeric($numerateur) && is_numeric($denominateur)) {
            if ($denominateur !== 0.0) {
                $resultat = $numerateur / $denominateur;
                $reste = fmod($numerateur, $denominateur);

                $infosDivision = [
                    'resultat' => $resultat,
                    'reste' => $reste
                ];
                return $infosDivision;
            } else {
                throw new InvalidArgumentException("Le dénominateur ne peut pas être égale à 0.0");
            }
        } else {
            throw new InvalidArgumentException("Des valeurs numeriques sont attendues en argument");
        }
    }
}
