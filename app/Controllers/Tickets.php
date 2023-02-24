<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\TicketsModel;

class Tickets extends ResourceController
{
    protected $format = 'json';
    protected $modelName = 'App\Models\TicketsModel';
    const TICKET_NOT_FOUND_MESSAGE = 'Ticket not found.';
    use ResponseTrait;

    public function index()
    {
        $model = new TicketsModel();
        $limit = $this->request->getGet('limit') ?? 10;
        $offset = $this->request->getGet('offset') ?? 0;
        $tickets=$model->getTickets(null,$limit, $offset);
        return $this->respond($tickets);
    }
    
    public function show($id = null)
    {
        $model = new TicketsModel();
        $ticket = $model->getTickets($id);
        if ($ticket) {
            return $this->respond($ticket);
        } else {
            return $this->failNotFound(self::TICKET_NOT_FOUND_MESSAGE);
        }
    }
    
    public function create()
    {
        $model = new TicketsModel();
        $ticket = [
            'usuario' => $this->request->getPost('usuario'),
            'estatus' => $this->request->getPost('estatus'),
        ];
        $model->insert($ticket);
        $newTicket = $model->getTickets($model->insertID);
        return $this->respondCreated($newTicket);
    }
    
    public function update($id = null)
    {
        $model = new TicketsModel();
        $ticket = $model->find($id);
        if (!$ticket) {
            return $this->failNotFound(self::TICKET_NOT_FOUND_MESSAGE);
        }
        $data = [
            'usuario' => $this->request->getRawInput('usuario'),
            'estatus' => $this->request->getRawInput('estatus'),
        ];
        $model->updateTicket($id, $data);
        $updatedTicket = $model->getTickets($id);
        return $this->respond($updatedTicket);
    }
    
    public function delete($id = null)
    {
        $model = new TicketsModel();
        $ticket = $model->find($id);
        if (!$ticket) {
            return $this->failNotFound(self::TICKET_NOT_FOUND_MESSAGE);
        }
        $model->delete($id);
        return $this->respondDeleted(['id' => $id]);
    }
}