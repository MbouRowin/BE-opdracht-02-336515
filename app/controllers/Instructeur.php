<?php

class Instructeur extends BaseController
{
    private $instructeurModel;

    public function __construct()
    {
        $this->instructeurModel = $this->model('InstructeurModel');
    }

    public function index()
    {
        $result  = $this->instructeurModel->getInstructeurs();

        $data = [
            'title' => 'Instructeurs in dienst',
            'instructeurs' => $result,
        ];

        $this->view('Instructeur/index', $data);
    }

    public function gebruikteVoertuigen($id)
    {
        $instructeur  = $this->instructeurModel->getInstructeurById($id);
        $voertuigen = $this->instructeurModel->getVoertuigenByInstructeurId($id);

        $data = [
            'title' => 'Gebruikte voertuigen',
            'instructeur' => $instructeur,
            'voertuigen' => $voertuigen,
        ];

        $this->view('Instructeur/gebruikteVoertuigen', $data);
    }
}
