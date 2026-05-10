<?php

namespace App\Controller\Api;

use App\Controller\AppController;

class ExercisesController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function index()
    {
        //$recipes = $this->Recipes->find('all')->all();
        $this->loadModel('Musculgroup');
        $musculgroup = $this->Musculgroup->find()->contain(['Exercise'])->all();
        $this->set('musculgroup', $musculgroup);
        $this->viewBuilder()->setClassName('Json');
        $this->viewBuilder()->setOption('serialize', ['musculgroup']);
            //->setOption('jsonOptions', JSON_FORCE_OBJECT);
    }
}
