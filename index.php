<?php ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
</head>

<body>

    <div class="box">
        <form action="index.php" method="post" id="form">
            <fieldset>

                <legend><b>Formulário de inscrições</b></legend>

                <div class="inputBox">
                    <input
                        type="text"
                        name="nome"
                        id="nome"
                        class="inputuser"
                        required />
                    <label for="nome" class="labelInput">Nome</label>
                </div>

                <div class="inputBox">
                    <input
                        type="text"
                        name="cpf"
                        id="cpf"
                        class="inputuser"
                        required />
                    <label for="cpf" class="labelInput">CPF</label>
                </div>

                <div class="inputBox">
                    <input
                        type="text"
                        name="email"
                        id="email"
                        class="inputuser"
                        required />
                    <label for="email" class="labelInput">Email</label>
                </div>

                <div class="selectBox">
                    <select name="municipio" id="municipio">
                        <option value="saoLuis">São Luís</option>
                        <option value="raposa">Raposa</option>
                        <option value="lumiar">Paço do Lumiar</option>
                        <option value="ribamar">São José de Ribamar</option>
                    </select>
                    <label for="municipio" class="labelInput">Município</label>
                </div>

                <div class="inputBox">
                    <input
                        type="text"
                        name="telefone"
                        id="telefone"
                        class="inputuser"
                        required />
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>

            </fieldset>
        </form>

    </div>

</body>

</html>