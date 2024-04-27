<?php
    // Inclua o arquivo de conexão com o banco de dados
    include('conexao.php');

    // Array com as condições para cada imagem
    $condicoes = array(
        "path = 'filmes/filme1.jpg'",
        "path = 'filmes/filme2.jpg'",
        "path = 'filmes/filme3.jpg'",
        "path = 'filmes/filme4.jpg'",
        "path = 'filmes/filme5.jpg'",
        // Adicione as condições para as outras imagens aqui...
    );

    // Loop para processar cada consulta e exibir as imagens
    foreach ($condicoes as $condicao) {
        // Consulta para selecionar o caminho da imagem
        $sql = "SELECT path FROM filmes WHERE $condicao";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $caminho_imagem = $row["path"];
            // Exibir a imagem
            echo '<img src="' . $caminho_imagem . '" alt="Descrição da Imagem" class="Filme">';
        } else {
            echo "Nenhuma imagem encontrada para a condição: $condicao";
        }
    }

    // Feche a conexão com o banco de dados
    $conn->close();
?>
