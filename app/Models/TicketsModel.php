<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class TicketsModel extends Model
{
    protected $table = 'tickets';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'usuario',
        'fechaCreacion',
        'fechaActualizacion',
        'status'
    ];
    protected $useTimestamps = true;

    public function getTickets($id = null, $limit = 10, $offset = 0)
    {
        
        if ($id === null) {
            return $this->orderBy('fecha_creacion', 'desc')->findAll($limit, $offset);
        }
        return $this->where(['id' => $id])->first();
    }

    public function createTicket($data)
    {
        return $this->insert($data);
    }

    public function updateTicket($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteTicket($id)
    {
        return $this->delete($id);
    }
}