<?php

namespace App\Controllers\Admin;

use App\Entities\User;

class Users extends \App\Controllers\BaseController
{
    private $model;

    private $classRegistrationsModel;

    public function __construct()
    {
        $this->model = new \App\Models\UserModel;
        $this->classRegistrationsModel = new \App\Models\ClassRegistrationModel;
    }

    public function index()
	{
        $users = $this->model->orderBy('id')
                             ->paginate(10);
        $classRegistrationsArray = $this->classRegistrationsModel->get()->getResult();
        $classRegistrations = $this->classRegistrationsModel;

		return view('Admin/Users/index', [
            'users' => $users, 'classRegistrations' => $classRegistrations,
            'classRegistrationsArray' => $classRegistrationsArray,
            'pager' => $this->model->pager, 'currentPage'=>'users'
        ]);
    }

    public function show($id)
    {
        $user = $this->getUserOr404($id);

		return view('Admin/Users/show', [
            'user' => $user, 'currentPage'=>'users'
        ]);
	}

    public function new()
	{
        $user = new User;

		return view('Admin/Users/new', [
		    'user' => $user, 'currentPage'=>'users'
        ]);
	}

	public function create()
	{
        $user = new User($this->request->getPost());

		if ($this->model->protect(false)
                        ->insert($user)) {

			return redirect()->to("/admin/users/show/{$this->model->insertID}")
                             ->with('info', lang('AdminUsers.create_successful'));

        } else {

			return redirect()->back()
							 ->with('errors', $this->model->errors())
                             ->with('warning', lang('App.messages.invalid'))
							 ->withInput();
		}
	}

    public function edit($id)
	{
		$user = $this->getUserOr404($id);

		return view('Admin/Users/edit', [
            'user' => $user, 'currentPage'=>'users'
        ]);
	}

    public function update($id)
	{
        $user = $this->getUserOr404($id);

		$post = $this->request->getPost();

        if (empty($post['password'])) {

            $this->model->disablePasswordValidation();

            unset($post['password']);
            unset($post['password_confirmation']);
        }

		$user->fill($post);

		if ( ! $user->hasChanged()) {

            return redirect()->back()
                             ->with('warning', lang('App.messages.no_change'))
                             ->withInput();
		}

        if ($this->model->protect(false)
                        ->save($user)) {

	        return redirect()->to("/admin/users/show/$id")
                             ->with('info', lang('AdminUsers.update_successful'));

		} else {

            return redirect()->back()
                             ->with('errors', $this->model->errors())
                             ->with('warning', lang('App.messages.invalid'))
							 ->withInput();

		}
	}

    public function delete($id)
	{
        $user = $this->getUserOr404($id);

        if ($this->request->getMethod() === 'post') {

            $this->model->delete($id);

			return redirect()->to('/admin/users')
                             ->with('info', lang('AdminUsers.deleted'));
		}

		return view('Admin/Users/delete', [
            'user' => $user, 'currentPage'=>'users'
        ]);
	}

    private function getUserOr404($id)
	{
        $user = $this->model->where('id', $id)
                            ->first();

		if ($user === null) {

            throw new \CodeIgniter\Exceptions\PageNotFoundException(lang('AdminUsers.user_not_found') . ': ' . $id);

		}

		return $user;
	}

  public function classRegistrations($id=null){
    $data = $this->classRegistrationsModel->paginateClassRegistrationsByUserId($id);

		return view("ClassRegistrations/index", [
			'classRegistrations' => $data,
            'pager' => $this->classRegistrationsModel->pager
		]);
  }
}
