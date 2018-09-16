<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Todos Controller
 *
 *
 * @method \App\Model\Entity\Todo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TodosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $todos = $this->paginate($this->Todos);

        $this->set(compact('todos'));
    }

    /**
     * View method
     *
     * @param string|null $id Todo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $todo = $this->Todos->get($id, [
            'contain' => []
        ]);

        $this->set('todo', $todo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $todo = $this->Todos->newEntity();
        if ($this->request->is('post')) {
            $todo = $this->Todos->patchEntity($todo, $this->request->getData());
            if ($this->Todos->save($todo)) {
                $this->Flash->success(__('The todo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The todo could not be saved. Please, try again.'));
        }
        $this->set(compact('todo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Todo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $todo = $this->Todos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $todo = $this->Todos->patchEntity($todo, $this->request->getData());
            if ($this->Todos->save($todo)) {
                $this->Flash->success(__('The todo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The todo could not be saved. Please, try again.'));
        }
        $this->set(compact('todo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Todo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $todo = $this->Todos->get($id);
        if ($this->Todos->delete($todo)) {
            $this->Flash->success(__('The todo has been deleted.'));
        } else {
            $this->Flash->error(__('The todo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
