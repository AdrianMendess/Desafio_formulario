fetch('status_dados.php')
    .then(resposta => resposta.json())
    .then(dados => {
        console.log(dados);

        //buusva resultado dos municipios
        const nomesMunicipios = dados.porMunicipio.map(item => item.municipio);
        const totaisMunicipios = dados.porMunicipio.map(item => item.total);

        //busca o resultado dos dias
        const dias = dados.porDia.map(item => item.dia);
        const totaisDias = dados.porDia.map(item => item.total)

        new Chart(document.getElementById('graficoPorMunicipio'), {
            type: 'bar',
            data: {
                labels: nomesMunicipios,
                datasets: [{
                    label: 'Inscrições por Município',
                    data: totaisMunicipios
                }]
            }
        });

        new Chart(document.getElementById('graficoPorDia'), {
    type: 'line', 
    data: {
        labels: dias,
        datasets: [{
            label: 'Inscrições por Dia',
            data: totaisDias
        }]
    }
});

    });