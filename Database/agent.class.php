<?php
    class Agent {
        public int $id_agent;
        public int $id_user;
        public int $id_department;
    
        public function __construct(int $id_agent, int $id_user, int $id_department) {
            $this->id_agent = $id_agent;
            $this->id_user = $id_user;
            $this->id_department = $id_department;
        }
    
        static function checkAgent(PDO $db, $id) : ?Agent {
            $stmt = $db->prepare('
                SELECT id_agent, id_user, id_department
                FROM Agents 
                WHERE id_user = ?
            ');
        
            $stmt->execute(array($id));
            $agent = $stmt->fetch();
        
            if ($agent) {
                return new Agent(
                    (int) $agent['id_agent'],
                    (int) $agent['id_user'],
                    (int) $agent['id_department']
                );
            }
        
            return null; // Caso o usuário não seja um agente
        }

        public static function getAgentUser($id_agent, $db) {
            
            // Consultar o banco de dados para obter o valor do campo id_user
            $query = "SELECT id_user FROM Agents WHERE id_agent = :id_agent";
            $stmt = $db->prepare($query);
            $stmt->execute(array(':id_agent' => $id_agent));
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
            if ($result !== false) {
                // Obter o valor do campo id_user
                $id_user = $result['id_user'];
        
                return $id_user;
            }
        
            // Caso não seja encontrado
            return "Utilizador não encontrado para o ID fornecido";
        }
    }
    
?> 
