<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Testimonial Entity.
 *
 * @property int $id
 * @property string $client_name
 * @property string $client_email
 * @property string $hash
 * @property int $rating
 * @property string $description
 * @property int $business_id
 * @property \App\Model\Entity\Business $business
 */
class Testimonial extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
