<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Tarifs Controller
 *
 * @property \App\Model\Table\TarifsTable $Tarifs
 * @method \App\Model\Entity\Tarif[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DiaryController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('user');
    }
}
