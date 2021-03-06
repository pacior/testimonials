<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Logoes Controller
 *
 * @property \App\Model\Table\LogoesTable $Logoes
 */
class LogoesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('logoes', $this->paginate($this->Logoes));
        $this->set('_serialize', ['logoes']);
    }

    /**
     * View method
     *
     * @param string|null $id Logo id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $logo = $this->Logoes->get($id, [
            'contain' => ['Teams']
        ]);
        $this->set('logo', $logo);
        $this->set('_serialize', ['logo']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $logo = $this->Logoes->newEntity();
        if ($this->request->is('post')) {
            $logo = $this->Logoes->patchEntity($logo, $this->request->data);
            if ($this->Logoes->save($logo)) {
                $this->Flash->success(__('The logo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The logo could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('logo'));
        $this->set('_serialize', ['logo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Logo id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $logo = $this->Logoes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $logo = $this->Logoes->patchEntity($logo, $this->request->data);
            if ($this->Logoes->save($logo)) {
                $this->Flash->success(__('The logo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The logo could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('logo'));
        $this->set('_serialize', ['logo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Logo id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $logo = $this->Logoes->get($id);
        if ($this->Logoes->delete($logo)) {
            $this->Flash->success(__('The logo has been deleted.'));
        } else {
            $this->Flash->error(__('The logo could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
