<?php

namespace App\Enums;

enum OrderStatus: string
{
    case EnAttente = 'EN_ATTENTE';
    case EnCours = 'EN_COURS';
    case Delivree = 'DELIVREE';
    case Terminee = 'TERMINEE';
    case Annulee = 'ANNULEE';
    case EnPreparation = 'EN_PREPARATION';
}
