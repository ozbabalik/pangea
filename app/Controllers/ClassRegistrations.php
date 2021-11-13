<?php

namespace App\Controllers;

use App\Entities\ClassRegistration;

class ClassRegistrations extends BaseController
{
	private $model;

	private $current_user;

	public function __construct()
	{
        $this->model = new \App\Models\ClassRegistrationModel;
		$this->current_user = service('auth')->getCurrentUser();
	}

	public function index()
	{
		$data = $this->model->paginateClassRegistrationsByUserId($this->current_user->id);

		return view("ClassRegistrations/index", [
			'classRegistrations' => $data,
            'pager' => $this->model->pager
		]);
	}

	public function show($id)
    {
        $classRegistration = $this->getClassRegistrationOr404($id);

		return view('ClassRegistrations/show', [
            'classRegistration' => $classRegistration
        ]);
	}

	public function new()
	{
        $classRegistration = new ClassRegistration;

		return view('ClassRegistrations/new', [
		    'classRegistration' => $classRegistration
        ]);
	}

	public function create()
	{
        $classRegistration = new ClassRegistration($this->request->getPost());

		$classRegistration->user_id = $this->current_user->id;

		if ($this->model->insert($classRegistration)) {

			return redirect()->to("/ClassRegistrations/show/{$this->model->insertID}")
                             ->with('info', lang('ClassRegistrations.create_successful'));

        } else {

			return redirect()->back()
							 ->with('errors', $this->model->errors())
                             ->with('warning', lang('App.messages.invalid'))
							 ->withInput();
		}
	}

	public function edit($id)
	{
		$classRegistration = $this->getClassRegistrationOr404($id);

		return view('ClassRegistrations/edit', [
            'classRegistration' => $classRegistration
        ]);
	}

    public function update($id)
	{
        $classRegistration = $this->getClassRegistrationOr404($id);

		$post = $this->request->getPost();
		unset($post['user_id']);

		$classRegistration->fill($post);

		if ( ! $classRegistration->hasChanged()) {

            return redirect()->back()
                             ->with('warning', lang('App.messages.no_change'))
                             ->withInput();
		}

        if ($this->model->save($classRegistration)) {

	        return redirect()->to("/ClassRegistrations")
                             ->with('info', lang('ClassRegistrations.update_successful'));

		} else {

            return redirect()->back()
                             ->with('errors', $this->model->errors())
                             ->with('warning', lang('App.messages.invalid'))
							 ->withInput();

		}
	}

	public function delete($id)
	{
        $classRegistration = $this->getClassRegistrationOr404($id);

        if ($this->request->getMethod() === 'post') {

            $this->model->delete($id);

			return redirect()->to('/ClassRegistrations')
                             ->with('info', lang('ClassRegistrations.deleted'));
		}

		return view('ClassRegistrations/delete', [
            'classRegistration' => $classRegistration
        ]);
	}

	public function search()
    {
        $classRegistrations = $this->model->search($this->request->getGet('q'), $this->current_user->id);

        return $this->response->setJSON($classRegistrations);
	}

    private function getClassRegistrationOr404($id)
	{
		/*
		$task = $this->model->find($id);

		if ($task !== null && ($task->user_id !== $user->id)) {

			$task = null;

		}
		*/

        $classRegistration = $this->model->getClassRegistrationByUserId($id, $this->current_user->id);

		if ($classRegistration === null) {

            throw new \CodeIgniter\Exceptions\PageNotFoundException(lang('ClassRegistrations.classRegistration_not_found') . ': ' . $id);

		}

		return $classRegistration;
	}
}
