fetch('status_dados.php')
    .then(resposta => resposta.json())
    .then(dados => {
        console.log(dados);
    }); // testando buscar os dados do php, e retornar os objetos 'porMunicipio" e  "porDia"

    