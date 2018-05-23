<?php

use Phalcon\Mvc\Controller;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $tasks = Tasks::find();
        $this->view->setVar("data", $tasks);
    }

    public function storeAction()
    {
        $task = new Tasks();

        $success = $task->save(
            $this->request->getPost(),
            [
                "name"
            ]
        );

        if ($success) {
            return $this->response->redirect('')->send();
        } else {
            echo "Sorry, the following problems were generated: ";

            $messages = $task->getMessages();

            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }

        $this->view->disable();
    }

    public function editAction($id)
    {
        $task = Tasks::findFirst($id);
        $this->view->setVar("data", $task);
    }

    public function updateAction($id)
    {
        $now = new DateTime();
        $inputs = $this->request->getPost();
        $task = Tasks::findFirst($id);
        $task->name = $inputs['name'];
        $task->updated_at = $now->format('Y-m-d H:i:s');
        $success = $task->save();

        if ($success) {
            return $this->response->redirect('')->send();
        } else {
            echo "Sorry, the following problems were generated: ";

            $messages = $task->getMessages();

            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }

        $this->view->disable();
    }

    public function deleteAction($id)
    {
        $task = Tasks::findFirst($id);

        if ($task !== false) {
            if ($task->delete() === false) {
                echo "Sorry, we can't delete the robot right now: \n";

                $messages = $robot->getMessages();

                foreach ($messages as $message) {
                    echo $message, "\n";
                }
            } else {
                return $this->response->redirect('')->send();
            }
        }

        $this->view->disable();
    }
}

