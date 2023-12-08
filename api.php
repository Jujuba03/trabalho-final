<?php
session_start();

// Simulação de dados (pode ser substituído por interações com o banco de dados)
$ringData = [
    ['id' => 1, 'name' => 'Anel 1', 'material' => 'Ouro'],
    ['id' => 2, 'name' => 'Anel 2', 'material' => 'Prata'],
    // ... outros anéis
];

// Verificação de autenticação (pode ser ajustado conforme necessário)
if (!isset($_SESSION['usuario_id'])) {
    http_response_code(403);
    exit('Acesso negado.');
}

// Manipulação de solicitações
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Obter a lista de anéis
    echo json_encode($ringData);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Adicionar ou editar um anel
    $postData = json_decode(file_get_contents("php://input"), true);

    $ringId = isset($postData['ring_id']) ? $postData['ring_id'] : null;

    if ($ringId !== null) {
        // Editar anel existente
        foreach ($ringData as &$ring) {
            if ($ring['id'] == $ringId) {
                $ring['name'] = $postData['ring_name'];
                $ring['material'] = $postData['ring_material'];
                break;
            }
        }
    } else {
        // Adicionar novo anel
        $newRing = [
            'id' => count($ringData) + 1,
            'name' => $postData['ring_name'],
            'material' => $postData['ring_material'],
        ];
        $ringData[] = $newRing;
    }

    // Atualizar a lista de anéis
    echo json_encode($ringData);
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Excluir um anel
    $ringId = $_GET['ring_id'];

    foreach ($ringData as $key => $ring) {
        if ($ring['id'] == $ringId) {
            unset($ringData[$key]);
            break;
        }
    }

    // Reindexar o array após a exclusão
    $ringData = array_values($ringData);

    // Atualizar a lista de anéis
    echo json_encode($ringData);
} else {
    http_response_code(405);
    exit('Método não permitido.');
}
?>
