<?php
class PowerSupply
{
    private $conn;
    private $table = "power_supplies";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function search($filters, $orderBy = 'marca', $orderDir = 'ASC')
    {
        $allowedOrderFields = ['marca', 'modello', 'ampere_output', 'freq_min_hz', 'output_details'];
        if (!in_array($orderBy, $allowedOrderFields)) {
            $orderBy = 'marca';
        }

        $orderDir = strtoupper($orderDir) === 'DESC' ? 'DESC' : 'ASC';

        $query = "SELECT * FROM " . $this->table . " WHERE 1=1";
        $params = [];

        if (!empty($filters['marca'])) {
            $query .= " AND marca LIKE :marca";
            $params[':marca'] = "%" . $filters['marca'] . "%";
        }
        if (!empty($filters['output_details'])) {
            $query .= " AND output_details LIKE :out";
            $params[':out'] = "%" . $filters['output_details'] . "%";
        }
        if (!empty($filters['min_amp_out'])) {
            $query .= " AND ampere_output >= :min_amp";
            $params[':min_amp'] = $filters['min_amp_out'];
        }
        if (!empty($filters['max_amp_out'])) {
            $query .= " AND ampere_output <= :max_amp";
            $params[':max_amp'] = $filters['max_amp_out'];
        }
        if (!empty($filters['freq_min'])) {
            $query .= " AND freq_min_hz >= :freq_min";
            $params[':freq_min'] = $filters['freq_min'];
        }
        if (!empty($filters['freq_max'])) {
            $query .= " AND freq_max_hz <= :freq_max";
            $params[':freq_max'] = $filters['freq_max'];
        }
        if (!empty($filters['made_in'])) {
            $query .= " AND made_in LIKE :made_in";
            $params[':made_in'] = "%" . $filters['made_in'] . "%";
        }

        $query .= " ORDER BY $orderBy $orderDir";

        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }

    public function create($data)
    {
        $query = "INSERT INTO " . $this->table . "
        (marca, modello, input_min_v, input_max_v, ampere_input, ampere_output, freq_min_hz, freq_max_hz, output_details, made_in, note)
        VALUES (:marca, :modello, :imin, :imax, :ain, :aout, :fmin, :fmax, :outdet, :made, :note)";

        $stmt = $this->conn->prepare($query);
        return $stmt->execute($data);
    }

    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function getById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id)
    {
        $query = "UPDATE " . $this->table . " SET
            marca = :marca,
            modello = :modello,
            input_min_v = :imin,
            input_max_v = :imax,
            ampere_input = :ain,
            ampere_output = :aout,
            freq_min_hz = :fmin,
            freq_max_hz = :fmax,
            output_details = :outdet,
            made_in = :made,
            note = :note
            WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $data[':id'] = $id;
        return $stmt->execute($data);
    }

    public function edit($id, $data)
    {
        $query = "UPDATE " . $this->table . " SET
            marca = :marca,
            modello = :modello,
            input_min_v = :imin,
            input_max_v = :imax,
            ampere_input = :ain,
            ampere_output = :aout,
            freq_min_hz = :fmin,
            freq_max_hz = :fmax,
            output_details = :outdet,
            made_in = :made,
            note = :note
            WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $data[':id'] = $id;
        return $stmt->execute($data);
    }
}
