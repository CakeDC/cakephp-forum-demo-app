<?php
namespace App\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Register method
     *
     * @return \Cake\Http\Response|void
     */
    public function register()
    {
        if ($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl());
        }

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Auth->setUser($user);
                $this->Flash->success(__d('users', 'Welcome!'));

                return $this->redirect($this->Auth->redirectUrl());
            }
        }

        $this->set('user', $user);
    }

    /**
     * Login method
     *
     * @return \Cake\Http\Response|void
     */
    public function login()
    {
        if ($this->request->is('post')) {
            if ($user = $this->Auth->identify()) {
                $this->Auth->setUser($user);

                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(__d('users', 'Invalid username or password, try again'));
            }
        }
    }

    /**
     * Logout method
     *
     * @return \Cake\Http\Response
     */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}
