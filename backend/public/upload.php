<section>
    <h1>Upload e conversão de arquivo .ova para .tar</h1>
    <form action="index.php" method="post" enctype="multipart/form-data">
        Selecione um arquivo .ova para enviar:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Enviar Arquivo" name="submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_FILES["fileToUpload"])) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            // Verifique se é um arquivo .ova
            if ($imageFileType != "ova") {
                echo "Apenas arquivos .ova são permitidos.";
                $uploadOk = 0;
            }
            if ($uploadOk == 0) {
                echo "Erro ao enviar o arquivo.";
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "O arquivo " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " foi enviado com sucesso.";
                    // Converte o arquivo .ova para .tar
                    $output = shell_exec("tar -cvf " . $target_dir . "imagem.tar " . $target_file);
                    echo "<br>Imagem convertida para .tar: <a href='" . $target_dir . "imagem.tar'>imagem.tar</a>";
                } else {
                    echo "Erro ao enviar o arquivo.";
                }
            }
        }
    }
    ?>
</html>
